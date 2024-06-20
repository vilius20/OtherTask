<?php
session_start();
$user = $_SESSION['user'] ;
if (!$user) {
    header("Location: ./login.php");
}

$email = $user['email'];
$pass = $user['password'];

require './db.php';
$q = $db->query("SELECT 1 FROM users WHERE email='$email' AND password='$pass'");
if (!$q->num_rows) {
    throw new Exception('Unauthorized', 401);
    header("Location: /login");
}
