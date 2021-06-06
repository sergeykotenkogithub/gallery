<?php

//..........................Авторизация и Регистрация.....................................

// Вход //

function loginController($params, $action) {

    $login = strip_tags(htmlspecialchars(($_POST['login'])));
    $pass = strip_tags(htmlspecialchars(($_POST['pass'])));
    loginEnter($login, $pass);

    $templateName = 'login';

    return render($templateName, $params);
}

// Выход //

function logoutController($params, $action) {

    setcookie("hash", "", time()-1, "/" );
    setcookie("adminhash", "", time()-1, "/" );
    session_unset();
    session_regenerate_id();
    session_destroy();
    header("Location: /");
    die();

    $templateName = 'logout';

    return render($templateName, $params);
}

// Регистрация

function registrationController($params, $action) {

    $login =  strip_tags(htmlspecialchars(($_POST['login'])));
    $pass = strip_tags(htmlspecialchars(($_POST['pass'])));
    $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
    $row = getLogin($login);
    if (isset($login) && isset($pass)) {
        if ($row) {
            $params['success'] = 'Такой логин уже есть';
        }
        else {
            registration($login, $pass_hash);
            $params['not_success'] = 'Поздравляю! Вы зарегестрировались. ';
        }
    }

    $templateName = 'registration';

    return render($templateName, $params);
}
