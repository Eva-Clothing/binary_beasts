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
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="javascript/jquery.js"></script>
    <script type="text/javascript" src="javascript/myscript.js"></script>
    <title>Manage Account</title>
</head>
<body>
<div class="navbar">
<div class="col-md-5 heading"><h3><a href="index.php">Earning Shop</a></h3></div>
<div class="col-md-7 links">
<div class="col-md-4"></div>
<p class="linksp">
<?php if(isset($_SESSION['name'])) { ?>
<a href="account.php?account">My Account</a>
<a href="logout.php">Signout</a>
<a href="">How it Works</a>

<span class="menubar"><i class="fa fa-bars" style="color:white; font-size:20px;"></i></span>
<div class="openmenu">
<ul>
<li style="text-align:center;"><a href="">All Products</a></li>
<li style="text-align:center;"><a href="">All deals</a></li>
<li style="text-align:center;"><a href="#categories">Categories</a></li>
<li style="text-align:center;"><a href="">About us</a></li>
</ul>
</div>
</p>
</div>
</div>
<div class="clearfix"></div>
<!-----------------------------------------------Body------------------------------------------------------------->
<h3>My Account</h3><br>
<?php if(isset($_GET['account'])) { ?>
<div>
    <div class="col-md-3">
        <div class="account_lhs">
            <p style="border-left: 2.5px solid #ff2e2e;"><a href="account.php?account">My Account</a></p>
            <p><a href="account.php?wallet">My wallet</a></p>
            <p><a href="account.php?request">Payment Request</a></p>
            <p><a href="account.php?changepassword">Change Password</a></p>
        </div>
    </div>
    <div class="col-md-9">
        <div class="account_rhs">
            <p style="font-size:20px; padding:0px;">Personal Details</p><hr>
            <p>Name : <?php echo $_SESSION['name'] ?></p>
            <p>Email : <?php echo $_SESSION['mail'] ?></p>
            <br>
            <h4>Payment Details</h4>
            <form action="paymentdet.php" method="post">
                <p><input type="text" name="mobile" placeholder="paytm Number"></p>
                <p><input type="text" name="bankholdername" Placeholder="Bank Account Holder Name"></p>
                <p><input type="text" name="bankaccountnumber" placeholder="Account Number"></p>
                <p><input type="text" name="ifsc" placeholder="Ifsc Code"></p>
                <p><input type="text" name="bankname" placeholder="Bank Name"></p>
                <p><input type="submit" value="Submit" class="btn btn submit" style="border:none"></p>
            </form>
            <form action="">
            <p><input type="text" name="orderid" placeholder = "Enter order Id of the product you purchased"></p>
                <p><input type="submit" value="Submit" class="btn btn submit" style="border:none"></p>
            </form>
        </div>
    </div>
</div>
<?php } 
if(isset($_GET['wallet'])) { ?>
<div>
    <div class="col-md-3">
        <div class="account_lhs">
            <p><a href="account.php?account">My Account</a></p>
            <p style="border-left: 2.5px solid #ff2e2e;"><a href="account.php?wallet">My wallet</a></p>
            <p><a href="account.php?request">Payment Request</a></p>
            <p><a href="account.php?changepassword">Change Password</a></p>
        </div>
    </div>
    <div class="col-md-9">
        <div calss="wallet_rhs">
            <h4>Cashback Points</h4>
            <hr>
            <p>You wave earned <?php echo $_SESSION['points']; ?> Points</p>
            <br>
            <p>Collect 200 points to transfer them in your bank account.</p>
        </div>
    </div>
</div>
    <?php } 
    if(isset($_GET['request'])) { ?>
    <div>
    <div class="col-md-3">
        <div class="account_lhs">
            <p><a href="account.php?account">My Account</a></p>
            <p><a href="account.php?wallet">My wallet</a></p>
            <p style="border-left: 2.5px solid #ff2e2e;"><a href="account.php?request">Payment Request</a></p>
            <p><a href="account.php?changepassword">Change Password</a></p>
        </div>
    </div>
    <div class="col-md-9">
        <div class="request_rhs">
            <h4>Redeem Points in Your Account.</h4><hr>
        <p>You wave earned <span id="points"><?php echo $_SESSION['points']; ?></span> Points</p>
        <a href="request.php" id="request"><button class="btn">Request Transfer</button></a>
        </div>
    </div>
    </div>
    <?php } 
    
    if(isset($_GET['changepassword'])) {?>
    <div>
    <div class="col-md-3">
        <div class="account_lhs">
            <p><a href="account.php?account">My Account</a></p>
            <p><a href="account.php?wallet">My wallet</a></p>
            <p><a href="account.php?request">Payment Request</a></p>
            <p style="border-left: 2.5px solid #ff2e2e;"><a href="account.php?changepassword">Change Password</a></p>
        </div>
    </div>
    <div class="col-md-9">
        <div class="changepassword_RHS">
            <h4>Change Password</h4><hr>
            <form action="changepassword.php" method="post">
                <p><input type="password" name="currentpass" placeholder = "Enter Current Password"></p>
                <p><input type="password" name="newpass" placeholder = "Enter new Password" id="newpass"></p>
                <p><input type="password" name="confpass" placeholder = "Confirm new Password" id="confnewpass"></p>
                <p><input type="submit" value="Change Password" id="changepassword" class="btn btn submit" style="border:none"></p>
            </form>
        </div>
    </div>
    </div>
    <?php } 
    
    }
    else{
        header('location:index.php');
    }
    ?>
</body>
</html>