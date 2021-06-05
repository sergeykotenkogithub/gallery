<div class="container">
    <?php if ($admin): ?>
        <div class="status__order_admin">
            <div> Статус: <?=$status['status']?> </div>
            <a href="/"><div>Изменить</div></a>
        </div>

      <? foreach ($order as $item):?>

            <div class="basket">
                <div class="basket__name"><?=$item['name']?> </div>
                <div>
                    <img src="/img/goods/<?= $item['image'] ?>" width="100">
                </div>
                <div class="rub basket__price"><?=$item['price']?></div>
                <div class="basket__quantity">Кол-во:<?=$item['quantity']?></div>
            </div>
      <?php endforeach;?>
        <hr>
        <div class="rub">Итого: <?=$summ['summ']?></div>
    <?php else: ?>
    Нет доступа
    <?php endif; ?>
</div>



