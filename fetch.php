<?php 
$conn = mysqli_connect("localhost","root","","cashback");
if(!$conn){
    die("database error");
}
$sql = "SELECT * FROM products WHERE 'name' LIKE '%".$_POST['search']."%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_array($conn, $result)){
    $output = '
    <li>'.$row[1].'</li>
    ';
}
echo $output;
}
else{
    echo "no data found";
}
?>