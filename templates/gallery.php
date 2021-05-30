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
    <div class="colorForm"><?=$message_del?></div>
    <div class="sort styleIcon"><img src="/img/sort.svg" alt=""><img src="/img/view.svg" alt=""></div>
    <div class="sortName styleIcon"><img src="/img/sortName.svg" alt=""></div>
</div>

<div id="main">
    <div class="post_title"><h2>My Gallery</h2></div>

    <div class="gallery">
        <?php foreach ($gallery as $item): ?>
        <div class="imgWrapper">
            <a rel='gallery' class='photo' href="/galleryone/?id=<?=$item['id']?>">
                <img class="imgBig" src='/gallery_img/small/<?=$item['image']?>' width='150' height='100'/>
            </a>
            <!--   Удаление картинки         -->
            <a class="del" href="/gallery/?action=delete&id=<?=$item['id']?>&name=<?=$item['image']?>">
                <img class="delete" src="/img/delete.svg" alt="delete">
            </a>
        </div>
        <?php endforeach;?>
    </div>

        <!--  Появляется блок при сортировке   -->

    <div class="gallerySort">
        <?php foreach ($gallerySort as $item): ?>
            <div class="imgWrapper">
                <a rel='gallery' class='photo' href="/galleryone/?id=<?=$item['id']?>">
                    <img class="imgBig" src='/gallery_img/small/<?=$item['image']?>' width='150' height='100'/>
                </a>
                <!--   Удаление картинки         -->
                <a class="del" href="/gallery/?action=delete&id=<?=$item['id']?>&name=<?=$item['image']?>">
                    <img class="delete" src="/img/delete.svg" alt="delete">
                </a>
            </div>
        <?php endforeach;?>
    </div>
</div>