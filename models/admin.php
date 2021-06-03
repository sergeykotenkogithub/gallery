<?php

function adminOrder() {
    return getAssocResult("SELECT * FROM orders ORDER BY id DESC");
}

function adminOrderItem($id) {
    return getAssocResult("SELECT * FROM basket,orders,goods WHERE basket.session_id = orders.hash AND orders.id = '{$id}' AND basket.goods_id = goods.id");
}

function adminOrderTotal($id) {
    return getOneResult("SELECT SUM(basket.price) as `summ` FROM basket,orders,goods WHERE basket.session_id = orders.hash AND orders.id = '{$id}' AND basket.goods_id = goods.id");
}

//function getBasketItem($session) {
//    return getAssocResult("SELECT basket.id as basket_id, goods.id as goods_id, goods.name as name, goods.price as price, basket.session_id as session_id, goods.image as image, basket.quantity FROM basket, goods WHERE basket.goods_id=goods.id AND session_id='{$session}'");
//}