<?php

// Вывод картинок gallery_img/big/
function getImages() {
    return $files = array_splice( scandir(IMG_BIG), 2);
}
$getImages = getImages();

