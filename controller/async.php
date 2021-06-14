<?php

function asyncController($params) {
    if($_GET['action'] == 'buy') {
        $id = (int)$_GET['id'];
        $price = (int)$_GET['price'];
        $session = session_id(); // Сессия

        if (comparisonGoodsBasket($id, $session)) {
            changeBasketQuantity($id, $session);
        }   else {
            addBasket($session, $id, $price);
        }

        $countBasket = countGoodsBasketItem($session);
        $count = (($countBasket['count'])) ?: 0;

        echo json_encode(['count' => $count]);
        die();
    }
}