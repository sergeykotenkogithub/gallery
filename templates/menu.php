<menu class="menu">
    <?=$list?>
    <div class="countBasket">(<? echo $count ?>)</div>
    <? if ($admin):?>
    <div class="adminPanel"><a href="/admin">Admin Panel</a> </div>
    <? elseif ($auth):?>
    <div class="adminPanel"><a  href="/myorders/?id=<?=$myorders?>">My orders</a></div>
    <? endif; ?>
</menu>
<!--    <ul class="menu__wrapper">-->
<!--        <li class="menu__link"> <a href="/">Приветствие</a> </li>-->
<!--        <li class="menu__link"> <a href="/?page=gallery">Галерея</a> </li>-->
<!--    </ul>-->