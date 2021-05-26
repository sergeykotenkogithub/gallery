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