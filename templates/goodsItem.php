<div class="container">
    <div>
        <h2><?=$goods['name']?></h2>
        <div class="catalogItemImg">
            <img  src="/img/goods/<?=$goods['image']?>">
        </div>
        <div><?=$goods['description']?> </div>
        <div class="rub catalogItemPrice">Цена:<?=$goods['price']?></div>
        <button class="buy">КУПИТЬ</button>

        <div class="feedbackCatalog">
            <h2>Отзывы:</h2>
            <div> <?=$feedback['name']?> : <?=$feedback['feedback']?></div>
        </div>

    </div>
</div>
