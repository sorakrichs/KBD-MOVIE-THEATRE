<?php
$host = '159.65.139.234';
$username = 'database';
$password = '12345678';
$database = 'database';

$con = new mysqli($host, $username, $password, $database);
$con->query("set names UTF8");