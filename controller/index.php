<?php

function indexController($params) {

    $params['name'] = $params['user'];
    $params['hello'] = 'Hello,';
    $params['welcome'] = 'Welcome !';
    $params['title'] = 'Hello';
    $background = $_GET['action'];
    changeThemeAction($background); // Изменение темы

    $templateName = 'index';

    return render($templateName, $params);
}