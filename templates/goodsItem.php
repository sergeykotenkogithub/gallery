<div class="container">
    <div>
<!--        <form action="/goodsItem/?id=1" method="post">-->
        <form action="/goodsItem/?id=<?=$goods['id']?>" method="post">
            <input hidden type="text" name="goods_id" value="<?=$goods['id']?>">
            <h2><?=$goods['name']?></h2>
            <div class="catalogItemImg">
                <img  src="/img/goods/<?=$goods['image']?>">
            </div>
            <div><?=$goods['description']?> </div>
            <div class="rub catalogItemPrice">Цена:<?=$goods['price']?></div>
            <button type="submit" class="buy">КУПИТЬ</button>
        </form>

        <div class="feedbackCatalog">
            <h2>Отзывы:</h2>
            <div> <?=$feedback['name']?> : <?=$feedback['feedback']?></div>
        </div>

    </div>
</div>
