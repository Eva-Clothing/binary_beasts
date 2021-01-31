<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "cashback");
if (!$conn) {
	die("database server error");
}
$mobile = $_POST['mobile'];
$bankholdername = $_POST['bankholdername'];
$account = $_POST['bankaccountnumber'];
$ifsc = $_POST['ifsc'];
$bankname = $_POST['bankname'];
$mobile = $_POST['mobile'];


?>