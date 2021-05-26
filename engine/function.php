<?php

function renderTemplate($page, $params = []) {
    extract($params);

    ob_start();
    $filename = TEMPLATES_DIR . $page . ".php";
    if(file_exists($filename)) {
        include $filename;
    }

    return ob_get_clean();
}

function render ($page, $params = [], $layout = 'main') {
    return renderTemplate(LAYOUT_DIR . $layout, [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params),
        'title' => $params['title'],  // Заголок который находится в main.php
        'gall' => $params['gall'],
    ]);
}