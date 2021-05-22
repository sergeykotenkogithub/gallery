<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo uniqid();?>"/>
    <script type="text/javascript" src="./scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="./scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="./scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script type="text/javascript">
        $(document).ready(function(){
            $("a.photo").fancybox({
                transitionIn: 'elastic',
                transitionOut: 'elastic',
                speedIn: 500,
                speedOut: 500,
                hideOnOverlayClick: false,
                titlePosition: 'over'
            });	}); </script>

</head>

<?php include 'menu.php'?>
<?php include 'content.php'?>


<div class="upload">
    <form class="uploadForm" action="" method="post" enctype="multipart/form-data">
        <label>
            <input class="colorForm" type="file" name="myfile" id="fi">
            <span class="line1"></span>
            <span class="line2"></span>
        </label>
        <div class="fileP" id="fr"></div >
        <div>
            <button class="btn" type="submit" "></button>
        </div>
    </form>
    <div class="colorForm"><?=$message?></div>
</div>

<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>

    <div class="gallery">
        <?php foreach ($giveFile as $filename): ?>
        <a rel='gallery' class='photo' href='gallery_img/big/<?=$filename?>'>
            <img src='gallery_img/small/<?=$filename?>' width='150' height='100'/>
            <?php endforeach;?>
    </div>

</div>
<script src="scripts/input.js"></script>
</body>
</html>