<?php

//.............................Пути файлов...................................................................

define('ROOT', dirname(__DIR__)); // К основной директории, не public
define('TEMPLATES_DIR', ROOT . '/templates/'); // К модулям
define('LAYOUT_DIR', '_layouts/'); // К основным шаблонам
define('IMG_BIG', $_SERVER['DOCUMENT_ROOT'] . '/gallery_img/big/'); // Большие картинки
define('IMG_SMALL', $_SERVER['DOCUMENT_ROOT'] . '/gallery_img/small/'); // Маленькие картинки
define('IMG_SMALL', $_SERVER['DOCUMENT_ROOT'] . '/gallery_img/small/'); // Маленькие картинки

//..............................DB config....................................................................

define('HOST', 'localhost:3307');
define('USER', 'pakko');
define('PASS', '123');
define('DB', 'gallerybase');


//.......................Подключение сервисных функций........................................................

include ROOT . "/engine/lib_autoload.php";  // Функция автоматического подключение файлов

//autoloader("engine");
include ROOT . "/engine/db.php"; // Подключение к базе данных
include ROOT . "/engine/render.php"; // Прорисовка
include ROOT . "/engine/menu.php"; // Меню

//.....................Автоматическое подключение файлов....................................................

autoloader("controller"); // Подключение контроллеров
//autoloader("models"); // Подключение моделей общих
//var_dump(autoloaders('engine'));
// Модели

include ROOT . "/models/feedback.php";  // Отзывы
include ROOT . "/models/goods.php"; // Каталог
include ROOT . "/models/news.php"; // Новости
include ROOT . "/models/classSimpleImage.php"; // Библиотека которая делает resize
include ROOT . "/models/calculator.php"; // Калькулятор
include ROOT . "/models/auth.php"; // Калькулятор
include ROOT . "/models/basket.php"; // Корзина
include ROOT . "/models/order.php"; // Заказы
include ROOT . "/models/admin.php"; // Админ
include ROOT . "/models/changeTheme.php"; // Заказы
include ROOT . "/models/myorders.php"; // Заказы

// Всё что относится к модели: "gallery"

include ROOT . "/models/gallery/fileImg.php"; // Всё что относится к загрузке и удалению
include ROOT . "/models/gallery/uploadFile.php"; // Проверка на загрузку файла
include ROOT . "/models/gallery/dbGallery.php"; // Всё что связоно с запросами к галереи
