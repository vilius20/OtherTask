<?php

try {
    require './session.php';
    require './api/order.php';
    $category = $_GET['categoryId'];
    $categoryName = $_GET['categoryName'];
    $time4VpsUser = $_SESSION['time4VpsUser'];
    $products = Product::getAll($category, $time4VpsUser)->products;
    if (isset($_REQUEST['product']) && isset($_REQUEST['period'])) {
        $user = $_SESSION['user'];
        $body = [
            'user_id' => $user['id'],
            'service_name' => $_REQUEST['service_name'],
            'service_type' => $_REQUEST['service_type'],
            'product_id' => $_REQUEST['product'],
            'domain' => $_REQUEST['domain'],
            'cycle' => $_REQUEST['period'],
            'pay_method' => '9'
        ];
        if (Order::save($body, $time4VpsUser)) {
            header("Location: /ordersHistory.php");
        }
    } else {
        if (isset($_REQUEST['loaded']) && $_REQUEST['loaded']==1) throw new Exception('Neužpildyti reikiami laukai');
    }
} catch (Exception $e) {
    $products = $products ?? [];
    $error = $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php include './header.php'; ?>
    <?php if (isset($error)) {
    ?><div class="errorMessage">
            Klaida: <?= $error; ?>
        </div><?php
            } ?>
    <div>
        <h2>Pateikti užsakymą</h2>
        <h4>Kategorija: <?= $categoryName; ?></h4>
        <label for="order">Pasirinkite paslaugą</label>
        <form method="POST" action="" name="order" onLoad="onLoad()">
            <?php
            array_map(function ($x) {
            ?>
                <div>
                    <input type="radio" id="<?= $x->id; ?>" name="product" value="<?= $x->id; ?>" onchange='onChange(<?= json_encode($x->periods); ?>)' />
                    <label for="<?= $x->id; ?>"><?= $x->name; ?></label><br>
                    <input hidden readonly value="<?= $x->name; ?>" name="service_name" />
                    <input hidden readonly value="<?= $x->type; ?>" name="service_type" />
                </div>
            <?php
            }, $products);
            ?>
            <label for="domain">Domenas</label>
            <input name="domain" />
            <br />
            <div id="periodSelect"></div>
            <input name="loaded" readonly hidden />
            <input type="submit" value="Užsakyti" />
        </form>
    </div>
</body>

<script>
    const loadedE = document.querySelector("[name='loaded']");
    loadedE.value = null;
    window.onload = function (){
        loadedE.value = 1;
    }
    function onChange(options) {
        const e = document.querySelector("#periodSelect");
        if (e) {
            const label = document.createElement("label");
            label.setAttribute("for", "periods");
            label.textContent = 'Pasirinkite planą';
            const periods = document.createElement("div");
            periods.setAttribute("name", "periods");
            e.appendChild(label);
            e.appendChild(periods);
            options.map(x => {
                const div = document.createElement("div");

                const input = document.createElement('input');
                input.type = "radio";
                input.id = x.value;
                input.name = "period";
                input.value = x.value;

                const inputLabel = document.createElement('label');
                inputLabel.textContent = `${x.title} (Kaina: ${x.price})`;
                div.appendChild(input);
                div.appendChild(inputLabel);
                periods.appendChild(div);
            })

        }
    }
</script>

</html>