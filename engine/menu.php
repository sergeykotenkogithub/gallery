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
        "title" => "Сatalog",
        "href" => "/catalog",
    ],
    [
        "title" => "Feedback",
        "href" => "/feedback",
    ],
];

function getMenu($menu)
{
    $ul = "<ul class=\"menu__wrapper\">";

    foreach ($menu as $item) {
        $ul .= "<li class=\"menu__link\"><a href=\"{$item['href']}\">{$item['title']}</a></li>";
    }

    $ul .= "</ul>";
    return $ul;
}