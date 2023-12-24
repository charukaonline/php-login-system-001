<?php

$hostname = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'cnk_login_sys';

$conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
