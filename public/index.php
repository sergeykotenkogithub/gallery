<?php

// Подключение основного конфигурационого файла

include "../config/config.php";

// .................................................................................

//ДВИЖОК

$page ='index';
if(isset($_GET['page'])) {
    $page = $_GET['page'];
}

// $params для указания переменной на всех страницах

$params = [
//    'title' => 'Галерея'  // Тут передаётся на страницу, а как передать в layout? и разные сделать значение для каждой страницы
    'list' => getMenu($menu),
];

//Переменные для страниц
switch ($page) {
    case 'index':
        $params['hello'] = 'Hello,';
        $params['welcome'] = 'Welcome !';
        break;
    case 'gallery':
        $params['giveFile'] = getFile();
        $params['message'] = $messageUpload[$_GET['message']];
        break;
}

echo render($page, $params);