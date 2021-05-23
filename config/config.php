<?php

// Пути файлов

define('TEMPLATES_DIR', '../templates/');
define('LAYOUT_DIR', 'layouts/main');

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
include "../engine/menu.php";
include "../engine/function.php";
include "../engine/getFileImg.php";
include "../engine/classSimpleImage.php";
include "../engine/uploadFile.php";