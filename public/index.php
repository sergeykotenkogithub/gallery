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
        $params['message'] = $messageUpload[$_GET['message']]; // Вывод сообщения
        $params['title'] = 'Gallery';
        $params['gallery'] = getGallery(); // Через базу данных
        $params['gallerySort'] = getGallerySorting(); // Через базу данных
        break;
    case 'galleryone':
        $layout = 'galleryone';
        $id = (int)$_GET['id'];
        $params['gall'] = getOneGallery($id);
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