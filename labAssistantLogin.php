<?php
session_start();

?>
<?php
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>
<!-- header section -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Hospital Admin</title>
<link rel="shortcut icon" href="/images/logo none background2.png" type=image/png>
<!-- Custom Css -->

    <link rel="stylesheet" href="loginMain/fonts/icomoon/style.css">
    <link rel="stylesheet" href="loginMain/loginCss/owl.carousel.min.css">
    <link rel="stylesheet" href="loginMain/loginCss/bootstrap.min.css">
    <link rel="stylesheet" href="loginMain/loginCss/newloginstyle.css">

	<style>
	.btn-login {
		background-color: #4E4EE0;
		box-shadow:0.2 0.2 0.2 0.2rem rgba(70, 70, 201, 0.300);
		padding: 15px 0 15px 0;
		border: none;
		color: #fff;
		border-radius: 3px;
		margin-bottom: 15px;
	}
	.btn-login:hover:active{
		background-color: #4646C9;
		box-shadow:1 1 1 1rem rgba(70, 70, 201, 0.300);
	}
	</style>

</head>
<body >
<!-- header section -->

<?php
if(isset($_SESSION[labAssistantId]))
{
	echo "<script>window.location='labAssistantAccount.php';</script>";
	
}
$err='';
if(isset($_POST[submit]))
{
	$sql = "SELECT * FROM labAssistant WHERE loginid='$_POST[loginid]' AND password='$_POST[password]' AND status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) >= 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION[labAssistantId]= $rslogin[labAssistantId] ;
		echo "<script>window.location='labAssistantAccount.php';</script>";
		
	}
	else
	{
		$err = "<div class='alert alert-danger'>
		<strong>Oh !</strong> Change a few things up and try submitting again.
	</div>";
	}
}
		
?>


<div class="d-lg-flex half">




    <div class="bg order-1 order-md-2" style="background-image: url('loginMain/images/lab-assistant-in-work.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
		  <a href="https://medsphere.tk/">
            <img class="mainlogo" src="loginMain/images/logo none background2.png"  alt="logo">
			</a>
            <h3><strong>Lab Assistant</strong> Login</h3>
            <p class="mb-4"><strong>MedSphere</strong> 
			Your medical manage system partner
			</p>

			



            <form method="post" action="" name="frmadminlogin" id="sign_in" onSubmit="return validateform()">

              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" name="loginid" id="loginid" class="form-control" placeholder="Username" />
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input input type="password" name="password" id="password" class="form-control"  placeholder="Password"/>
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" name="rememberme" id="rememberme"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="Forgotpassword.php" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" name="submit" id="submit" value="Login" class="btn-block btn-login"/>
			  <div id = "err"><?php echo $err;
	           ?></div>

            </form>
          </div>
        </div>
      </div>
    </div> 
  </div>

<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>
</html>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmadminlogin.loginid.value == "")
	{
		document.getElementById("err").innerHTML ="<div class='alert alert-info'><strong>Heads up!</strong> Please enter Password</div>";
		document.frmadminlogin.loginid.focus();
		return false;
	}
	else if(!document.frmadminlogin.loginid.value.match(alphanumericExp))
	{
		document.getElementById("err").innerHTML ="<div class='alert alert-Warning'><strong>Heads up!</strong> Invalid Password</div>";
		document.frmadminlogin.loginid.focus();
		return false;
	}
	else if(document.frmadminlogin.password.value == "")
	{
		document.getElementById("err").innerHTML ="<div class='alert alert-info'><strong>Heads up!</strong> Should not be empty</div>";
		document.frmadminlogin.password.focus();
		return false;
	}
	else if(document.frmadminlogin.password.value.length < 8)
	{
		document.getElementById("err").innerHTML ="<div class='alert alert-info'><strong>Heads up!</strong> Length should be 8</div>";
		document.frmadminlogin.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>