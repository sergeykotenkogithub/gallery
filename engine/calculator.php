<?php

function getArg($arg1,$arg2 ) {

    if (isset($_GET['arg1'])) {
//        $result = $arg1 + $arg2;
//        $params['result'] = $result;
//        $params['result'] = $result;
        $params['arg1'] = $arg1;
//        $params['arg2'] = $arg2;

    }

    return $params['arg1'];
}
