<?php

// Автоматическое подключение в папку engine

$lib_file = array_splice(scandir(ENGINE_DIR), 2);

foreach ($lib_file as $file) {
    if ($file != "lib_autoload.php") {
        include ENGINE_DIR . $file; // Контролер
    }
}