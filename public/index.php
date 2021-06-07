<?php

session_start(); //Старт сессии

// Подключение основного конфигурационого файла
include $_SERVER['DOCUMENT_ROOT'] .  "/../config/config.php";

// ..........................ЧПУ.......................................................

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$action = $url_array[2];
if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

// ....................Параметры для всех страниц..............................

$params = [

    'layout' => 'main', // Выбор основного шаблона из папки layout по умолчанию
    'list' => getMenu($menu),  // Отображение меню
    'name' => get_user(), // Отображение имени пользователя
    'name_admin' => get_admin(), // Отображение имени адмистратора

    /* Показывать меню для админа или для клиента */
    'admin' => ((isAuth() == 2)),
    'auth' => ((isAuth() == 1)),

    /* Для отображения меню Myorders авторизированного пользователя.
    Сделал переменную в общем шаблоне чтоб на всех страницах было видно это меню */
    'myorders' => $_SESSION['id'],

];

// .......................Смена темы.....................................

if (isset($_COOKIE['color']))
{
    $params['add'] = $_COOKIE['color'];
}
else {
    $params['add'] = "2.css";
}

// .....................Проврерка авторизации............................

if (isAuth()) {
    $params['auth'] = true;
    $params['user'] = get_user();
}

//..................Показывает количество товаров в корзине.............

$session = session_id(); // Сессия

$countBasket = countGoodsBasketItem($session);
$count = (($countBasket['count'])) ?: 0;
$params['count'] = $count;





// ......................Отображение.....................................

$controllerName = $page . "Controller";

if (function_exists($controllerName)) {
    echo $controllerName($params, $action);
} else {
    die("Не правильный котроллер!");
}