<div class="container">
    <? if ($admin): ?>
        <div>
            <div> <h2>Заказы:</h2> </div>
            <?php foreach ($order as $item):?>
            <a href="/adminOrder/?id=<?=$item['id']?>">
                <div>
                    <h3>Заказ №: <?=$item['id']?></h3>
                    <div>Телефон: <?=$item['tel']?></div>
                    <div>email: <?=$item['email']?></div>
                    <div>Дата: <?=$item['date']?></div>
                </div>
            </a>
                <hr>
            <?php endforeach;?>
        </div>

    <? else: ?>
       <div class="notAccess">Нет доступа</div>
    <? endif; ?>
</div>