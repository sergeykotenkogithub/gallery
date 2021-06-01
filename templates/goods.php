<div class="container">
    <div class="catalogWrapper">

            <? foreach ($goods as $item): ?>
        <div class="catalog">
                <a href="/goodsItem/?id=<?= $item['id'] ?>">
                    <div>
                        <h2><?= $item['name'] ?></h2>
                        <img src="/img/catalog/<?= $item['image'] ?>" width="150"> <br>
                        <div class="price"> Цена: <span class="rub"> <?= $item['price'] ?></span>
                        </div>
                        <br>
                    </div>
                </a>
            <a class="buy" href="">Купить</a>
        </div>
            <? endforeach; ?>

    </div>
</div>


