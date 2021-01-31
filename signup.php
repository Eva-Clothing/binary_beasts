<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="javascript/jquery.js"></script>
	<title>Sign up</title>
</head>
<body>
<div class="col-md-4">
	<form method="post" action="join.php">
		<p><input type="text" name="name" placeholder="Name" required style="width: 100%; padding:5px;"></p>
		<p><input type="text" name="mail" placeholder="Enter your mail Id" required style="width: 100%; padding:5px;"></p>
		<p><input type="password" name="password" placeholder="password" required style="width: 100%; padding:5px;"></p>
		<p><input type="submit" value="Create Account" class="btn btn-block"></p>
	</form>
	<?php if(isset($_GET['alr'])) { ?>
	<p style="color: red">Account already exists. Please login.</p>
<?php }?>
<?php if(isset($_GET['err'])) { ?>
	<p style="color: red">There was error please try again.</p>
<?php }?>
</div>
<script type="text/javascript" src="javascript/myscript.js"></script>
</body>
</html>