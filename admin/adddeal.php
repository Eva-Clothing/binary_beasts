<?php
$conn = mysqli_connect("localhost","root","","cashback");
if(!$conn){
    die("databse error");
}
$category = $_POST['category'];
$link = $_POST['link'];
$offer = $_POST['offer'];

$filename = $_FILES['img']['name'];
$filetmpname = $_FILES['img']['tmp_name'];
$fileerror = $_FILES['img']['error'];
$filesize = $_FILES['img']['size'];
$filetype = $_FILES['img']['type'];

$fileExt = explode('.', $filename);
$fileActExt = strtolower(end($fileExt));



$allowed = array('jpg' , 'jpeg' , 'png' , 'webp');

if (in_array($fileActExt, $allowed)) {
	if ($fileerror===0) {
		if ($filesize < 1000000) {
			$filenewname = uniqid('', true).".".$fileActExt;
			$filedestination = '../images/deals/'.$filenewname;

			$sql = "INSERT INTO deals(category, image, link, offer) VALUES('".$category."','".$filenewname."','".$link."','".$offer."')";
			if(mysqli_query($conn , $sql)){
			move_uploaded_file($filetmpname, $filedestination);
			header('location:index.php?adddeal_succ');
			}
			else{
				header('location:index.php?adddeal_err');
			}
			
		}
		else{
			header('location:index.php?adddeal_size_err');
		}
	}
	else{
		header('location:index.php?adddeal_err');
	}
}
else{
	header('location:index.php?adddeal_filetype_error');
}
?>