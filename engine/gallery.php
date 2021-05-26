<?php

function getGallery() {
    return getAssocResult("SELECT * FROM gallery");
}

function getOneGallery($id) {
    return getOneResult("SELECT * FROM gallery WHERE id = {$id}");
}

function pushOneGallery($nameImg) {
//    return getOneResult("INSERT gallery(image) VALUES($nameImg)");
    return getOneResultInto("INSERT INTO gallery (image) VALUES('$nameImg')");
}

function changeViews($id) {
//    return getOneResult("INSERT gallery(image) VALUES($nameImg)");
    return getOneResultInto("UPDATE `gallery` SET `views` = views + 1 WHERE `id` = {$id};");
}

//if ($_GET['page'] == 'galleryone') {
//    $id = (int)$_GET['id'];
//    changeViews($id);
//}
