<div class="container">
    <h3>Заказы:</h3>
    <div>

        <?php for($i = 0; $i < $count_orders - 1; ++$i): ?>

            <?php if ($order[$i]['id'] === $order[$i - 1]['id']): ?>
            <div></div>
            <?php else: ?>
             <div class="myorder">Заказ №: <?="{$order[$i]['id']}"?></div>
             <div class="status__order"> Статус: <?="{$order[$i]['status']}"?></div>
            <?endif;?>

            <div class="basket">
                <div class="basket__name"><?="{$order[$i]['name']}"?> </div>
                <div>
                    <img src="/img/goods/<?="{$order[$i]['image']}"?>" width="100">
                </div>
                <div class="rub basket__price"><?="{$order[$i]['price']}"?></div>
                <div class="basket__quantity">Кол-во:<?="{$order[$i]['quantity']}"?></div>

            </div>

        <?endfor;?>

    </div>
</div>