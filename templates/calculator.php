<div class="container">
    <form action="/calculator/" method="get">
        <input type="text" name="arg1" value="<?=$arg1?>">
        <select name="operation">
            <option value="add" <?php if ($_GET['operation']=='add') echo 'selected';?>>+</option>
            <option value="sub" <?php if ($_GET['operation']=='sub') echo 'selected';?>>-</option>
            <option value="mul" <?php if ($_GET['operation']=='mul') echo 'selected';?>>*</option>
            <option value="div" <?php if ($_GET['operation']=='div') echo 'selected';?>>/</option>
        </select>
        <input type="text" name="arg2" value="<?=$arg2?>">
        <button type="submit">=</button>
        <input class="result" type="text" name="result" readonly value="<?=$result?>">
    </form>
</div>
