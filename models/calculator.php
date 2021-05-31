<?php

function doCalculatorOperation($arg1, $arg2, $operation) {
    if ($operation == '+') {
        $result = $arg1 + $arg2;
    }
    if ($operation == '-') {
        $result = $arg1 - $arg2;
    }
    if ($operation == '*') {
        $result = $arg1 * $arg2;
    }
    if ($operation == '/') {
        if ($arg2 ==! 0) {
            $result = $arg1 / $arg2;
        }
        else {
            $result = 'Невозможно разделить на 0';
        }
    }
    return $result;
}
