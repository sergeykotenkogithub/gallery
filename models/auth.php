<?php

function get_user()
{
    return $_SESSION['login'];
}
function get_admin()
{
    return $_SESSION['admin'];
}

function isAuth() {
    if (isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
        $hash = $_COOKIE["hash"];
        $sql = "SELECT * FROM users WHERE hash = '{$hash}'";
        $result = mysqli_query(getDb(), $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $user = $row['login'];
            if (!empty($user)) {
                $_SESSION['login'] = $user;
                return 1;
            }
        }
    }
    elseif (isset($_COOKIE['adminhash']) && !isset($_SESSION['admin'])) {
        $hash = $_COOKIE["adminhash"];
        $sql = "SELECT * FROM users WHERE hash = '{$hash}'";
        $result = mysqli_query(getDb(), $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $user = $row['login'];
            if (!empty($user)) {
                $_SESSION['admin'] = $user;
                return 2;
            }
        }
    }
    elseif (isset($_SESSION['login'])) {
        return 1;
    }
    elseif (isset($_SESSION['admin'])) {
        return 2;
    }
}

// Проверка для входа
function loginEnter ($login, $pass) {
    if (auth($login, $pass)) {
        if (isset($_POST['save'])) {
            $hash = uniqid(rand(), true);
            $id = $_SESSION['id'];
            $sql = "UPDATE users SET hash = '{$hash}' WHERE id = {$id}";
            $result = mysqli_query(getDb(), $sql);
            $result2 = mysqli_query(getDb(), "SELECT * FROM users WHERE login = '{$login}' AND id = 1");
            $row = mysqli_fetch_assoc($result2);
             if ($row)   {
                 setcookie("adminhash", $hash, time() +3600, "/");
             }
             else {
                 setcookie("hash", $hash, time() +3600, "/");
             }
        }
        header("Location: /");
        die();
    } else {
        die("Не верный логин пароль");
    }
}


function auth($login, $pass) {
    $login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($login)));
    $result = mysqli_query(getDb(), "SELECT * FROM users WHERE login = '{$login}' ");
    $result2 = mysqli_query(getDb(), "SELECT * FROM users WHERE login = '{$login}' AND id = 1");

    if ($result2) {
        $row = mysqli_fetch_assoc($result2);
        if (password_verify($pass, $row['pass'])) {
            //Авторизация
            $_SESSION['admin'] = $login;
            $_SESSION['id'] = $row['id'];
            return true;
        }
    }
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['pass'])) {
            //Авторизация
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $row['id'];
            return true;
        }
    }
    return false;
}

// Для региcтрации

function registration($login, $pass) {
    $sql = "INSERT INTO users (login, `pass`) VALUES('$login', '$pass')";
    return getOneResultInto($sql);

//    return getOneResultInto("INSERT INTO users (login,`pass`) VALUES('$login')");
}

function getLogin($login) {
    $sql = "SELECT * FROM users WHERE login = '{$login}'";
    return executeSql($sql);
}
