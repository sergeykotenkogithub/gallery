<?php

function pushOrder($session, $tel, $email) {
    return getOneResultInto("INSERT INTO orders(hash, tel, email) VALUES('$session', '$tel', '$email')");
}

function pushAuthOrder($session, $tel, $email, $id) {
    return getOneResultInto("INSERT INTO orders(hash, tel, email, users_id) VALUES('$session', '$tel', '$email', $id)");
}
