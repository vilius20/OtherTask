<?php
require './config.php';

/** @var mysqli|null $db */
global $db;

if (!isset($db)) {
    $db = mysqli_connect($server, $mysqlUser, $mysqlPass);
    if (!$db) die("Connection failed: " . mysqli_connect_error());
    $db->select_db($database);
    $GLOBALS['db'] = $db;
}

return $db;
