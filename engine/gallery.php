<?php

function getGallery() {
    return getAssocResult("SELECT * FROM gallery");
}

function getOneGallery($id) {
    return getOneResult("SELECT * FROM gallery WHERE id = {$id}");
}
