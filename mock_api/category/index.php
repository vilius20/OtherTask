<?php
include '../common.php';

// http_response_code(500);
// die('ciaaa');

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    "categories" => [
        [
            "id" => "10",
            "name" => "Hosting",
            "description" => "",
            "slug" => "hosting"
        ], [
            "id" => "6",
            "name" => "Domains",
            "description" => "",
            "slug" => "domains"
        ], [
            "id" => "16",
            "name" => "Dedicated",
            "description" => "",
            "slug" => "dedicated"
        ]
    ]
]);
