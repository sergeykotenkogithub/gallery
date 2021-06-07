<div class="container">
    <div>
        <form action="/goodsItem/?id=<?=$goods['id']?>" method="post">
            <input hidden type="text" name="goods_id" value="<?=$goods['id']?>">
            <input hidden type="text" name="price" value="<?=$goods['price']?>">
            <h2><?=$goods['name']?></h2>
            <div class="catalogItemImg">
                <img  src="/img/goods/<?=$goods['image']?>">
            </div>
            <div><?=$goods['description']?> </div>
            <div class="rub catalogItemPrice">Цена:<?=$goods['price']?></div>
            <div class="buySubmit">
                <button type="submit" class="buy">КУПИТЬ</button>
                <div> <?=$ok?></div>
            </div>
        </form>


        <div class="feedbackCatalog">
            <h2>Отзывы:</h2>
            <div class="message"><?=$message?></div>

            <?php if ($auth) :?>

            <div class="goodsItem__feedback">
                <form action="http://gal/goodsItem/?id=<?=$goods['id']?>" method="post">
                    <input hidden type="text" name="feedback_id" value="<?=$goods['id']?>">
                    <input type="text" name="name" placeholder="Ваше имя">
                    <input type="text" name="feedback" placeholder="Отзыв">
                    <input type="submit" value="Добавить отзыв">
                </form>
            </div>

            <?php else: ?>

                <div class="feedback__noauth">
                    <div class="feedback__text">Можете оставить отзыв, если зарегистрируетесь <span>
                    <a href="/">Зарегистрироваться</a> </span></div>
                </div>

            <?php endif; ?>


            <? foreach ($feedback as $item): ?>
            <div> <?=$item['name']?> : <?=$item['feedback']?>
                <a href="?action=delete&id=<?=$item['id']?>">[x]</a>
            </div>

            <?endforeach;?>

        </div>


    </div>
</div>
