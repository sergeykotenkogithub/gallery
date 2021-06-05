<?php

function deleteBasketItemAll($id, $session) {
    return getOneResultInto("DELETE FROM `basket` where id = {$id} AND session_id = '{$session}' ;");
}

function getBasketItem($session) {
    return getAssocResult("SELECT basket.id as basket_id, goods.id as goods_id, goods.name as name, basket.price as price, basket.session_id as session_id, goods.image as image, basket.quantity FROM basket, goods WHERE basket.goods_id=goods.id AND session_id='{$session}'");
}

function countGoodsBasketItem($session) {
    return getOneResult("SELECT sum(quantity) as `count` FROM basket WHERE session_id = '{$session}' ");
}

function getSumBasket($session) {
    return getOneResult("SELECT SUM(basket.price) as summ FROM basket, goods WHERE basket.goods_id = goods.id AND session_id = '{$session}'");
}


function changeBasketQuantity($id, $session) {
    return getOneResultInto("UPDATE `basket` SET `quantity` = quantity + 1, price = price + price_origin WHERE `goods_id` = {$id} AND session_id = '{$session}';");
}

function addBasket($session, $id, $price) {
    $sql = "INSERT INTO basket (session_id, goods_id, price, price_origin) VALUE ('{$session}', '{$id}', '{$price}', '{$price}') ";
    return getOneResultInto($sql);
}

function addBasketItem($id, $session) {
    return getOneResultInto("UPDATE `basket` SET `quantity` = quantity + 1, price = price + price_origin WHERE `id` = {$id} AND session_id = '{$session}';");
}
function deleteBasketItem($id, $session) {
    return getOneResultInto("UPDATE `basket` SET `quantity` = quantity - 1, price = price - price_origin WHERE `id` = {$id} AND session_id = '{$session}';");
}

// Функции в контролере:

function doBasketAction($id, $session, $quantity) {
    if (($_GET['action'] == 'delete')){
        deleteBasketItemAll($id, $session);
        header("Location: /basket");
    }
    if (($_GET['action'] == 'add')){
        addBasketItem($id, $session);
        header("Location: /basket");
    }
    if (($_GET['action'] == 'deleteitem')){
        if ($quantity < 2) {
            deleteBasketItemAll($id, $session);
            header("Location: /basket");
        }
        else {
            deleteBasketItem($id, $session);
            header("Location: /basket");
        }
    }
}