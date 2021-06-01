<div class="container">
        <?=$count?>

    <?php foreach ($basket as $item): ?>
    <div>
        <?=$item['name']?><br>
        price: <?=$item['price']?><br>
        <a href="">Удалить</a>
    </div><hr>
    <?php endforeach;?>
</div>