<?php

// Подключение основного конфигурационого файла

include $_SERVER['DOCUMENT_ROOT'] .  "/../config/config.php";

// .................................................................................

// ЧПУ

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$action = $url_array[2];
if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

// .................................................................................

// Переход в контролер

$params = prepareVariables($page, $menu, $action, $layout);

// .................................................................................

// Отображение на странице

echo render($page, $params);
