<?php

function basketController($params) {

    session_start();
    $session = session_id();
    $params['basket'] = getBasketItem($session); // вывод товаров в корзине
    $params['summ'] = getSumBasket($session); // сумма товаров
    $quantity = $_GET['quantity'];
    $id = (int)$_GET['id'];
    doBasketAction($id, $session, $quantity);


    $templateName = 'basket';

    if(empty(getBasketItem($session))) {
//        var_dump(getBasketItem($session));
        $params['show'] = true;
    }
    else {
//        var_dump("Ghbdsd");
    }


    return render($templateName, $params);
}

