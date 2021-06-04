<?php

function getMyorders($id) {
    $sql = "SELECT o.users_id, o.hash, g.name, o.id FROM orders o JOIN basket b on b.session_id = o.hash join goods g on g.id = b.goods_id WHERE o.users_id = {$id} ORDER BY o.id";
    return getAssocResult($sql);
}
