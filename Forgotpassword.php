<?php
include("dbconnection.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

 if (isset($_POST['generatePassword'])) {


	$loginID =  $_POST["loginid"];
	$loginEmail =  $_POST["email"];



	//check database to get login id of users

	$sql = "SELECT * FROM users WHERE loginid='$loginID' ";
	$qsql = mysqli_query($con, $sql);
	$rsedit = mysqli_fetch_array($qsql);
	$selectedEmail = $rsedit[email];


	// get ids from database to deleteID in user table
	$sql = "SELECT * FROM admin WHERE loginid='$loginID' ";
	$qsql = mysqli_query($con, $sql);
	$rseditAdmin = mysqli_fetch_array($qsql);
	$selectDeleteID = $rseditAdmin[adminid];



	//check id and email is same to create the random password

	if (($selectedEmail) == ($loginEmail)) {



		//create a random password

		function rand_string($length)
		{

			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			return substr(str_shuffle($chars), 0, $length);
		}

		$kasun =  rand_string(8);
		// echo $kasun;

		rand_string(8);



		//updata the password of the database in admin

		$sql = "UPDATE admin SET password='$kasun' WHERE loginid='$loginID'";
		if ($qsql = mysqli_query($con, $sql)) {
		// 	echo "<div class='alert alert-success'>
		// Admin Password updated successfully
		// </div>";
		} else {
			echo mysqli_error($con);
		}


		//updata the password of the database in doctor

		$sql = "UPDATE doctor SET password='$kasun' WHERE loginid='$loginID'";
		if ($qsql = mysqli_query($con, $sql)) {
			// echo "<div class='alert alert-success'>
			// 		doctor Password updated successfully
			// 	</div>";
		} else {
			echo mysqli_error($con);
		}


		//updata the password of the database in receptionist

		$sql = "UPDATE receptionist SET password='$kasun' WHERE loginid='$loginID'";
		if ($qsql = mysqli_query($con, $sql)) {
			// echo "<div class='alert alert-success'>
			// 						receptionist Password updated successfully
			// 					</div>";
		} else {
			echo mysqli_error($con);
		}



		//updata the password of the database in LAB assistant

		$sql = "UPDATE labAssistant SET password='$kasun' WHERE loginid='$loginID'";
		if ($qsql = mysqli_query($con, $sql)) {
			// echo "<div class='alert alert-success'>
			// 											labAssistant Password updated successfully
			// 										</div>";
		} else {
			echo mysqli_error($con);
		}



		//updata the password of the database in pharmacist

		$sql = "UPDATE pharmacist SET password='$kasun' WHERE loginid='$loginID'";
		if ($qsql = mysqli_query($con, $sql)) {
			// echo "<div class='alert alert-success'>
			// 											pharmacist Password updated successfully
			// 										</div>";
		} else {
			echo mysqli_error($con);
		}


		//////////////////////////////////////////

		//updata the password of the database in users table

		$sql = "UPDATE users SET password='$kasun', deletID='$selectDeleteID' WHERE loginid='$loginID'";
		if ($qsql = mysqli_query($con, $sql)) {
		// 	echo "<div class='alert alert-success'>
		// Admin Password updated successfully
		// </div>";
		} else {
			echo mysqli_error($con);
		}


		//send email to the the person who forgot the password

		$mail = new PHPMailer(true);

		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'medsphere.clinic@gmail.com'; //your email
		$mail->Password = 'utochqcfvqwiapmt'; //your password
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;

		$mail->setFrom('medsphere.clinic@gmail.com'); //your email

		$mail->addAddress($_POST["email"]);

		$mail->isHTML(true);

		$mail->Subject = $_POST["role"];



		//Set CC address
		$mail->addCC("ruvindukasun@gmail.com");



		$message = $_POST["phone"];

		$msg = "<b>Forgot your Password?</b> <br>
		         That's okay. It happens! <br>
				 Received your request to rest your medsphare.tk password.
				  We hava created a new auto generated password for you.<br>
				  <br>";
		$msg .= "<b>From:</b> medsphere.clinic@gmail.com <br>";
		$msg .= "<b>Your Role:</b> {$_POST["role"]} <br>";
		$msg .= "<b>Your TP:</b> $message<br>";
		$msg .= "<b>New Password:</b> {$kasun} <br>";
		$msg .= "Need futher assistant? Contact Us - +94115645950<br>";
		



		$mail->Body = $msg;

		$mail->send();
		include("index.php");
		echo '<script>alert("An auto generated password has been to your email.Please check the email")</script>';

	} else {
		echo "login id and password is not match!";
	}



	include("index.php");
	// echo '<script>alert("An auto generated password has been to your email.Please check the email")</script>';
}


?>




<!-- header section -->
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Hospital Admin</title>
	<!-- Custom Css -->
	<link rel="stylesheet" href="loginMain/fonts/icomoon/style.css">
	<link rel="stylesheet" href="loginMain/loginCss/owl.carousel.min.css">
	<link rel="stylesheet" href="loginMain/loginCss/bootstrap.min.css">
	<link rel="stylesheet" href="loginMain/loginCss/newloginstyle.css">

	<style>
		.btn-login {
			background-color: #4E4EE0;
			box-shadow: 0.2 0.2 0.2 0.2rem rgba(70, 70, 201, 0.300);
			padding: 15px 0 15px 0;
			border: none;
			color: #fff;
			border-radius: 3px;
			margin-bottom: 15px;
		}

		.btn-login:hover:active {
			background-color: #4646C9;
			box-shadow: 1 1 1 1rem rgba(70, 70, 201, 0.300);
		}
	</style>

</head>

<body>
	<!-- header section -->



	<div class="d-lg-flex half">




		<div class="bg order-1 order-md-2" style="background-image: url('loginMain/images/bg_1.jpg');"></div>
		<div class="contents order-2 order-md-1">



			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="col-md-7">
						<img class="mainlogo" src="loginMain/images/logo none background2.png" alt="logo">
						<h3>Login to <strong>MedSphere</strong></h3>
						<p class="mb-4">Your medical manage system partner.
							<br>
							Welcome to Forget Password panel
						</p>




						<form method="post" action="Forgotpassword.php" name="frmadminlogin" id="sign_in">

							<div class="form-group first">
								<label for="FullName">Full Name</label>
								<input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" />
							</div>

							<div class="form-group first">
								<label for="Login ID">Login ID</label>
								<input type="text" name="loginid" id="loginid" class="form-control" placeholder="Login ID" />
							</div>

							<div class="form-group last mb-3">
								<label for="email">Email</label>
								<input input type="text" name="email" id="email" class="form-control" placeholder="Email" />
							</div>

							<div class="form-group last mb-3">
								<label for="role">Your Role</label>
								<input input type="text" name="role" id="role" class="form-control" placeholder="Role" />
							</div>

							<div class="form-group last mb-3">
								<label for="phone">Contat Number</label>
								<input input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" />
							</div>



							<input type="submit" name="generatePassword" id="generatePassword" value="Generate a new Password and Send to your email" class="btn-block btn-login" />


							<!--btn btn-block btn-primary-->

							<div id="err"><?php echo $err;
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

	function validateform() {
		if (document.frmadminlogin.loginid.value == "") {
			document.getElementById("err").innerHTML = "<div class='alert alert-info'><strong>Heads up!</strong> Please enter Password</div>";
			document.frmadminlogin.loginid.focus();
			return false;
		} else if (!document.frmadminlogin.loginid.value.match(alphanumericExp)) {
			document.getElementById("err").innerHTML = "<div class='alert alert-Warning'><strong>Heads up!</strong> Invalid Password</div>";
			document.frmadminlogin.loginid.focus();
			return false;
		} else if (document.frmadminlogin.password.value == "") {
			document.getElementById("err").innerHTML = "<div class='alert alert-info'><strong>Heads up!</strong> Should not be empty</div>";
			document.frmadminlogin.password.focus();
			return false;
		} else if (document.frmadminlogin.password.value.length < 8) {
			document.getElementById("err").innerHTML = "<div class='alert alert-info'><strong>Heads up!</strong> Length should be 8</div>";
			document.frmadminlogin.password.focus();
			return false;
		} else {
			return true;
		}
	}
</script>