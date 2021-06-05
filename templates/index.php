<div class="welcome">

    <!--  Показывается для зарегестрированого пользователя  -->

    <? if ($auth): ?>
    <div class="$auth">
        <?=$hello?> <?= $name ?> <?=$welcome?> <a class="btnAll" href="/logout">Выход</a>
    </div>

    <!-- Показывается для админа   -->

    <? elseif ($admin): ?>
    <div class="$auth">
        <?=$hello?> <?= $name_admin ?> <?=$welcome?> <a class="btnAll" href="/logout">Выход</a>
    </div>

    <!--  Показывается для незарегестрированого или кто не вошёл  -->

    <? else: ?>
        <div class="main__wrapper">
            <div>
                <div class="main__name">Вход:</div>
                <div class="loginform">
                    <form class="login" action="/login" method="post">
                        <input class="login__text" type="text" name="login" placeholder="Login">
                        <input class="login__text" type="text" name="pass" placeholder="Password">
                        <div class="save">
                            <div>Save</div><input class="login__checkbox" type="checkbox" name="save">
                        </div>
                        <input class="login__submit" type="submit">
                    </form>
                </div>
            </div>

            <div>
                <div class="main__name">Регистрация:</div>
                <div class="loginform">
                    <form class="login" action="/registration" method="post">
                        <input class="login__text" type="text" name="login" placeholder="Login">
                        <input class="login__text" type="text" name="pass" placeholder="Password">
                        <input class="login__submit" type="submit">
                    </form>
                </div>
            </div>
        </div>

    <? endif; ?>

    <!-- Изменение темы   -->

    <div class="changeTheme">Сменить тему:</div>

    <div>
        <div class="imgIndexWrapper">

            <? for ($x=0; $x++<4;) :?>
            <div class="imgChange">
                <a href="/index/?action=style<?=$x?>">
                    <img src="/img/background/<?=$x?>.jpg" alt="<?=$x?>-й фон">
                </a>
            </div>
            <?endfor;?>

        </div>
    </div>

</div>