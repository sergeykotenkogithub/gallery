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
    <div class="post_title"><h2>My Gallery</h2></div>

<!--    <div class="gallery">-->
<!--        --><?php //foreach ($images as $filename): ?>
<!--        <a rel='gallery' class='photo' href='gallery_img/big/--><?//=$filename?><!--'>-->
<!--            <img src='/gallery_img/small/--><?//=$filename?><!--' width='150' height='100'/>-->
<!--            --><?php //endforeach;?>
<!--    </div>-->

<!--  Версия с переходом на другую страницу  -->

    <div class="gallery">
        <?php foreach ($gallery as $item): ?>
            <a rel='gallery' class='photo' href="/?page=galleryone&id=<?=$item['id']?>"><img src='/gallery_img/small/<?=$item['image']?>' width='150' height='100'/></a>
        <?php endforeach;?>
    </div>

<!--    <div class="gallery">-->
<!--        --><?php //foreach ($gallery as $item): ?>
<!--            <a rel='gallery' class='photo' href="/gallery_img/big/--><?//=$item['image']?><!--">-->
<!--                <img src="\gallery_img\small\--><?//=$item['image']?><!--" width='150' height='100'/></a>-->
<!--        --><?php //endforeach;?>
<!--    </div>-->


</div>

<script src="scripts/input.js"></script>