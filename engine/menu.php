<?php

// Главное меню

$menu = [
    [
        "title" => "Hello",
        "href" => "/",
    ],
    [
        "title" => "Gallery",
        "href" => "/gallery",
    ],
    [
        "title" => "News",
        "href" => "/news",
    ],
    [
        "title" => "Сalculator",
        "href" => "/calculator",
    ],
    [
        "title" => "Сalculator+",
        "href" => "/calculatorOperate",
    ],
    [
        "title" => "СalcAjax",
        "href" => "/calcAjax",
    ],
    [
        "title" => "Goods",
        "href" => "/goods",
    ],
    [
        "title" => "Feedback",
        "href" => "/feedback",
    ],
    [
        "title" => "Basket",
        "href" => "/basket",
    ],
];

function getMenu($menu)
{
    $ul = "<ul class=\"menu__wrapper\">";
    $url = $_SERVER['REQUEST_URI'];

    foreach ($menu as $item) {

        if ($url ==  $item['href']) {
            $url1 = "active";
        } else {
            $url1 = "noactive";
        }

        $ul .= "<li class=\"menu__link {$url1}\" ><a href=\" {$item['href']}\">{$item['title']}</a></li>";
    }

    $ul .= "</ul>";
    return $ul;
}







