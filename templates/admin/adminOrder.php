<div class="container">
    <?php if ($admin): ?>
        <div class="status__order_admin">
            <div> Статус: <?=$status['status']?> </div>
        </div>

        <div class="adminOrder">
            <form action="adminOrder?id=<?=$status['id']?>" method="post">
                <input hidden type="text" name="status_id" value="<?=$status['id']?>">
                <button class="buy" type="submit">Изменить статус:</button>
                <select name="change">
                    <option value="Передан на обработку>Передан на обработку"</option>
                    <option value="Обрабатывается">Обрабатывается</option>
                    <option value="Подготовлен счёт на оплату">Подготовлен счёт на оплату</option>
                    <option value="Ожидаем поставку товара">Ожидаем поставку товара</option>
                    <option value="Едет в пункт выдачи">Едет в пункт выдачи</option>
                    <option value="Готов к получению">Готов к получению</option>
                    <option value="Передан в отдел доставки">Передан в отдел доставки</option>
                    <option value="Отменён">Отменён</option>
                    <option value="Передан курьеру">Передан курьеру</option>
                    <option value="Нам не удалось с Вами связаться">Нам не удалось с Вами связаться</option>
                    <option value="Выполнен">Выполнен</option>
                </select>
            </form>
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



