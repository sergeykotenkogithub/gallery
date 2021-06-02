<div class="welcome">
    <? if ($auth): ?>
        <?=$hello?> <?= $name ?> <?=$welcome?> <a href="/logout"> [Выход]</a>
    <? else: ?>
        <form action="/login" method="post">
            <input type="text" name="login">
            <input type="text" name="pass">
            SAVE? <input type="checkbox" name="save">
            <input type="submit">
        </form>
    <? endif; ?>
</div>