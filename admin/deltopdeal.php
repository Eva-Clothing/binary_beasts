<?php 
$conn = mysqli_connect("localhost","root","","cashback");
if(!$conn){
    die("database error");
}
$sql = "UPDATE deals SET best = 'n' WHERE id = '".$_GET['id']."'";
mysqli_query($conn, $sql);

header('location:index.php?managedeals');
?>