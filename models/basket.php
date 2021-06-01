<?php

function deleteBasketItem($id) {
    return getOneResultInto("DELETE FROM `basket` where id = {$id};");
}

function getBasketItem() {
    return getAssocResult("SELECT * FROM gallery ORDER BY views DESC");
}