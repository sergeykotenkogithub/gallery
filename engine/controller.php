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

    if (isset($_COOKIE['color']))
    {
        $params['add'] = $_COOKIE['color'];
    }
    else {
        $params['add'] = "1.css";
    }

    //Переменные для страниц
    switch ($page) {

        // .................Авторизация.................................................

        case 'login':
            $login = strip_tags(htmlspecialchars(($_POST['login'])));
            $pass = strip_tags(htmlspecialchars(($_POST['pass'])));
            loginEnter($login, $pass);
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

        // Админ страница с определённым заказом

        case 'adminOrder':
            $id = (int)$_GET['id'];
            $params['order'] = adminOrderItem($id);
            $params['summ'] = adminOrderTotal($id);
            break;


        // .................Страницы.................................................

        // Начальная страница

        case 'index':

            $params['hello'] = 'Hello,';
            $params['welcome'] = 'Welcome !';
            $params['title'] = 'Hello';
            $background = $_GET['action'];
            changeThemeAction($background); // Изменение темы
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
            $price = $_POST['price'];
            $params['count'] = countGoodsBasketItem($session); // Показ количества товаров в корзине

            // Добавление товара в корзину, если есть такой то увеличивает количество
            if (isset($id)) {

                $comparisonGoodsBasket = comparisonGoodsBasket($id, $session);

                // Сравнение товара с базой данных в basket
//                var_dump($price);

                if ($comparisonGoodsBasket) {
                    changeBasketQuantity($id);
                    header("Location: /goods");
                    die();
                }   else {
                    addBasket($session, $id, $price);
                    header("Location: /goods");
                    die();
                }
            }

            break;

        // Подробное описание товара

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
            $quantity = $_GET['quantity'];
            // Удаление

            $id = (int)$_GET['id'];
            $session_id = $_GET['session'];
            if (($_GET['action'] == 'delete') && ($session_id == $session) ){
                deleteBasketItemAll($id);
                header("Location: /basket");
            }
            if (($_GET['action'] == 'add') && ($session_id == $session) ){
                addBasketItem($id);
                header("Location: /basket");
            }
            if (($_GET['action'] == 'deleteitem') && ($session_id == $session) ){
                if ($quantity < 2) {
                    deleteBasketItemAll($id);
                    header("Location: /basket");
                }
                else {
                    deleteBasketItem($id);
                    header("Location: /basket");
                }
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
                session_destroy();
            }
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
