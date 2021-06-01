<div class="container">
    <?=$count?> в корзине
    <br>
    <br>
    <?php foreach ($basket as $item): ?>
    <div class="basket">
        <div><?=$item['name']?> </div>
        <div>
            <img src="/img/goods/<?= $item['image'] ?>" width="100">
        </div>
        <div class="rub"><?=$item['price']?></div>
        <div class="buy basket__del" >
            <a href="/basket/?action=delete&id=<?=$item['basket_id']?>&session=<?=$item['session_id']?>">Удалить</a>
        </div>
    </div>
    <?php endforeach;?>
</div>