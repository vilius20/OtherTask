<?php

$server = '172.27.192.1';
$mysqlUser = 'root';
$mysqlPass = '12345';
$database = 'time4vps_orders';

$isProd = true;
$fetchUrl = $isProd ? 'https://billing.time4vps.com/api/' : 'http://localhost/mock_api/';