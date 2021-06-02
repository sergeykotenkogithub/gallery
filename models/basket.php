<?php

function deleteBasketItem($id) {
    return getOneResultInto("DELETE FROM `basket` where id = {$id};");
}

function getBasketItem($session) {
    return getAssocResult("SELECT basket.id as basket_id, goods.id as goods_id, goods.name as name, goods.price as price, basket.session_id as session_id, goods.image as image FROM basket, goods WHERE basket.goods_id=goods.id AND session_id='{$session}'");
}

function countGoodsBasketItem($session) {
    return getOneResult("SELECT count(id) as count FROM basket WHERE session_id = '{$session}' ");
}

function getSumBasket($session) {
    return getOneResult("SELECT SUM(goods.price) as summ FROM basket, goods WHERE basket.goods_id = goods.id AND session_id = '{$session}'");
}