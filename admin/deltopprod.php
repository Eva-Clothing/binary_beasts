<?php 
$conn = mysqli_connect("localhost","root","","cashback");
if(!$conn){
    die("database error");
}
$sql = "UPDATE products SET banner = 'n' WHERE prod_id = '".$_GET['id']."'";
mysqli_query($conn, $sql);

header('location:index.php?manageproducts');
?>