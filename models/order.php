<?php

function pushOrder($session, $tel, $email, $total) {
    return getOneResultInto("INSERT INTO orders(hash, tel, email, `total`) VALUES('$session', '$tel', '$email', $total)");
}

function pushAuthOrder($session, $tel, $email, $id, $total) {
    return getOneResultInto("INSERT INTO orders(hash, tel, email, users_id, `total`) VALUES('$session', '$tel', '$email', $id, $total)");
}
