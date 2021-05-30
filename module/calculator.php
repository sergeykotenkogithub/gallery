<?php

function doCalculatorOperation($arg1, $arg2, $operation) {
    if ($operation == 'add') {
        $result = $arg1 + $arg2;
        $params['result'] = $result;
    }
    if ($operation == 'sub') {
        $result = $arg1 - $arg2;
        $params['result'] = $result;
    }
    if ($operation == 'mul') {
        $result = $arg1 * $arg2;
        $params['result'] = $result;
    }
    if ($operation == 'div') {
        if ($arg2 ==! 0) {
            $result = $arg1 / $arg2;
            $params['result'] = $result;
        }
        else {
            $params['result'] = 'Невозможно разделить на 0';
        }
    }
    return $params['result'];
}
