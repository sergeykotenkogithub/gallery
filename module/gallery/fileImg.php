<?php

// Вывод картинок gallery_img/big/
function getImages() {
    return $files = array_splice( scandir(IMG_BIG), 2);
}
$getImages = getImages();

function deleteImg($idHard) {
    // Удаление с компьютера

    $filepath = IMG_BIG . $idHard;
    $filepath2 = IMG_SMALL . $idHard;
    unlink($filepath);
    unlink($filepath2);
    //Вывод сообщения !!! Не выходит !!!
    $message_del = "Изображение удалено";
    header("Location: /gallery/?message_del={$message_del}");
    die();
}

function doGalleryAction($action) {
    $message_del = "";
    if ($action == 'delete') {
        $id = (int)$_GET['id'];
        deleteViews($id);  // Удаление с базы данных
        $idHard = $_GET['name'];
        deleteImg($idHard); // Удаление с компьютера
    }
    return $message_del;
}