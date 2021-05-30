<?php

function doCalculatorOperation($arg1, $arg2, $operation) {
    if ($operation == 'add') {
        $result = $arg1 + $arg2;
    }
    if ($operation == 'sub') {
        $result = $arg1 - $arg2;
    }
    if ($operation == 'mul') {
        $result = $arg1 * $arg2;
    }
    if ($operation == 'div') {
        if ($arg2 ==! 0) {
            $result = $arg1 / $arg2;
        }
        else {
            $result = 'Невозможно разделить на 0';
        }
    }
    return $result;
}
