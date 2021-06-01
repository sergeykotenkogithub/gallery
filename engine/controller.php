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
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (auth($login, $pass)) {
                if (isset($_POST['save'])) {
                    $hash = uniqid(rand(), true);
                    $id = $_SESSION['id'];
                    $sql = "UPDATE users SET hash = '{$hash}' WHERE id = {$id}";
                    $result = mysql_query(getDb(), $sql);
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

        // .................Страницы.................................................

        // Начальная страница

        case 'index':
            $params['hello'] = 'Hello,';
            $params['welcome'] = 'Welcome !';
            $params['title'] = 'Hello';
            break;

        // Отзыввы

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

        // Товары

        case 'goods':
            $params['goods'] = getAllCatalog();
            break;
        case 'goodsItem':
            $id = (int)$_GET['id'];
            $params['goods'] = getOneCatalog($id);
            $params['feedback'] = getItemFeedback($id);
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
