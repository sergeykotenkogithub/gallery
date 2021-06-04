<menu class="menu">
    <?=$list?>
    <div class="countBasket">
        (<? if ($count['count']) {
            echo $count['count'];
        }  else {
            echo  0;
        }
        ?>
        )</div>
    <? if ($auth):?>
    <div class="adminPanel"><a href="/admin">Admin Panel</a> </div>
    <? elseif ($auth2):?>
    <div class="adminPanel"><a href="/myorders/?id=<?=$myorders?>">My orders</a></div>
    <? endif; ?>
</menu>
<!--    <ul class="menu__wrapper">-->
<!--        <li class="menu__link"> <a href="/">Приветствие</a> </li>-->
<!--        <li class="menu__link"> <a href="/?page=gallery">Галерея</a> </li>-->
<!--    </ul>-->