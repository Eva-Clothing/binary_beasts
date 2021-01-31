<?php 
$conn = mysqli_connect("localhost","root","","cashback");
if (!$conn) {
	die("database error");
}
$catname = $_POST['name'];

$filename = $_FILES['file']['name'];
$filetmpname = $_FILES['file']['tmp_name'];
$fileerror = $_FILES['file']['error'];
$filesize = $_FILES['file']['size'];
$filetype = $_FILES['file']['type'];

$fileExt = explode('.', $filename);
$fileActExt = strtolower(end($fileExt));

$allowed = array('jpg' , 'jpeg' , 'png' , 'webp');

if (in_array($fileActExt, $allowed)) {
	if ($fileerror===0) {
		if ($filesize < 1000000) {
			$filenewname = uniqid('', true).".".$fileActExt;
			$filedestination = '../images/categories/'.$filenewname;

			$sql = "INSERT INTO categories(name, image) VALUES('".$catname."','".$filenewname."')";
			if(mysqli_query($conn , $sql)){
			move_uploaded_file($filetmpname, $filedestination);
			header('location:index.php?addcat_succ');
			}
			else{
				header('location:index.php?addcat_err');
			}
			
		}
		else{
			header('location:index.php?addcat_size_err');
		}
	}
	else{
		header('location:index.php?addcat_err');
	}
}
else{
	header('location:index.php?addcat_filetype_error');
}
?>