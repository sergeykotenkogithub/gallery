<?php

// Контроллер

function prepareVariables($page, $menu, $messageUpload, $getImages, $action = "") {

    // $params для указания переменной на всех страницах
    $params = [
        'list' => getMenu($menu),
    ];

    // Авторизация
    $params['name'] = get_user();
    $params['auth'] = isAuth();

    // Выбор шаблона по умолчанию
    $params['layout'] = "main";

    //Переменные для страниц
    switch ($page) {

        // .................Авторизация.................................................

        case 'login':
//            $login = $_POST['login'];
//            $login = strip_tags(htmlspecialchars(mysqli_real_escape_string($_POST['login'])));
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (auth($login, $pass)) {
                if (isset($_POST['save'])) {
                    $hash = uniqid(rand(), true);
                    $id = $_SESSION['id'];
                    $sql = "UPDATE users SET hash = '{$hash}' WHERE id = {$id}";
                    $result = mysqli_query(getDb(), $sql);
                    setcookie("hash", $hash, time() +3600, "/");
                }
                header("Location: /");
                die();
            } else {
                die("Не верный логин пароль");
            }
        break;
        case 'logout':
            setcookie("hash", "", time()-1, "/" );
            session_regenerate_id();
            session_destroy();
            header("Location: /");
            die();
        break;

        // ..................Админ................................................

        case 'admin':
            $params['order'] = adminOrder();
            break;


        // .................Страницы.................................................

        // Начальная страница

        case 'index':
            $params['hello'] = 'Hello,';
            $params['welcome'] = 'Welcome !';
            $params['title'] = 'Hello';
            break;

        // Отзывы

        case 'feedback':
            doFeedbackAction($action);
            $params['feedback'] = getAllFeedback();
            break;

        // Галерея

        case 'gallery':
            $params['title'] = 'Gallery'; // Заголок
            $params['gallery'] = getGallery(); // Через базу данных получаю полный список
            $params['gallerySort'] = getGallerySorting(); // Через базу данных получаю отсортированный список
            // Проверка на загрузку фотографии и переименовывание
            if (isset($_FILES['myfile'])) {
                upload($getImages);
            }
            $params['message'] = $messageUpload[$_GET['message']]; // Вывод сообщения
            // Удаление и вывод сообщения
            doGalleryAction($action);
            $params['message_del'] =  strip_tags($_GET['message_del']);
            break;
        case 'galleryone': // Показывает одну страницу
            $id = (int)$_GET['id'];
            changeViews($id); // Изменение количество просмотров
            $params['gall'] = getOneGallery($id);
            break;

        // Новости

        case 'news':
            $params['news'] = getNews();
            break;
        case 'newsone':
            $id = (int)$_GET['id'];
            $params['news'] = getOneNews($id);
            break;

        // Калькуляторы

        case 'calculator':
        case 'calculatorOperate':
            $params['arg1'] = 0;
            $params['arg2'] = 0;
            $params['result'] = 0;
            $arg1 = $_GET['arg1'];
            $arg2 = $_GET['arg2'];
            $operation = $_GET['operation'];
            if (isset($_GET['arg1']) && isset($_GET['arg2'])) {
                $params['arg1'] = $arg1;
                $params['arg2'] = $arg2;
                $params['result'] = doCalculatorOperation($arg1, $arg2, $operation);
            }
            break;

        // .................Товары, Корзина, Оформление заказа.................................................

        // Товары

        case 'goods':
            session_start();
            $session = session_id();
            $params['goods'] = getAllCatalog();
            $id = $_POST['goods_id'];
            $params['count'] = countGoodsBasketItem($session); // Показ количества товаров в корзине

            // Добавление товара в корзину, если есть такой то увеличивает количество
            if (isset($id)) {

                addBasket($session, $id);
                header("Location: /goods");
                die();

//                !!Пытался реализовать количество товаров но не вышло, почему не могу понять. если есть такой товар он добавляет в корзину и количество увеличивается, а если нет, то ничего не происходит почему-то, хотя я же поставил условие else ???
//                $getBasket = getBasket();
//                $cc = [];
//                foreach ($getBasket as $items ) {
//                    $goods_id = $items['goods_id'];
//                    $session_id = $items['session_id'];
//                    $cc[] = $goods_id;
//                    $cc[] = $session_id;
//
//                }
//                if (in_array($session, $cc) && in_array($id, $cc)) {
//                    changeBasketQuantity($id);
//                    header("Location: /goods");
//                    die();
//                }
//                else  {
//                    addBasket($session, $id);
//                    header("Location: /goods");
//                    die();
//                }
            }

            break;

        case 'goodsItem':
            session_start();
            $session = session_id();
            $id_get = (int)$_GET['id'];
            $params['goods'] = getOneCatalog($id_get); // Вывоодит информацию о товаре
            $params['feedback'] = getItemFeedback($id_get);  // Показывает отзывы
            $params['count'] = countGoodsBasketItem($session); // Показ количества товаров в корзине
            $id = $_POST['goods_id'];


            if (isset($_POST['goods_id'])) {
                addBasket($session, $id);//

                // Пытался вывести собщение но из-за header оно сразу пропадает

//                $_SESSION['name'] = 'Товар успешно добавлен в корзину';
//                $params['ok'] = $_SESSION['name'];
                // unset($_SESSION['name']);

                header("Location: /goodsItem/?id={$id}");
            }
            break;


        // Корзина

        case 'basket':
            session_start();
            $session = session_id();//
            $params['count'] = countGoodsBasketItem($session);
            $params['basket'] = getBasketItem($session); // вывод товаров в корзине
            $params['summ'] = getSumBasket($session); // сумма товаров

            // Удаление

            $id = (int)$_GET['id'];
            $session_id = $_GET['session'];
            if (($_GET['action'] == 'delete') && ($session_id == "$session") ){
                deleteBasketItem($id);
                header("Location: /basket");
            }

            break;

        // Страница с успешно оформленным заказом

        case 'congratulations':
            session_start();
            $session = session_id();
            $tel = $_POST['tel'];
            $email = $_POST['email'];

            if (isset($tel) && isset($email)) {
                pushOrder($session, $tel, $email);
                session_regenerate_id();
            }
            break;

        // Админ страница с определённым заказом

        case 'adminOrder':
            $id = (int)$_GET['id'];
           $params['order'] = adminOrderItem($id);
           $params['summ'] = adminOrderTotal($id);
//           $total = adminOrderTotal($id);
//           $ccs = adminOrderItem($id);
//           var_dump($total);
            break;

        // .................API.................................................

        // Относится к странице calcAjax как api.
        // Страница apicalc не создаётся, просто нужно для передачи с калькулятора, как api,
        // в данном примере считает данные и отдаёт обратно.
        case 'apicalc':
            $data = json_decode(file_get_contents('php://input'));
            $arg1 = $data->arg1;
            $arg2 = $data->arg2;
            $operation = $data->operation;
            header("Content-type: application/json");
            echo json_encode(doCalculatorOperation($arg1, $arg2, $operation));
            die();
            break;
    }
    return $params;
}
