<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="galerry.css?<?php echo uniqid();?>"/>
</head>
<body>

<!-- Отображение картинки большой при нажатие -->
<div class="picture">
    <div class="views">
        <img src="/img/eye.svg" alt="view">
        <div><?=$gall['views']?></div>
    </div>
    <img src='/gallery_img/big/<?=$gall['image']?>' width="800" height="600">
</div>

</body>
</html>