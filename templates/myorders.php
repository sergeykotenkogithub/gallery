<div class="container">
    <h3>Заказы:</h3>
    <div>
        <?php
        $c = count($order) + 1;
        for($i = 0; $i < $c - 1; ++$i) {

        if($order[$i]['id'] === $order[$i - 1]['id']) {
            $ul = "";
        }
        else {
            $ul = "<div>Заказ №: {$order[$i]['id']}</div>";
        }
        $cd = "<div>Товар:{$order[$i]['name']}";
        echo $ul . $cd;
        }
        ?>
    </div>
</div>