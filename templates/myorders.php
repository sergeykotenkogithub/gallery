<div class="container">
    <h3>Заказы:</h3>
    <div>
        <?php for($i = 0; $i < $count - 1; ++$i): ?>
            <?php if ($order[$i]['id'] === $order[$i - 1]['id']): ?>
            <div></div>
            <?php else: ?>
             <div>Заказ №: <?="{$order[$i]['id']}"?></div>
            <?endif;?>
            <div><?="{$order[$i]['name']}"?></div>
        <?endfor;?>
    </div>
</div>