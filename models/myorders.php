<?php

function getMyorders($id) {
    $sql = "SELECT o.hash, g.name, o.id, b.quantity, g.image, b.price FROM orders o JOIN basket b on b.session_id = o.hash join goods g on g.id = b.goods_id WHERE o.users_id = 2 ORDER BY o.id";
    return getAssocResult($sql);
}
