<?php
// Вывод имён файлов в папке gallery_img/big/

function getFile() {
    $files = array_splice( scandir("gallery_img/big/"), 2);
    return $files;
}
$giveFile = getFile();

// .................................................................................

$messageUpload = [
    'OK' => 'Файл успешно загружен',
    'ERROR' => 'Ошибка',
];


// Загрузка файла

if (isset($_FILES['myfile'])) {

// Перемещение файла

    $path = "gallery_img/big/" . $_FILES['myfile']['name'];

// .................................................................................

// Проверка

    $uploaddir = 'gallery_img/big/'; // Relative path under webroot
    $uploadfile = $uploaddir . basename($_FILES['myfile']['name']);


    //Проверка существует ли файл
    if (file_exists($uploadfile)) {
        $message = "Файл $uploadfile существует, выберите другое имя файла!";
        header("Location: /?message=ERROR");
        exit;
    }
    //Проверка на размер файла
    if($_FILES["myfile"]["size"] > 1024*1*1024)
    {
        $message = "Размер файла не больше 5 мб";
        header("Location: /?message=ERROR");
        exit;
    }
    //Проверка расширения файла
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if(preg_match("/$item\$/i", $_FILES['myfile']['name'])) {
            $message = "Загрузка php-файлов запрещена!";
            header("Location: /?message=ERROR");
            exit;
        }
    }
    //Проверка на тип файла
    $imageinfo = getimagesize($_FILES['myfile']['tmp_name']);
    if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
        $message = "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
        header("Location: /?message=ERROR");
        exit;
    }
    if($_FILES['myfile']['type'] != "image/jpeg") {
        $message = "Можно загружать только jpg-файлы.";
        header("Location: /?message=ERROR");
        exit;
    }
    // Сообщение о загрузке файла
    if (move_uploaded_file($_FILES['myfile']['tmp_name'], $path)){
        $message = "Файл успешно загружен.";
        header("Location: /?message=OK");
    }
    else {
        $message = "Загрузка не получилась.";
        header("Location: /?message=ERROR");
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
    $file = "gallery_img/big/$nameUploadFile";
    $new_name = "gallery_img/big/$newName";
    rename($file, $new_name);

    // .................................................................................

    // Уменьшает размер картинки

    include('classSimpleImage.php');
    $image = new SimpleImage();
    $image->load("gallery_img/big/$newName");
    $image->resize(150, 100);
    $image->save("gallery_img/small/$newName");

}

$message = $messageUpload[$_GET['message']];
