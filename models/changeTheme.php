<?php
function changeThemeAction($background) {

    switch ($background) {
        case 'style1':
            setcookie('color', '1.css', time() + 3600, '/');
            header('Location: /index');
            break;
        case 'style2':
            setcookie('color', '2.css', time() + 3600, '/');
            header('Location: /index');
            break;
        case 'style3':
            setcookie('color', '3.css', time() + 3600, '/');
            header('Location: /index');
            break;
        case 'style4':
            setcookie('color', '4.css', time() + 3600, '/');
            header('Location: /index');
            break;
    }

    //    if ($action == "style1") {
//        setcookie('color', '1.css', time() + 3600, '/');
////        header('Location: /index');
//    }
//    if ($action == "style2") {
//        setcookie('color', '2.css', time() + 3600, '/');
////            header('Location: /index');
//    }
//    if ($action == "style3") {
//        setcookie('color', '3.css', time() + 3600, '/');
////        header('Location: /index');
//    }
//    if ($action == "style4") {
//        setcookie('color', '4.css', time() + 3600, '/');
////        header('Location: /index');
//    }

}