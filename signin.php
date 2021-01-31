<?php 
session_start();
$conn = mysqli_connect("localhost","root","","cashback");
if (!$conn) {
	die("database error");
}
$mail = $_POST['mail'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE mail =?";

$result = mysqli_prepare($conn , $sql);

mysqli_stmt_bind_param($result, "s", $mail);

mysqli_stmt_execute($result);

mysqli_stmt_bind_result($result, $usid,$name,$usmail,$pass,$points);

mysqli_stmt_store_result($result);

mysqli_stmt_fetch($result);

if ($pass==$password) {
	$_SESSION['id'] = $usid;
	$_SESSION['name'] = $name;
	$_SESSION['password'] = $pass;
	$_SESSION['mail'] = $usmail;
	$_SESSION['points'] = $points;
	header('location:index.php');
	echo $name;
	
}
else{
	header('location:index.php?loginerror');
}
?>