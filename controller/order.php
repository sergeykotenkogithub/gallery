<?php

//..............................Все что относится к заказу. Оформление.....................

function orderController($params) {

    $templateName = '/order/order';

    return render($templateName, $params);
}


// Заказы пользователя //

function myordersController($params, $action) {

    $id = (int)$_GET['id'];
    $params['order'] = getMyorders($id);
    $params['count_orders'] = count(getMyorders($id)) + 1;

    $templateName = '/order/myorders';

    return render($templateName, $params);
}


// Поздравления пользователя с оформлением заказа

function congratulationsController($params) {

    session_start();
    $session = session_id();
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $id = $_SESSION['id'];
    // Общая стоимость покупок в корзине
    $totalGet = getSumBasket($session);
    $total = (int)$totalGet['summ']; // преобразование в число

    if (isset($tel) && isset($email)) {
        // Если пользователь залогинился
        if (isset($id)) {
            pushAuthOrder($session, $tel, $email, $id, $total);
            session_regenerate_id();
            session_destroy();
        }
        else {
            pushOrder($session, $tel, $email, $total);
            session_regenerate_id();
            session_destroy();
        }
    }
    $templateName = '/order/congratulations';

    return render($templateName, $params);
}