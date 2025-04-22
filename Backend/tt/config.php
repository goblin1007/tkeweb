<?php
$host = '127.0.0.1';
$dbname = 'db';
$username = 'root';
$password = '';

$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Kết nối database thất bại: " . $mysqli->connect_error);
}
?>
