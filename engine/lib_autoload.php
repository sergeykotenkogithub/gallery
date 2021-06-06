<?php

// Автоматическое подключение файлов в папку, чтоб самому не прописывать каждый include

function autoloader($catalog) {
    $lib_file = array_splice(scandir(ROOT . "/" . $catalog . "/"), 2);

    foreach ($lib_file as $file) {
        if ($file != "lib_autoload.php") {
            include ROOT . "/" . $catalog . "/"  . $file;
        }
    }
}

