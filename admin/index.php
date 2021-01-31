<?php
session_start();
$conn = mysqli_connect("localhost","root","","cashback");
if (!$conn) {
	die("database error");

	

	
}?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="javascript/jquery.js"></script>
	<title>Index | Admin</title>
</head>
<body>
	<?php if(isset($_SESSION['name'])) { ?>
		<div>

		<div class="col-md-4">
<h1 class="heading">Hello boss</h1></div>
<div class="col-md-4"></div>
<div class="col-md-4">
<a href="logout.php" class="logout">Logout</a></div>
</div>
<div class="clearfix"></div>
<div class="main">
	<div class="lhs col-md-4">
		<p><a href="index.php?addcat">Add categories</a></p>
		<p><a href="index.php?addprod">Add products</a></p>
		<p><a href="index.php?adddeal">Add Deals</a></p>
		<p><a href="index.php?managedeals">Manage Deals</a></p>
		<p><a href="index.php?manageproducts">Manage Products</a></p>
	</div>
	<div class="col-md-8">
		<?php if(isset($_GET['addcat'])) { ?>
		<h3>Add category</h3>
		<div class="col-md-5">
		    <form method="post" action="addcat.php" enctype="multipart/form-data">
		    	<p><input type="text" name="name" placeholder="name of the category" required style="width: 100%; padding: 5px;"></p>
		    	<p><span>Image : </span><input type="file" name="file"></p>
		    	<p><input type="submit" value="Create Category" class="btn btn-block"></p>
		    </form>
	    </div>
<?php }?>
	    <?php if(isset($_GET['addprod'])) { ?>
	    	<h3>Add product</h3>
		<div class="col-md-5">
		    <form method="post" action="addprod.php" enctype="multipart/form-data">
		    	<p><input type="text" name="name" placeholder="name of the product" required style="width: 100%; padding: 5px;"></p>
		    	<p><span>Category : </span><select name="category">
		    	<?php $cmd = mysqli_query($conn, "SELECT name FROM categories"); 
		    	while ($row = mysqli_fetch_array($cmd)) {?>
    		    <option><?php echo $row[0]; ?></option>
    	<?php } ?>
		    	</select></p>
		    	<p><span>Image : </span><input type="file" name="img"></p>
		    	<p><input type="text" name="link" placeholder="link" style="width: 100%;"></p>
		    	<p><input type="text" name="offer" placeholder="Offer" style="width:100%;"></p>
		    	<p><input type="submit" value="Add product" class="btn btn-block"></p>
		    </form>
	    </div>
	<?php } ?>

	<?php if(isset($_GET['adddeal'])) { ?>
	    	<h3>Add Deal</h3>
		<div class="col-md-5">
		    <form method="post" action="adddeal.php" enctype="multipart/form-data">
		    	<p><span>Category : </span><select name="category">
		    	<?php $cmd = mysqli_query($conn, "SELECT name FROM categories"); 
		    	while ($row = mysqli_fetch_array($cmd)) {?>
    		    <option><?php echo $row[0]; ?></option>
    	<?php } ?>
		    	</select></p>
		    	<p><span>Image : </span><input type="file" name="img"></p>
		    	<p><input type="text" name="link" placeholder="link" style="width: 100%;"></p>
		    	<p><input type="text" name="offer" placeholder="Offer" style="width:100%;"></p>
		    	<p><input type="submit" value="Add deal" class="btn btn-block"></p>
		    </form>
	    </div>
	<?php } ?>

	<?php
	$getdeal = "SELECT * FROM deals WHERE best = 'n'";
	$resultgetdeal = mysqli_query($conn, $getdeal);
	$getdealy = "SELECT * FROM deals WHERE best = 'y'";
	$resultgetdealy = mysqli_query($conn, $getdealy);
	if(isset($_GET['managedeals'])){ ?>
	<div class="col-md-6">
	<table border="1" style="width:100%;" class="table">
	<?php while($row=mysqli_fetch_array($resultgetdeal)) { ?>
	<tr>
	<td style="padding=10px;"><?php echo $row[1] ?></td><td style="padding=10px;"><img src="../images/deals/<?php echo $row[2]; ?>" width="50px;"></td><td style="padding=10px;"><a href="topdeal.php?id=<?php echo $row[0]; ?>"><i class="fa fa-arrow-right"></i></a></td>
	</tr>
	<?php } ?>
	</table>
	</div>
	<div class="col-md-6">
	<table border="1" style="width:100%;" class="table">
	<?php while($row=mysqli_fetch_array($resultgetdealy)) { ?>
	<tr>
	<td style="padding=10px;"><?php echo $row[1] ?></td><td style="padding=10px;"><img src="../images/deals/<?php echo $row[2]; ?>" width="50px;"></td><td style="padding=10px;"><a href="deltopdeal.php?id=<?php echo $row[0]; ?>"><i class="fa fa-times"></i></a></td>
	</tr>
	<?php } ?>
	</table>
	</div>
	<?php } ?>


	<?php
	$getproduct = "SELECT * FROM products WHERE banner = 'n'";
	$result_getproduct = mysqli_query($conn, $getproduct);
	$getproducty = "SELECT * FROM products WHERE banner = 'y'";
	$result_getproducty = mysqli_query($conn, $getproducty);

	if(isset($_GET['manageproducts'])){ ?>
	<div class="col-md-6">
	<table border="1" style="width:100%;" class="table">
	<?php while($row=mysqli_fetch_array($result_getproduct)) { ?>
	<tr>
	<td style="padding=10px;"><?php echo $row[1] ?></td><td style="padding=10px;"><?php echo $row[6] ?></td><td style="padding=10px;"><a href="topprod.php?id=<?php echo $row[0]; ?>"><i class="fa fa-arrow-right"></i></a></td>
	</tr>
	<?php } ?>
	</table>
	</div>
	<div class="col-md-6">
	<table border="1" style="width:100%;" class="table">
	<?php while($row=mysqli_fetch_array($result_getproducty)) { ?>
	<tr>
	<td style="padding=10px;"><?php echo $row[1] ?></td><td style="padding=10px;"><?php echo $row[6]; ?></td><td style="padding=10px;"><a href="deltopprod.php?id=<?php echo $row[0]; ?>"><i class="fa fa-times"></i></a></td>
	</tr>
	<?php } ?>
	</table>
	</div>
	<?php } ?>

        <?php if(isset($_GET['addcat_succ'])) { ?>
			<p style="color: green">Category Created Sucessfully.</p>
		<?php } ?>
		<?php if(isset($_GET['addcat_size_err'])) { ?>
			<p style="color: red">File size should be less than 10mb.</p>
		<?php } ?>
		<?php if(isset($_GET['addcat_filetype_error'])) { ?>
			<p style="color: red">File should be of jpg, jpeg, webp format.</p>
		<?php } ?>	
		<?php if(isset($_GET['addcat_err'])) { ?>
			<p style="color: red">There was an error, please try again.</p>
		<?php } ?>	

		<?php if(isset($_GET['addprod_succ'])) { ?>
			<p style="color: green">Product added Sucessfully.</p>
		<?php } ?>
		<?php if(isset($_GET['addprod_size_err'])) { ?>
			<p style="color: red">File size should be less than 10mb.</p>
		<?php } ?>
		<?php if(isset($_GET['addprod_filetype_error'])) { ?>
			<p style="color: red">File should be of jpg, jpeg, webp format.</p>
		<?php } ?>	
		<?php if(isset($_GET['addprod_err'])) { ?>
			<p style="color: red">There was an error, please try again.</p>
		<?php } ?>	

		<?php if(isset($_GET['adddeal_succ'])) { ?>
			<p style="color: green">deal added Sucessfully.</p>
		<?php } ?>
		<?php if(isset($_GET['adddeal_size_err'])) { ?>
			<p style="color: red">File size should be less than 10mb.</p>
		<?php } ?>
		<?php if(isset($_GET['adddeal_filetype_error'])) { ?>
			<p style="color: red">File should be of jpg, jpeg, webp format.</p>
		<?php } ?>	
		<?php if(isset($_GET['adddeal_err'])) { ?>
			<p style="color: red">There was an error, please try again.</p>
		<?php } ?>	
	</div>
</div>










<?php } 
else {?>
	<div class="col-md-4" style="padding: 10px;">
	<form action="login.php" method="post">
		<p><input type="text" name="username" placeholder="username" required style="width: 100%"></p>
		<p><input type="password" name="password" placeholder="password" required style="width: 100%;"></p>
		<p><input type="submit" value="login" class="btn btn-block"></p>
	</form>
	<?php
	if (isset($_GET['err'])) { ?>
		<p style="color: red">Invalid username/password</p>
	<?php }
	?>
	</div>
<?php } 

?>

<script type="text/javascript" src="javascript/myscript.js"></script>
</body>
</html>