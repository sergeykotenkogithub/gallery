<?php

function getAllCatalog() {
    $sql = "SELECT * FROM `goods`";
    return getAssocResult($sql);
}

// Отдельная страница одного товара

function getOneCatalog($id) {
    return getOneResult("SELECT * FROM goods WHERE id = {$id}");
}

function getItemFeedback($id) {
    return getOneResult("SELECT g.name, f.name, f.feedback FROM goods g join feedback f on g.id = f.category_id WHERE g.id = {$id}");
}