<div class="container">
    <form action="/calculator/" method="get">
        <input type="text" name="arg1" value="<?=$arg1?>">
        <select name="operation">
            <option value="+" <?php if ($_GET['operation']=='+') echo 'selected';?>>+</option>
            <option value="-" <?php if ($_GET['operation']=='-') echo 'selected';?>>-</option>
            <option value="*" <?php if ($_GET['operation']=='*') echo 'selected';?>>*</option>
            <option value="/" <?php if ($_GET['operation']=='/') echo 'selected';?>>/</option>
        </select>
        <input type="text" name="arg2" value="<?=$arg2?>">
        <button type="submit">=</button>
        <input class="result" type="text" name="result" readonly value="<?=$result?>">
    </form>
</div>
