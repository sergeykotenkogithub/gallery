<?php

function calculatorController($params, $action ) {

    $params['arg1'] = 0;
    $params['arg2'] = 0;
    $params['result'] = 0;
    $arg1 = $_GET['arg1'];
    $arg2 = $_GET['arg2'];
    $operation = $_GET['operation'];
    if (isset($_GET['arg1']) && isset($_GET['arg2'])) {
        $params['arg1'] = $arg1;
        $params['arg2'] = $arg2;
        $params['result'] = doCalculatorOperation($arg1, $arg2, $operation);
    }

    $templateName = "/calc/calculator";

    return render($templateName, $params);

}


function calculatorOperateController($params) {

//    calculatorOne

    $params['arg1'] = 0;
    $params['arg2'] = 0;
    $params['result'] = 0;
    $arg1 = $_GET['arg1'];
    $arg2 = $_GET['arg2'];
    $operation = $_GET['operation'];
    if (isset($_GET['arg1']) && isset($_GET['arg2'])) {
        $params['arg1'] = $arg1;
        $params['arg2'] = $arg2;
        $params['result'] = doCalculatorOperation($arg1, $arg2, $operation);
    }

    $templateName = "/calc/calculatorOperate";

    return render($templateName, $params);

}


function calcAjaxController($params) {

    $templateName = '/calc/calcAjax';

    return render($templateName, $params);
}