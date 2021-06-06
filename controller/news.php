<?php

//.............News........................................

function newsController($params) {

    $params['news'] = getNews();

    $templateName = '/news/index';

    return render($templateName, $params);
}

function newsoneController($params, $action) {

    $id = (int)$_GET['id'];
    $params['news'] = getOneNews($id);

    $templateName = '/news/newsone';

    return render($templateName, $params);
}