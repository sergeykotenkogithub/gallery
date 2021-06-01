<?php

function pushOrder($session, $tel, $email) {
    return getOneResultInto("INSERT INTO orders(hash, tel, email) VALUES('$session', '$tel', '$email')");
}
