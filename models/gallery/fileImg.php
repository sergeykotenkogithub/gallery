<?php



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

// При действие нажатия на кнопку удаления изображения

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