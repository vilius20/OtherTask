<?php
include '../../../common.php';

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    "products" => [
        [
            "id" => "333",
            "type" => "1",
            "name" => "Starter Hosting",
            "stock" => false,
            "paytype" => "Regular",
            "description" => "Disk:10GB\r\nMemory:2GB\r\nMySql:10 DB\r\nEmail:100 Users",
            "qty" => "0",
            "tags" => [],
            "periods" => [
                [
                    "title" => "m",
                    "value" => "m",
                    "price" => 9.99,
                    "setup" => 0,
                    "selected" => true
                ],
                [
                    "title" => "a",
                    "value" => "a",
                    "price" => 109.89,
                    "setup" => 0,
                    "selected" => false
                ],
                [
                    "title" => "b",
                    "value" => "b",
                    "price" => 199.8,
                    "setup" => 0,
                    "selected" => false
                ],
                [
                    "title" => "t",
                    "value" => "t",
                    "price" => 299.7,
                    "setup" => 0,
                    "selected" => false
                ]
            ]
        ]
    ]
]);
