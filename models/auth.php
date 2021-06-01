<?php

function get_user()
{
    return $_SESSION['login'];
}

function isAuth() {
    if (isset($_COOKIE['hash'])) {
        $hash = $_COOKIE["hash"];
        $sql = "SELECT * FROM users WHERE hash = '{$hash}'";
        $result = mysqli_query(getDb(), $sql);
        if ($result) {
            $row = mysql_fetch_assoc($result);
            $user = $row['login'];
            if (!empty($user)) {
                $_SESSION['login'] = $user;
            }
        }
    }
    return isset($_SESSION['login']);
}

function auth($login, $pass) {
    $login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($login)));
    $result = mysqli_query(getDb(), "SELECT * FROM users WHERE login = '{$login}' ");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($pass == $row['pass']) {
            //Авторизация
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $row['id'];
            return true;
        }
    }
    return false;
}