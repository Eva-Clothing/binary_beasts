<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "cashback");
if (!$conn) {
	die("database server error");
}

session_destroy();
header('location:index.php');
?>