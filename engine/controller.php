<?php
//// Контроллер
//
function prepareVariables($page, $menu, $action = "", $layout = "") {

    // $params для указания переменной на всех страницах
    $params = [
        'list' => getMenu($menu),
    ];

    //Переменные для страниц
    switch ($page) {

        case 'index':
            $params['hello'] = 'Hello,';
            $params['welcome'] = 'Welcome !';
            $params['title'] = 'Hello';
            break;

        case 'gallery':
            $params['images'] = getImages();
            $params['title'] = 'Gallery';
            $params['gallery'] = getGallery(); // Через базу данных
            $params['gallerySort'] = getGallerySorting(); // Через базу данных

            // Проверка на загрузку фотографии и переименовывание
            if (isset($_FILES['myfile'])) {
                upload($getImages);
            }
            $params['message'] = $messageUpload[$_GET['message']]; // Вывод сообщения

            // Удаление и вывод сообщения
            $message_del = "";
            if ($_GET['action'] == 'delete') {
                // Удаление с базы данных
                $id = (int)$_GET['id'];
                deleteViews($id);
                // Удаление с компьютера
                $idHard = $_GET['name'];
                deleteImg($idHard);
            }
            $params['message_del'] =  strip_tags($_GET['message_del']);
            break;

        case 'galleryone': // Показывает одну страницу
            $layout = 'galleryone';
            $id = (int)$_GET['id'];
            $params['gall'] = getOneGallery($id);

            // Изменение количество просмотров
            if ($_GET['page'] == 'galleryone') {
                $id = (int)$_GET['id'];
                changeViews($id);
            }
            break;

        case 'news':
            $params['news'] = getNews();
            break;

        case 'newsone':
            $id = (int)$_GET['id'];
            $params['news'] = getOneNews($id);
            break;

        case 'feedback':
            doFeedbackAction($action);
            $params['feedback'] = getAllFeedback();
            break;

        case 'catalog':
            $params['catalog'] = getAllCatalog();
            break;

        case 'catalogItem':
            $id = (int)$_GET['id'];
            $params['catalog'] = getOneCatalog($id);
            $params['feedback'] = getItemFeedback($id);
            break;

        case 'calculator':
            $params['arg1'] = 0;
            $params['arg2'] = 0;
            $params['result'] = 0;
            $arg1 = $_GET['arg1'];
            $arg2 = $_GET['arg2'];
            $result = $_GET['result'];

            if (isset($_GET['arg1']) && isset($_GET['arg2'])) {
                if ($_GET['operation'] == 'add') {
                        $result = $arg1 + $arg2;
                        $params['result'] = $result;
                        $params['arg1'] = $arg1;
                        $params['arg2'] = $arg2;
                }
                if ($_GET['operation'] == 'sub') {
                    $result = $arg1 - $arg2;
                    $params['result'] = $result;
                    $params['arg1'] = $arg1;
                    $params['arg2'] = $arg2;
                }
                if ($_GET['operation'] == 'mul') {
                    $result = $arg1 * $arg2;
                    $params['result'] = $result;
                    $params['arg1'] = $arg1;
                    $params['arg2'] = $arg2;
                }
                if ($_GET['operation'] == 'div') {
                    if ($arg2 > 0) {
                        $result = $arg1 / $arg2;
                        $params['result'] = $result;
                        $params['arg1'] = $arg1;
                        $params['arg2'] = $arg2;
                    }
                    else {
                        $params['arg1'] = $arg1;
                        $params['arg2'] = $arg2;
                        $params['result'] = 'Невозможно разделить на 0';
                    }
                }
            }
            break;
//            getArg($arg1, $arg2, $result);

    }
    return $params;
}
