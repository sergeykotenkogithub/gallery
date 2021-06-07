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

    $message = '';
    $messages = [
        'OK' => 'Cообщение добавлено',
        'DELETE' => 'Cообщение удалено',
        'EDIT' => 'Cообщение изменено',
        'ERROR' => 'Ошибка'
    ];


    session_start();
    $session = session_id();
    $id_get = (int)$_GET['id'];
    $params['goods'] = getOneCatalog($id_get); // Вывоодит информацию о товаре
    $params['feedback'] = getItemFeedback($id_get);  // Показывает отзывы
    $price = $_POST['price'];
    $id = $_POST['goods_id'];

    //.................Получение обратной связи по форме...................

    $feedback_id = (int)$_POST['feedback_id'];
    $name =  strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));

    // Проверка чтобы был текст в имени и в комментарии
    if ($name ==! '' && $feedback ==! '' && isset($feedback_id)) {
        feedbackAdd($name, $feedback, $feedback_id);
        header("Location: /goodsItem/?id=$feedback_id&message=OK");
        die();
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

    // Сообщение

    if(isset($_GET['message'])) {
        $params['message'] = $messages[$_GET['message']];
    }


    $templateName = '/goods/goodsItem';

    return render($templateName, $params);
}
