<?php 
session_start();
$conn = mysqli_connect("localhost","root","","cashback");
if(!$conn){
    die("database error");
}
$currentpass = $_POST['currentpass'];
$newpass = $_POST['newpass'];
$confpass = $_POST['confpass'];
if($currentpass == $_SESSION['password']){
    if($newpass==$confpass){
    $sql = "UPDATE users SET password=? WHERE mail=?";

	$result = mysqli_prepare($conn, $sql);
	
	mysqli_stmt_bind_param($result, "ss", $newpass,$_SESSION['mail']);
	
	mysqli_stmt_execute($result);

	header('location:account.php?passwordchanged');
    }
    else{
        header('location:account.php?passwordsdontmatch');
    }
}
else{
    header('location:account.php?wrongcurrentpass');
}
?>