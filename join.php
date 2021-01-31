<?php 
$conn = mysqli_connect("localhost","root","","cashback");
if (!$conn) {
	die("database server error");
}
$mail = $_POST['mail'];

$name = $_POST['name'];
$password = $_POST['password'];

$cmd = "SELECT mail FROM users WHERE mail = ?";
$result = mysqli_prepare($conn, $cmd);
mysqli_stmt_bind_param($result,"s",$mail);
mysqli_stmt_execute($result);
mysqli_stmt_bind_result($result,$usermail);
mysqli_stmt_store_result($result);

if (mysqli_stmt_num_rows($result)==0) {
	$sql = "INSERT INTO users (name, mail, password) VALUES(?,?,?)";
	$query = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($query,"sss",$name,$mail,$password);
    mysqli_stmt_execute($query);
    echo mysqli_error($conn);
    header('location:index.php?accountcreated');
}
else{
	header('location:signup.php?accountexists');
}
?>