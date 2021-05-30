<div class="container">
    <form action="/calculatorOperate/" method="get">

        <input type="text" name="arg1" value="<?=$arg1?>">
        <input type="text" name="arg2" value="<?=$arg2?>">

        <input type="submit" name="operation" value="add">+
        <input type="submit" name="operation" value="sub">-
        <input type="submit" name="operation" value="mul">*
        <input type="submit" name="operation" value="div">/

        <input class="result" type="text" name="result" readonly value="<?=$result?>">
    </form>
</div>