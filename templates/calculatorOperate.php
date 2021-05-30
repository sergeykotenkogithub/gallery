<div class="container">
    <form action="/calculatorOperate/" method="get">

        <input type="text" name="arg1" value="<?=$arg1?>">
        <input type="text" name="arg2" value="<?=$arg2?>">

        <input type="submit" name="operation" value="+">
        <input type="submit" name="operation" value="-">
        <input type="submit" name="operation" value="*">
        <input type="submit" name="operation" value="/">

        <input class="result" type="text" name="result" readonly value="<?=$result?>">
    </form>
</div>