<?php
// session_start();
try {
    require './session.php';
    require './api/order.php';
    $user = $_SESSION['user'];
    $orders = Order::getAll($user['id']);
} catch (Exception $e) {
    $orders = [];
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
        <h2>Užsakymų istorija</h2>
        <table>
            <thead>
                <th>Id</th>
                <th>Order number</th>
                <th>Order id</th>
                <th>Invoice id</th>
                <th>Product id</th>
                <th>Service type</th>
                <th>Service name</th>
                <th>Total price</th>
            </thead>
            <tbody>
                <?php
                array_map(function ($x) { ?>
                    <tr>
                        <td><?= $x['id']; ?></td>
                        <td><?= $x['order_number']; ?></td>
                        <td><?= $x['order_id']; ?></td>
                        <td><?= $x['invoice_id']; ?></td>
                        <td><?= $x['product_id']; ?></td>
                        <td><?= $x['service_type']; ?></td>
                        <td><?= $x['service_name']; ?></td>
                        <td><?= $x['total_price']; ?></td>
                    </tr>
                <?php }, $orders);
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>