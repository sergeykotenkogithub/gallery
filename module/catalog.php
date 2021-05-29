<?php

function getAllCatalog() {
    $sql = "SELECT * FROM `catalog`";
    return getAssocResult($sql);
}

// Отдельная страница одного товара

function getOneCatalog($id) {
    return getOneResult("SELECT * FROM catalog WHERE id = {$id}");
}

function getItemFeedback($id) {
    return getOneResult("SELECT c.name, f.name, f.feedback FROM catalog c join feedback f on c.id = f.category_id WHERE c.id = {$id}");
}