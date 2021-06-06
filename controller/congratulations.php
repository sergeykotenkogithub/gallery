<?php

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
    $templateName = 'congratulations';

    return render($templateName, $params);
}


