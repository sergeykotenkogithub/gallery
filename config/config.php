<?php

// Пути файлов
define('ROOT', dirname(__DIR__)); // К основной директории, не public
define('TEMPLATES_DIR', ROOT . '/templates/'); // К модулям
define('LAYOUT_DIR', 'layouts/main'); // К основным шаблонам
define('IMG_BIG', $_SERVER['DOCUMENT_ROOT'] . '/gallery_img/big/'); // Большие картинки
define('IMG_SMALL', $_SERVER['DOCUMENT_ROOT'] . '/gallery_img/small/'); // Маленькие картинки

// Вывод сообщений об отправки

$messageUpload = [
    'OK' => 'Файл успешно загружен',
    'ERROR' => 'Ошибка',
    'JPG' => 'Можно загружать только jpg-файлы',
    'DOUBLE' => 'Файл существует, выберите другое имя файла!',
    'BIGSIZE' => 'Размер файла не больше 5 мб',
    'NOTPHP' => 'Загрузка php-файлов запрещена!',
    'NOTIMG' => 'Можно загружать только jpg-файлы, неверное содержание файла, не изображение',
];

// Подключение модулей

include ROOT . "/engine/menu.php";
include ROOT . "/engine/function.php";
include ROOT . "/engine/getFileImg.php";
include ROOT . "/engine/classSimpleImage.php";
include ROOT . "/engine/uploadFile.php";

// ...........................

//include "../engine/menu.php";
//include "../engine/function.php";
//include "../engine/getFileImg.php";
//include "../engine/classSimpleImage.php";
//include "../engine/uploadFile.php";