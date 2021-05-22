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
    <div class="colorForm"><?=$messa?></div>
</div>

<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>

    <div class="gallery">
        <?php foreach ($giveFile as $filename): ?>
        <a rel='gallery' class='photo' href='gallery_img/big/<?=$filename?>'>
            <img src='/gallery_img/small/<?=$filename?>' width='150' height='100'/>
            <?php endforeach;?>
    </div>

</div>

<script src="scripts/input.js"></script>