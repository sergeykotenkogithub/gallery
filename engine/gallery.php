<?php

function getGallery() {
    return getAssocResult("SELECT * FROM gallery");
}

// Сортировка
function getGallerySorting() {
    return getAssocResult("SELECT * FROM gallery ORDER BY views DESC");
}

function getOneGallery($id) {
    return getOneResult("SELECT * FROM gallery WHERE id = {$id}");
}

function pushOneGallery($nameImg) {
    return getOneResultInto("INSERT INTO gallery (image) VALUES('$nameImg')");
}

function changeViews($id) {
    return getOneResultInto("UPDATE `gallery` SET `views` = views + 1 WHERE `id` = {$id};");
}

function deleteViews($id) {
    return getOneResultInto("DELETE FROM `gallery` where id = {$id};");
}

if ($_GET['action'] == 'delete') {

    // Удаление с базы данных
    $id = (int)$_GET['id'];
    deleteViews($id);

   // Удаление с компьютера
    $idHard = $_GET['name'];
    $filepath = IMG_BIG . $idHard;
    $filepath2 = IMG_SMALL . $idHard;
    unlink($filepath);
    unlink($filepath2);
}

//$filepath =
//unlink($filepath);