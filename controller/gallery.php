<?php

function galleryController($params, $action) {

    if(empty($action)) $action = "gallery";

    //.......................Вывод сообщений об отправки..........................................................

    $messageUpload = [
        'OK' => 'Файл успешно загружен',
        'ERROR' => 'Ошибка',
        'JPG' => 'Можно загружать только jpg-файлы',
        'DOUBLE' => 'Файл существует, выберите другое имя файла!',
        'BIGSIZE' => 'Размер файла не больше 5 мб',
        'NOTPHP' => 'Загрузка php-файлов запрещена!',
        'NOTIMG' => 'Можно загружать только jpg-файлы, неверное содержание файла, не изображение',
    ];

    // Вывод картинок gallery_img/big/
    $files = array_splice( scandir(IMG_BIG), 2);

    //...........................................................................................................

    if (isset($_FILES['myfile'])) {
        upload($files);
    }

    // Проверка на загрузку фотографии и переименовывание

    switch ($action) {

        case 'gallery':
            $params['title'] = 'Gallery'; // Заголок
            $params['gallery'] = getGallery(); // Через базу данных получаю полный список
            $params['gallerySort'] = getGallerySorting(); // Через базу данных получаю отсортированный список
            // Вывод сообщения при загрузке
            $params['message'] = $messageUpload[$_GET['message']];
            break;

        case 'delete':
            $action = "delete";
            // Удаление и вывод сообщения
            doGalleryAction($action);
            $params['message_del'] =  strip_tags($_GET['message_del']);
        break;

    }

//    $params['title'] = 'Gallery'; // Заголок
//    $params['gallery'] = getGallery(); // Через базу данных получаю полный список
//    $params['gallerySort'] = getGallerySorting(); // Через базу данных получаю отсортированный список
//
//    // Вывод сообщения при загрузке
//    $params['message'] = $messageUpload[$_GET['message']];
//
//    // Удаление и вывод сообщения
//    doGalleryAction($action);
//    $params['message_del'] =  strip_tags($_GET['message_del']);
//    $action = "gallery";


    $templateName = "/gallery/" . $action;

    return render($templateName, $params);
}

function galleryoneController($params) {

    $id = (int)$_GET['id'];
    changeViews($id); // Изменение количество просмотров
    $params['gall'] = getOneGallery($id);

    $templateName = "/gallery/galleryone";

    return render($templateName, $params);
}