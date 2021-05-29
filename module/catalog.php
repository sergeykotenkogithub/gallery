<?php
function getAllCatalog() {
    $sql = "SELECT * FROM `catalog`";
    return getAssocResult($sql);
}

//return getAssocResult("SELECT * FROM gallery");

// Отдельная страница одного товара

function getOneCatalog($id) {
    return getOneResult("SELECT * FROM catalog WHERE id = {$id}");
}