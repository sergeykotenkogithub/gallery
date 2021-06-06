<?php

//.............Заказы пользователя........................................

function myordersController($params, $action) {

    $id = (int)$_GET['id'];
    $params['order'] = getMyorders($id);
    $params['count_orders'] = count(getMyorders($id)) + 1;

    $templateName = 'myorders';

    return render($templateName, $params);
}