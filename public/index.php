<?php

// Подключение основного конфигурационого файла

include $_SERVER['DOCUMENT_ROOT'] .  "/../config/config.php";

// .................................................................................

//ДВИЖОК

$page ='index';
$layout = 'main';
if(isset($_GET['page'])) {
    $page = $_GET['page'];
}

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
}

echo render($page, $params, $layout);