<?php

// Пути файлов

define('ROOT', dirname(__DIR__)); // К основной директории, не public
define('TEMPLATES_DIR', ROOT . '/templates/'); // К модулям
define('LAYOUT_DIR', 'layouts/'); // К основным шаблонам
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

// DB config

define('HOST', 'localhost:3307');
define('USER', 'pakko');
define('PASS', '123');
define('DB', 'gallerybase');


// Подключение сервисных функций

include ROOT . "/engine/controller.php"; // Контролер
include ROOT . "/engine/db.php"; // Подключение к базе данных
include ROOT . "/engine/render.php"; // Прорисовка

// Модули

include ROOT . "/module/menu.php"; // Меню
include ROOT . "/module/feedback.php";  // Отзывы
include ROOT . "/module/catalog.php"; // Каталог
include ROOT . "/module/news.php"; // Новости
include ROOT . "/module/classSimpleImage.php"; // Библиотека которая делает resize
include ROOT . "/module/calculator.php"; // Калькулятор

// Всё что относится к модулю галерея

include ROOT . "/module/gallery/fileImg.php"; // Всё что относится к загрузке и удалению
include ROOT . "/module/gallery/uploadFile.php"; // Проверка на загрузку файла
include ROOT . "/module/gallery/dbGallery.php"; // Всё что связоно с запросами к галереи
