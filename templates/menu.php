<menu class="menu">
    <?=$list?>
    <div id="countBasket" class="countBasket">(<? echo $count ?>)</div>
    <? if ($admin):?>
    <div class="adminPanel"><a href="/admin">Admin Panel</a> </div>
    <? elseif ($auth):?>
    <div class="adminPanel"><a  href="/myorders/?id=<?=$myorders?>">My orders</a></div>
    <? endif; ?>
</menu>