<?php
include("adheader.php");
include("dbconnection.php");



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['send'])) {



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

	$mail->Subject = $_POST["subject"];


     $message = $_POST["message"];

	 $msg = "Message from contact us page of the website: <br>";
	 $msg .="<b>From:</b> {$_POST["name"]} <br>";
	 $msg .="<b>Subject:</b> {$_POST["subject"]} <br>";
	 $msg .="<b>Message:</b> $message";



	$mail->Body = $msg;

	$mail->send();


}

?>



<div class="container-fluid">




	<div class="block-header">
		<h2 class="text-center"> Email </h2>

	</div>
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">





				<form method="post" action="emailPatient.php" name="emailformPatient" onSubmit="return validateform()">


					<div class="body">


				
					<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<label style="color: #000;">Full Name</label>
									<div class="form-line">
										<input type="text" class="form-control" name="name" id="name" value="" placeholder="Enter Name" />
									</div>
								</div>
							</div>
						</div>



						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<label style="color: #000;">Email</label>
									<div class="form-line">
										<input type="text" class="form-control" name="email" id="email" value="" placeholder="Enter email" />
									</div>
								</div>
							</div>
						</div>



						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<label style="color: #000;">Subject</label>
									<div class="form-line">
										<input type="text" class="form-control" name="subject" id="subject" value="" placeholder="Enter subject" />
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<label style="color: #000;">Message</label>
									<div class="form-line">

										<textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Type your Email here"></textarea>
									</div>
								</div>
							</div>
						</div>






						<div class="col-sm-12">
							<input type="submit" class="btn btn-raised g-bg-cyan" name="send" id="submit" value="SEND" />

						</div>


					</div>


				</form>
			</div>
		</div>
	</div>



</div>







<?php




include("emailAdminSearch.php");
include("adfooter.php");
?>


<script type="application/javascript">
	var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
	var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
	var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

	function validateform() {
if (document.emailformPatient.email.value == "") {
		alert("Email should not be empty..");
		document.emailformPatient.email.focus();
		return false;
	} else if (!document.emailformPatient.email.value.match(emailExp)) {
		alert("Email not valid..");
		document.frmadminprofile.email.focus();
		return false;
	} else if (document.emailformPatient.subject.value == "") {
		alert(" subject should not be empty..");
		document.emailformPatient.adminname.focus();
		return false;
	// } 
	// else if (!document.emailformPatient.subject.value.match(alphanumericExp)) {
	// 	alert("Name not valid..");
	// 	document.emailformPatient.subject.focus();
	// 	return false;
	} else if (document.emailformPatient.message.value == "") {
		alert(" Message should not be empty..");
		document.emailformPatient.message.focus();
		return false;
	}
	//  else if (!document.emailformPatient.message.value.match(alphanumericExp))
	//  {
	// 	alert("Name not valid..");
	// 	document.emailformPatient.message.focus();
	// 	return false;
	// } 
	
	else {
		return true;
	}
	}
</script>