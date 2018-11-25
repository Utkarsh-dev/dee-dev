<?php
session_start();
$servername = "localhost";
$server_user = "root";
$server_pass = "12345";
$dbname = "food";
$con = new mysqli($servername, $server_user, $server_pass, $dbname);
if (!$con) {
	die("Database connection failed");
}
?>
