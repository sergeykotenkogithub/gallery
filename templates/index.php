<div class="welcome">
    <? if ($auth): ?>
    <div class="$auth">
        <?=$hello?> <?= $name ?> <?=$welcome?> <a class="btnAll" href="/logout">Выход</a>
    </div>

    <? else: ?>
        <div>
            <form class="login" action="/login" method="post">
                <input class="login__text" type="text" name="login" placeholder="Login">
                <input class="login__text" type="text" name="pass" placeholder="Password">
                <div class="save">
                   <div>Save</div><input class="login__checkbox" type="checkbox" name="save">
                </div>
                <input class="login__submit" type="submit">
            </form>
        </div>

<!--        <div class="orderBuy">-->
<!--            <form class="formOrder" action="/congratulations" method="post">-->
<!--                <input type="number" name="tel" placeholder="Введите номер телефона">-->
<!--                <input type="email" name="email" placeholder="Ваш email">-->
<!--                <input type="submit" value="Оформить">-->
<!--            </form>-->
<!--        </div>-->

    <? endif; ?>
</div>