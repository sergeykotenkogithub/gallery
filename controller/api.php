<?php

function apicalcController($params) {

    $data = json_decode(file_get_contents('php://input'));
    $arg1 = $data->arg1;
    $arg2 = $data->arg2;
    $operation = $data->operation;
    header("Content-type: application/json");
    return json_encode(doCalculatorOperation($arg1, $arg2, $operation));
//    die();

//    $templateName = 'calcAjax';
//
//    return render($templateName, $params);
}