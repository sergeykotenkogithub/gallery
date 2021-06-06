<?php

//.............Админ........................................

function adminController($params) {

    $params['order'] = adminOrder();

    $templateName = '/admin/admin';

    return render($templateName, $params);
}

// Админ страница с определённым заказом

function adminOrderController($params) {

    $id = (int)$_GET['id'];
    $adminOrder = $_POST['change'];
    $status_id = (int)$_POST['status_id'];
    $params['order'] = adminOrderItem($id);
    $params['summ'] = adminOrderTotal($id);
    $params['status'] = adminOrderStatus($id);

    if (isset($_POST['status_id']) && isset($_POST['change'])) {
        changeStatus($adminOrder, $status_id);
        header("Location: /adminOrder/?id=$status_id");
    }

    $templateName = '/admin/adminOrder';

    return render($templateName, $params);
}