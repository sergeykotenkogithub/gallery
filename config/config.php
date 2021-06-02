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
include ROOT . "/engine/menu.php"; // Меню

// Модели

include ROOT . "/models/feedback.php";  // Отзывы
include ROOT . "/models/goods.php"; // Каталог
include ROOT . "/models/news.php"; // Новости
include ROOT . "/models/classSimpleImage.php"; // Библиотека которая делает resize
include ROOT . "/models/calculator.php"; // Калькулятор
include ROOT . "/models/auth.php"; // Калькулятор
include ROOT . "/models/basket.php"; // Корзина
include ROOT . "/models/order.php"; // Заказы
include ROOT . "/models/admin.php"; // Заказы

// Всё что относится к модели: "gallery"

include ROOT . "/models/gallery/fileImg.php"; // Всё что относится к загрузке и удалению
include ROOT . "/models/gallery/uploadFile.php"; // Проверка на загрузку файла
include ROOT . "/models/gallery/dbGallery.php"; // Всё что связоно с запросами к галереи
