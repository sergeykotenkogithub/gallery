<?php

// Контроллер

function prepareVariables($page, $menu, $messageUpload, $getImages, $action = "") {

    // $params для указания переменной на всех страницах
    $params = [
        'list' => getMenu($menu),

    ];
    $params['layout'] = "main";

    //Переменные для страниц
    switch ($page) {

        case 'index':
            $params['hello'] = 'Hello,';
            $params['welcome'] = 'Welcome !';
            $params['title'] = 'Hello';
            break;

        case 'gallery':
            $params['images'] = getImages();
            $params['title'] = 'Gallery'; // Заголок
            $params['gallery'] = getGallery(); // Через базу данных получаю полный список
            $params['gallerySort'] = getGallerySorting(); // Через базу данных получаю отсортированный список

            // Проверка на загрузку фотографии и переименовывание
            if (isset($_FILES['myfile'])) {
                upload($getImages);
            }
            $params['message'] = $messageUpload[$_GET['message']]; // Вывод сообщения

            // Удаление и вывод сообщения

//            doGalleryAction($action);

            $message_del = "";
            if ($_GET['action'] == 'delete') {
                $id = (int)$_GET['id'];
                deleteViews($id);  // Удаление с базы данных
                $idHard = $_GET['name'];
                deleteImg($idHard); // Удаление с компьютера
            }
            $params['message_del'] =  strip_tags($_GET['message_del']);
            break;

        case 'galleryone': // Показывает одну страницу
            $id = (int)$_GET['id'];
            changeViews($id); // Изменение количество просмотров
            $params['gall'] = getOneGallery($id);
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
                }
                if ($_GET['operation'] == 'sub') {
                    $result = $arg1 - $arg2;
                    $params['result'] = $result;
                }
                if ($_GET['operation'] == 'mul') {
                    $result = $arg1 * $arg2;
                    $params['result'] = $result;
                }
                if ($_GET['operation'] == 'div') {
                    if ($arg2 ==! 0) {
                        $result = $arg1 / $arg2;
                        $params['result'] = $result;
                    }
                    else {
                        $params['result'] = 'Невозможно разделить на 0';
                    }
                }
                $params['arg1'] = $arg1;
                $params['arg2'] = $arg2;
            }

            break;

        case 'calculatorOperate':
            $params['arg1'] = 0;
            $params['arg2'] = 0;
            $params['result'] = 0;
            $arg1 = $_GET['arg1'];
            $arg2 = $_GET['arg2'];
            $result = $_GET['result'];
            $operation = $_GET['operation'];


            if (isset($_GET['arg1']) && isset($_GET['arg2'])) {


                if ($operation == 'add') {
                    $result = $arg1 + $arg2;
                    $params['result'] = $result;
                }
                if ($operation == 'sub') {
                    $result = $arg1 - $arg2;
                    $params['result'] = $result;
                }
                if ($operation == 'mul') {
                    $result = $arg1 * $arg2;
                    $params['result'] = $result;
                }
                if ($operation == 'div') {
                    if ($arg2 ==! 0) {
                        $result = $arg1 / $arg2;
                        $params['result'] = $result;
                    }
                    else {
                        $params['result'] = 'Невозможно разделить на 0';
                    }
                }

                $params['arg1'] = $arg1;
                $params['arg2'] = $arg2;
            }

            break;
    }
    return $params;
}
