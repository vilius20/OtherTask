<?php

include '../../common.php';

// die('asdasd'.( json_encode($_REQUEST)));
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_REQUEST['product_id']) && isset($_REQUEST['cycle']) && isset($_REQUEST['pay_method'])) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            "order_num" => 873340995,
            "invoice_id" => "308979",
            "total" => "9.99"
        ]);
    }
}
