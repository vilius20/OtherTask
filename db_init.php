<?php
require './session.php';
require './db.php';

$db->query(
    "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)"
);


$db->query(
    "CREATE TABLE IF NOT EXISTS orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    order_number INT(11) NOT NULL,
    order_id INT(11) NOT NULL,
    invoice_id INT(11) NOT NULL,
    product_id INT(11) NOT NULL,
    service_type TINYTEXT NOT NULL,
    service_name TINYTEXT NOT NULL,
    total_price INT(11) NOT NULL)"
);
