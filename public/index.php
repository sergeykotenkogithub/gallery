<?php

// Подключение основного конфигурационого файла

include $_SERVER['DOCUMENT_ROOT'] .  "/../config/config.php";

// .................................................................................

//ДВИЖОК

$page ='index';
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
        $params['message'] = $messageUpload[$_GET['message']];
        $params['title'] = 'Gallery';
        break;
    case 'news':
       $params['news'] = getNews();
       break;
    case 'newsone':
        $id = (int)$_GET['id'];
        $params['news'] = getOneNews($id);
        break;
}

echo render($page, $params);