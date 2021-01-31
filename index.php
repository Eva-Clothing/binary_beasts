<!DOCTYPE html>
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "cashback");
if (!$conn) {
	die("database server error");
}
$cmd = "SELECT * FROM categories";
$cat = mysqli_query($conn, $cmd);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/products.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="javascript/jquery.js"></script>

	<title>Index</title>
</head>





<body>
	<!-----------------------------------login---------------------------------->
<div class=modal>

<div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button"  class="toggle-btn" id="clicklogin">LogIn</button>
				<button type="button"  class="toggle-btn" id="clicksignup">Sign up</button>
			</div>
			<span class="cross_box"><i class="fa fa-times"></i></span>
            <!-- <div class="social-icons">
                <img src="fb.png" alt="facebook">
                <img src="twitter.png" alt="twitter">
                <img src="google.png" alt="google">
            </div> -->
            <form action="signin.php" id="login" class="input-group" method="post">
                <input type="text" class="input-field" placeholder="Email ID" name="mail" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <button type="submit" class="submit-btn">Log In</button>
            </form>
            <form action="join.php" id="signup" class="input-group" method="post" >
                <input type="text" class="input-field" placeholder="Name" name="name" required>
                <input type="text" class="input-field" placeholder="Email ID" name="mail" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <button type="submit" class="submit-btn">Sign up</button>
            </form>
        </div>
</div>

<?php if(isset($_GET['loginerror'])) { ?>
<div class="loginerror">
<div class="login_error">
<div class="exclamation">
	<h2>OOPS!! </h2>
<i class="fa fa-exclamation-circle"></i>
</div>
<h4>You have used invalid Credentials</h4>
<div class="tryagain">
<button class="btn">Try again</button></div>
</div>
</div>
<?php } ?>
<?php if(isset($_GET['accountcreated'])) { ?>
<div class="loginerror">
<div class="accountcreated">
<div class="check">
<i class="fa fa-check-circle"></i>
</div>
<h4>Account Created Sucessfully</h4>
<div class="tryagain">
<button class="btn">Login</button></div>
</div>
</div>
<?php } ?>
<?php if(isset($_GET['accountexists'])) { ?>
<div class="loginerror">
<div class="login_error">
<div class="exclamation">
<i class="fa fa-exclamation-circle"></i>
</div>
<h4>Mail is already registerd</h4>
<div class="tryagain">
<button class="btn">Login</button></div>
</div>
</div>
<?php } ?>
<?php  if(isset($_GET['loginfirst'])){ ?>
	<div class=modal style="display:block;">

<div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button"  class="toggle-btn" id="clicklogin">LogIn</button>
				<button type="button"  class="toggle-btn" id="clicksignup">Sign up</button>
			</div>
			<span class="cross_box"><i class="fa fa-times"></i></span>
            <!-- <div class="social-icons">
                <img src="fb.png" alt="facebook">
                <img src="twitter.png" alt="twitter">
                <img src="google.png" alt="google">
            </div> -->
            <form action="signin.php" id="login" class="input-group" method="post">
                <input type="text" class="input-field" placeholder="Email ID" name="mail" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <button type="submit" class="submit-btn">Log In</button>
            </form>
            <form action="join.php" id="signup" class="input-group" method="post" >
                <input type="text" class="input-field" placeholder="Name" name="name" required>
                <input type="text" class="input-field" placeholder="Email ID" name="mail" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <button type="submit" class="submit-btn">Sign up</button>
            </form>
        </div>
</div>
<?php } ?>
	<!-- ----------------------------------------------------------------Navbar---------------------------------------------------------- -->
<div class="navbar">
<div class="col-md-5 heading"><h3><a href="index.php">Earning Shop</a></h3></div>
<div class="col-md-7 links">
<div class="col-md-4"></div>
<p class="linksp">
<?php if(isset($_SESSION['name'])) { ?>
<a href="account.php?account">My Account</a>
<a href="logout.php">Signout</a>
<a href="works.php">How it Works</a>
<?php } 
else{?>
<a id="login_signup" style="cursor:pointer;">Login/Sign up</a>
<a href="works.php">How it Works</a>
<?php } ?>
<span class="menubar"><i class="fa fa-bars" style="color:white; font-size:20px;"></i></span>
<div class="openmenu">
<ul>
<li style="text-align:center;"><a href="products.php?allproducts">All Products</a></li>
<li style="text-align:center;"><a href="products.php?alldeals">All deals</a></li>
<li style="text-align:center;"><a href="#categories">Categories</a></li>
<li style="text-align:center;"><a href="about_us.php">About us</a></li>
</ul>
</div>
</p>
</div>
</div>
<div class="clearfix"></div>	
<!-------------------------------------------------------------Searchbar-------------------------------------------------------------- -->
<div class="search">
	<div class="col-md-5 mainheadings">
	<p class="s_and_e">SHOP AND EARN</p>
	<p class="col-md-4 onbestdeals">ON BEST DEALS</p>
	</div>
	<div class="clearfix"></div>
<div class="searchbar col-md-4">
<input type="text" placeholder="Search here......" name="search_txt" id="search_txt"><span class="searchicon"><i class="fa fa-search"></i></span>
</div>
<div class="col-md-4" style="padding-left:20px;">
<p class="earnpoints">Earn Points and Redeem them to your bank account.</p></div>
<div class="clearfix"></div>    
</div>





	<!-- -----------------------------------------------------------------Categories----------------------------------------------------- -->


<div class="clearfix"></div>
	<div class="categories" id="categories">
	
	<div style="margin:auto;width:95%;">
	<div>
	<h3>Categories</h3>
		<?php while($row=mysqli_fetch_array($cat)) { ?>
	<a href="products.php?cat=<?php echo $row[1]; ?>">
		<div class="showcat col-md-2">
			<div class="col-md-4"></div>
			<div class="col-md-6"><img src="images/categories/<?php echo $row[2]; ?>"></div>
			<div class="col-md-2"></div>
			<div class="clearfix"></div>
			<p align="center"><?php echo $row[1]; ?></p>
		</div>
	</a>
<?php } ?>
</div>
</div>
	</div>
<div class="clearfix"></div>

<!---------------------------------------------------------Top deals------------------------------------------------------------------------->
	<?php
	$getdealy = "SELECT * FROM deals WHERE best = 'y'";
	$result_getdealsy = mysqli_query($conn, $getdealy);
	?>
	<div class="topdeals">
		<h2 style="margin-left:8px;font-weight:bold;color:#ff2e2e;">Top Deals</h2><hr>
		<?php while($row_s=mysqli_fetch_array($result_getdealsy)) { ?>
			<?php if(isset($_SESSION['name'])) { ?>
			<a href="<?php echo $row_s[4]; ?>">
			<?php } 
			else{ ?>
			<a href="index.php?loginfirst">
			<?php }?>
        <div class="deals col-md-2">
        <div class="shadow">
		<img src="images/deals/<?php echo $row_s[2]; ?>" alt="img">
		<p class="nameofprod"><?php echo $row_s[1] ?></p>
        <p class=offerondeal><?php echo $row_s[3]; ?></p>
        </div>
        </div>
		</a>
		</a>
<?php } ?>
	</div>
<div class="clearfix"></div>
<!--------------------------------------top products------------------------------------------------------------------------->
<?php 
$getprody = "SELECT * FROM products WHERE banner = 'y'";
$result_getprody = mysqli_query($conn, $getprody);
?>
<div class="showproducts">
	<br>
            <h2 style="margin-left:8px;font-weight:bold;color:#ff2e2e;">Best Sellers</h2><hr>
			<?php while($row_p = mysqli_fetch_array($result_getprody)) { ?>
				<?php if(isset($_SESSION['name'])) { ?>
			<a href="<?php echo $row_p[5]; ?>">
			<?php } 
			else{?>
			<a href="index.php?loginfirst">
				<?php } ?>
			<div class="products col-md-2">
			<div class="shadow">
			<img src="images/products/<?php echo $row_p[3]; ?>" alt="img" width="100%">
			<p class="nameofprod"><?php echo $row_p[1] ?></p>
			<p class=offeronprod><?php echo $row_p[6]; ?></p>
			</div>
			</div>
			</a>
			</a>
	
			<?php } ?>
</div>
<div class="clearfix"></div>
<br>
<!--------------------------------footer----------------------------------------------------------->
<footer>
<div class="footer">
  <a href="#"><span class="footer-content">Earning Shop | &copy; 2021 Binary Beasts</span></a>
  
</div>
</footer>


<script type="text/javascript" src="javascript/login.js"></script>
<script type="text/javascript" src="javascript/myscript.js"></script>
</body>
</html>
