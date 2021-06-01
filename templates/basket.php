<div class="container">
        <?=$count?>

    <?php foreach ($basket as $item): ?>
    <div>
        <?=$item['name']?><br>
        price: <?=$item['price']?><br>
<!--        <a href="">Удалить</a>-->
        <a href="/basket/?action=delete&id=<?=$item['basket_id']?>&session=<?=$item['session_id']?>">Удалить</a>
    </div><hr>
    <?php endforeach;?>
</div>