<!DOCTYPE html>
<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "cashback");
if (!$conn) {
	die("database server error");
}
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/products.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script type="text/javascript" src="javascript/jquery.js"></script>
    <script type="text/javascript" src="javascript/myscript.js"></script>
    <script type="text/javascript" src="javascript/login.js"></script>
        <title>Products</title>
    </head>
    <body>
    <!-----------------------------------login--------------------------------------------------------------------->
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
    <!----------------------------------navbar---------------------------------------------------------------------->
    <div class="navbar">
<div class="col-md-5 heading"><h3><a href="index.php">Earning Shop</a></h3></div>
<div class="col-md-7 links">
<div class="col-md-4"></div>
<p class="linksp">
<?php if(isset($_SESSION['name'])) { ?>
<a href="account.php?account">My Account</a>
<a href="logout.php">Signout</a>
<a href="">How it Works</a>
<?php } 
else{?>
<a id="login_signup" style="cursor:pointer;">Login/Sign up</a>
<a href="">How it Works</a>
<?php } ?>
<span class="menubar"><i class="fa fa-bars" style="color:white; font-size:20px;"></i></span>
<div class="openmenu">
<ul>
<li style="text-align:center;"><a href="products.php?allproducts">All Products</a></li>
<li style="text-align:center;"><a href="products.php?alldeals">All deals</a></li>
<li style="text-align:center;"><a href="#categories">Categories</a></li>
<li style="text-align:center;"><a href="">About us</a></li>
</ul>
</div>
</p>
</div>
</div>
<div class="clearfix"></div>
<!-------------------------------------------body------------------------------------------------------------------>
        <?php 
        if(isset($_GET['cat'])){
            ?>
        <?php 
        $sql = "SELECT * FROM products WHERE category = '".$_GET['cat']."'"; 
        $result = mysqli_query($conn, $sql);
        ?>
        <div class="showproducts">
            
        <?php while($row = mysqli_fetch_array($result)) { ?>
            <?php if(isset($_SESSION['name'])) { ?>
        <a href="<?php echo $row[5]; ?>">
        <?php } 
        else {?>
        <a href="products.php?loginfirst">
            <?php } ?>
        <div class="products col-md-2">
        <div class="shadow">
        <img src="images/products/<?php echo $row[3]; ?>" alt="img" width="100%">
        <p class="nameofprod"><?php echo $row[1] ?></p>
        <p class=offeronprod><?php echo $row[6]; ?></p>
        </div>
        </div>
        </a>
        </a>

        <?php } ?>
        </div>


        <div class="clearfix"></div>
        <?php 
        $cmd = "SELECT * FROM deals WHERE category = '".$_GET['cat']."'";
        $result1 = mysqli_query($conn, $cmd);
        ?>
        <div class="showdeals">
            <h4>Deals</h4>
            <hr>
        <?php while($row1 = mysqli_fetch_array($result1)) { ?>
            <?php if(isset($_SESSION['name'])) { ?>
        <a href="<?php echo $row1[4]; ?>">
        <?php }
        else {?>
        <a href="products.php?loginfirst">
        <?php }?>
        <div class="deals col-md-2">
        <div class="shadow">
        <img src="images/deals/<?php echo $row1[2]; ?>" alt="img">
        <p class=offerondeal><?php echo $row1[3]; ?></p>
        </div>
        </div>
        </a>
        </a>

        <?php }
        } ?>
        </div>

<!--------------------------------------All products and deals--------------------------------------------------------->
<?php 
if(isset($_GET['allproducts'])) {
$products = "SELECT * FROM products";
$result_products = mysqli_query($conn, $products);
?>
<div class="allproducts">
    <?php while($rowproducts = mysqli_fetch_array($result_products)) { ?>
        <?php if(isset($_SESSION['name'])) { ?>
    <a href="<?php echo $rowproducts[5] ?>">
    <?php }
    else {?>
    <a href="products.php?loginfirst">
    <?php } ?>
    <div class="showallproducts col-md-2">
        <div class="shadow">
            <img src="images/products/<?php echo $rowproducts['3'];?>" alt="img">
            <p class="nameofprod"><?php echo $rowproducts[1]; ?></p>
            <p class="offeronprod"><?php echo $rowproducts[6]; ?></p>
        </div>
    </div>
    </a>    
    </a>
        <?php } ?>
</div>
<?php } 

if(isset($_GET['alldeals'])) {
$deals = "SELECT * FROM deals";
$result_deals = mysqli_query($conn, $deals);
?>
<div class="allproducts">
    <?php while($rowdeals = mysqli_fetch_array($result_deals)) { ?>
        <?php if(isset($_SESSION['name'])) { ?>
    <a href="<?php echo $rowdeals[4] ?>">
    <?php }
    else {?>
    <a href="products.php?loginfirst">
        <?php } ?>
    <div class="showallproducts col-md-2">
        <div class="shadow">
            <img src="images/deals/<?php echo $rowdeals['2'];?>" alt="img" style="width:100%;">
            <p class="nameofprod" style="font-size:18px;"><?php echo $rowdeals['1'] ?></p>
            <p class="offerondeal"><?php echo $rowdeals[3]; ?></p>
        </div>
    </div>
    </a>    
    </a>
        <?php } ?>
</div>
<?php } ?>
    </body>
</html>