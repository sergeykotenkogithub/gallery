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
    <div class="sort styleIcon"><img src="/img/sort.svg" alt=""><img src="/img/view.svg" alt=""></div>
    <div class="sortName styleIcon"><img src="/img/sortName.svg" alt=""></div>
</div>

<body>
<div id="main">
    <div class="post_title"><h2>My Gallery</h2></div>

    <div class="gallery">
        <?php foreach ($gallery as $item): ?>
            <a rel='gallery' class='photo' href="/?page=galleryone&id=<?=$item['id']?>"><img src='/gallery_img/small/<?=$item['image']?>' width='150' height='100'/></a>
        <?php endforeach;?>
    </div>

    <div class="gallerySort">
        <?php foreach ($gallerySort as $item): ?>
            <a rel='gallery' class='photo' href="/?page=galleryone&id=<?=$item['id']?>"><img src='/gallery_img/small/<?=$item['image']?>' width='150' height='100'/></a>
        <?php endforeach;?>
    </div>

</div>

<script src="scripts/input.js"></script>