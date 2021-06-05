<?php

function getMyorders($id) {
    $sql = "SELECT o.hash, g.name, o.id, b.quantity, g.image, b.price, o.status, o.total FROM orders o JOIN basket b on b.session_id = o.hash join goods g on g.id = b.goods_id WHERE o.users_id = {$id} ORDER BY o.id DESC";
    return getAssocResult($sql);
}
