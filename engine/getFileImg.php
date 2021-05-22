<?php

// Вывод картинок gallery_img/big/
function getFile() {
    $files = array_splice( scandir("gallery_img/big/"), 2);
    return $files;
}
$giveFile = getFile();
