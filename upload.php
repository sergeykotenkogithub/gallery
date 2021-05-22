<?php

$uploaddir = 'gallery_img/big/'; // Relative path under webroot
$uploadfile = $uploaddir . basename($_FILES['myfile']['name']);

//Проверка существует ли файл
if (file_exists($uploadfile)) { $message = "Файл $uploadfile существует, выберите другое имя файла!"; exit;}

//Проверка на размер файла 
   if($_FILES["myfile"]["size"] > 1024*1*1024)
   {
     $message = "Размер файла не больше 5 мб";
     header("Location: /?message={$message}");
     exit;
   }
//Проверка расширения файла
$blacklist = array(".php", ".phtml", ".php3", ".php4");
 foreach ($blacklist as $item) {
  if(preg_match("/$item\$/i", $_FILES['myfile']['name'])) {
      $message = "Загрузка php-файлов запрещена!";
      exit;
   }
  }
//Проверка на тип файла
$imageinfo = getimagesize($_FILES['myfile']['tmp_name']);
 if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
     $message = "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
  exit;
 }

 if($_FILES['myfile']['type'] != "image/jpeg") {
     $message = "Можно загружать только jpg-файлы.";
   exit;
 }
 
 if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)) {
     $message = "Файл успешно загружен.";
     header("Location: /?message={$message}");
     die();
 } else {
     $message = "Загрузка не получилась.";
     header("Location: /?message={$message}");
     die();
 }


