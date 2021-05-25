
<h2>Новости</h2>

<?php foreach ($news as $item):?>
    <div>
        <a href="/?page=newsone&id=<?=$item['id']?>"><b><?=$item['title']?></b> </a>
    </div>
<?endforeach;?>

