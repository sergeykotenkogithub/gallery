<?php

function getAllCatalog() {
    $sql = "SELECT * FROM `goods`";
    return getAssocResult($sql);
}

// Отдельная страница одного товара

function getOneCatalog($id) {
    return getOneResult("SELECT * FROM goods WHERE id = {$id}");
}

function getItemFeedback($id) {
    return getOneResult("SELECT g.id, g.name, f.name, f.feedback FROM goods g join feedback f on g.id = f.goods_id WHERE g.id = {$id}");
}

// Добавление товара в корзину

function addBasket($session, $id) {
    $sql = "INSERT INTO basket (session_id, goods_id) VALUE ('{$session}', '{$id}') ";
    return getOneResultInto($sql);
}


function addBasketItem () {

}



