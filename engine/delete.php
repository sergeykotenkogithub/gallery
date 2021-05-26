<?php

function deleteImg($idHard) {
    // Удаление с компьютера

    $filepath = IMG_BIG . $idHard;
    $filepath2 = IMG_SMALL . $idHard;
    unlink($filepath);
    unlink($filepath2);
    //Вывод сообщения !!! Не выходит !!!
    $message_del = "Изображение удалено";
    header("Location: ?page=gallery&message_del={$message_del}");
    die();
}