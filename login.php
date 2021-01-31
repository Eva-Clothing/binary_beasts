<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="javascript/jquery.js"></script>
	<script type="text/javascript" src="javascript/login.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<title>Login</title>
</head>
<body>
	<?php if(isset($_GET['succ'])){ ?>
		<p style="color: green;">Account created sucessfully.</p>
	<?php } ?>
<!-- <div class="col-md-4">
	<form method="post" action="signin.php">
		<input type="text" name="mail" placeholder="E mail" required style="width: 100%; padding: 5px;">
		<input type="password" name="password" placeholder="password" required style="width: 100%; padding: 5px;">
		<input type="submit" value="login" class="btn btn-block">
	</form>
	
</div> -->
<!-- -----------------------------------------------------Login/Signup----------------------------------------------------- -->
<!-- <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button"  class="toggle-btn" id="clicklogin">LogIn</button>
                <button type="button"  class="toggle-btn" id="clicksignup">Sign up</button>
            </div> -->
            <!-- <div class="social-icons">
                <img src="fb.png" alt="facebook">
                <img src="twitter.png" alt="twitter">
                <img src="google.png" alt="google">
            </div> -->
            <!-- <form action="signin.php" id="login" class="input-group" method="post">
                <input type="text" class="input-field" placeholder="Email ID" name="mail" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <button type="submit" class="submit-btn">Log In</button>
            </form>
            <form action="join.php" id="signup" class="input-group" method="post" >
                <input type="text" class="input-field" placeholder="Name" name="name" required>
                <input type="text" class="input-field" placeholder="Email ID" name="mail" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <input type="password" class="input-field" placeholder="Confirm Password" required>
                <button type="submit" class="submit-btn">Sign up</button>
            </form>
        </div>
    </div> -->

	---------------------------------------------------------

<?php if(isset($_GET['err'])){ ?>
		<p style="color: red">Inavlid mail/password.</p>
	<?php } ?>
</body>
</html>