<div class="container">
    Товаров в корзине: <?=$count?>
    <br>
    <br>
    <?php foreach ($basket as $item): ?>
    <div class="basket">
        <div class="basket__name"><?=$item['name']?> </div>
        <div>
            <img src="/img/goods/<?= $item['image'] ?>" width="100">
        </div>
        <div class="rub basket__price"><?=$item['price']?></div>
        <div class="basket__quantity">Кол-во:<?=$item['quantity']?></div>
        <div class="basket__del" >
            <a class="buy" href="/basket/?action=delete&id=<?=$item['basket_id']?>">Удалить</a>
        </div>
        <div class="basket__del">
            <a class="buy" href="/basket/?action=add&id=<?=$item['basket_id']?>">+</a>
        </div>
        <div class="basket__del">
            <a class="buy" href="/basket/?action=deleteitem&quantity=<?=$item['quantity']?>&id=<?=$item['basket_id']?>">-</a>
        </div>
    </div>
    <?php endforeach;?>

    <? if (!$show):?>
    <div class="rub total">Итого: <?=$summ['summ']?> </div>
    <?else:?>
    <div>Вы ещё не добавили товар</div>
    <?endif;?>

    <? if (!$show): ?>
    <div class="order"><a href="/order">Оформить заказ</a></div>
    <?endif;?>

</div>