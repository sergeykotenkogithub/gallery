<?php

include "config/config.php";


// ................................................................


// .................................................................................

$messageUpload = [
    'OK' => 'Файл успешно загружен',
    'ERROR' => 'Ошибка',
    'JPG' => 'Можно загружать только jpg-файлы',
    'DOUBLE' => 'Файл существует, выберите другое имя файла!',
    'BIGSIZE' => 'Размер файла не больше 5 мб',
    'NOTPHP' => 'Загрузка php-файлов запрещена!',
    'NOTIMG' => 'Можно загружать только jpg-файлы, неверное содержание файла, не изображение',
];


// Загрузка файла

if (isset($_FILES['myfile'])) {

// Перемещение файла

    $path = "gallery_img/big/" . $_FILES['myfile']['name'];
    define("UPLOADDIR", "gallery_img/big/"); // Куда
    define("UPLOADRESIZE", "gallery_img/small/"); // Resize
    $uploadfile = UPLOADDIR . basename($_FILES['myfile']['name']);

// .................................................................................

// Проверка

    //Проверка существует ли файл
    if (file_exists($uploadfile)) {
        header("Location: /?page=gallery&message=DOUBLE");
        exit;
    }
    //Проверка на размер файла
    if($_FILES["myfile"]["size"] > 1024*5*1024)
    {
        header("Location: /?page=gallery&message=BIGSIZE");
        exit;
    }
    //Проверка расширения файла
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if(preg_match("/$item\$/i", $_FILES['myfile']['name'])) {
            header("Location: /?page=gallery&message=NOTPHP");
            exit;
        }
    }
    //Проверка на тип файла
    $imageinfo = getimagesize($_FILES['myfile']['tmp_name']);
    if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
        header("Location: /?page=gallery&message=NOTIMG");
        exit;
    }
    if($_FILES['myfile']['type'] != "image/jpeg") {
        header("Location: /?page=gallery&message=JPG");
        exit;
    }
    // Сообщение о загрузке файла
    if (move_uploaded_file($_FILES['myfile']['tmp_name'], $path)){
        header("Location: /?page=gallery&message=OK");
    }
    else {
        header("Location: /?page=gallery&message=ERROR");
        die();
    }

// .................................................................................

    // Делаю так чтобы название файла переимоновывался в число по порядку

    $nameUploadFile = $_FILES['myfile']['name'];

    $last = $giveFile[array_key_last($giveFile)]; // 15.jpg
    // Получаю расширение загруженного файла к примеру jpg
    $substr  = substr($nameUploadFile,strripos($nameUploadFile ,'.')+1);  // jpg
    // Увеличиваю на 1 значение, чтоб по порядку переименовывалось
    $lastSum = $last+1; // 16 Так как идёт неявное
    $newName = "$lastSum" . ".$substr"; // Склеиваю 16 и расширение к примеру jpg, получается 16.jpg
    // Переименование файла
    $file = UPLOADDIR . "$nameUploadFile";
    $newRename = UPLOADDIR . "$newName";
    rename($file, $newRename);

    // .................................................................................

    // Уменьшает размер картинки

    include('classSimpleImage.php');
    $image = new SimpleImage();
    $image->load(UPLOADDIR . "$newName");
    $image->resize(150, 100);
    $image->save( UPLOADRESIZE . "$newName");

}

$message = $messageUpload[$_GET['page=gallery&message']];


//ДВИЖОК

$page ='index';
if(isset($_GET['page'])) {
    $page = $_GET['page'];
}

// На всех страницах какой-то параметр

$params = [
//    'title' => 'Галерея'  // Тут передаётся на страницу, а как передать в layout? и разные сделать значение для каждой страницы
    'list' => getMenu($menu),
];

//Переменные для страниц
switch ($page) {
    case 'index':
        $params['hello'] = 'Hello,';
        $params['welcome'] = 'Welcome !';
        break;
    case 'gallery':
        $params['giveFile'] = getFile();
        $params['message'] = $messageUpload[$_GET['message']];
        break;
}

echo render($page, $params);