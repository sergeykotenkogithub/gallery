<?php

function goodsController($params) {

    session_start();
    $session = session_id();
    $params['goods'] = getAllCatalog();
    $id = $_POST['goods_id'];
    $price = $_POST['price'];

    // Добавление товара в корзину, если есть такой то увеличивает количество
    if (isset($id)) {

        // Сравнение товара с базой данных в basket

//                $comparisonGoodsBasket = comparisonGoodsBasket($id, $session);

        if (comparisonGoodsBasket($id, $session)) {
            changeBasketQuantity($id, $session);
            header("Location: /goods");
            die();
        }   else {
            addBasket($session, $id, $price);
            header("Location: /goods");
            die();
        }
    }

    $templateName = '/goods/goods';

    return render($templateName, $params);
}

function goodsItemController($params) {

    session_start();
    $session = session_id();
    $id_get = (int)$_GET['id'];
    $params['goods'] = getOneCatalog($id_get); // Вывоодит информацию о товаре
    $params['feedback'] = getItemFeedback($id_get);  // Показывает отзывы
    $price = $_POST['price'];
    $id = $_POST['goods_id'];
    $c = getItemFeedback($id_get);

    //.................Получение обратной связи по форме...................

    $feedback_id = $_POST['feedback_id'];
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];

    // Проверка чтобы был текст в имени и в комментарии
    if ($name ==! '' && $feedback ==! '' && isset($feedback_id)) {
//        var_dump($feedback_id);
//        var_dump($name);
//        var_dump($feedback);
        feedbackAdd($name, $feedback, $feedback_id);
        header("Location: /goodsItem/?id=$feedback_id");
//        var_dump($c);
    }

    // Если есть в корзине такой товар то добавляет количество, если нет то добавляет новый товар
    if (isset($id)) {

        $comparisonGoodsBasket = comparisonGoodsBasket($id, $session);

        // Сравнение товара с базой данных в basket

        if ($comparisonGoodsBasket) {
            changeBasketQuantity($id, $session);
            header("Location: /goodsItem/?id={$id}");
            die();
        }   else {
            addBasket($session, $id, $price);
            header("Location: /goodsItem/?id={$id}");
            die();
        }
    }

    $templateName = '/goods/goodsItem';

    return render($templateName, $params);
}
