<?php
include("adheader.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
		$sql ="UPDATE pharmacist SET pharmacist_name='$_POST[pharmacist_name]',loginid='$_POST[loginid]',password='$_POST[password]',status='$_POST[select]',email='$_POST[email]',phonenumber='$_POST[phonenumber]',address='$_POST[address]',pharmacist_slmc_id='$_POST[pharmacist_slmc_id]' WHERE pharmacist_id='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<div class='alert alert-success'>
			Pharmacist Record updated successfully
			</div>";
		}
		else
		{
			echo mysqli_error($con);
		}	


		
				//update user table
				$sql = "UPDATE users SET loginid='$_POST[loginid]',password='$_POST[password]',type='pharmacist',email='$_POST[email]' WHERE deletID='$_GET[editid]'";
				if ($qsql = mysqli_query($con, $sql)) {
					echo "<div class='alert alert-success'>
					pharmacist Record updated successfully
					</div>";
				} else {
					echo mysqli_error($con);
				}
	}
	else
	{
		$sql ="INSERT INTO pharmacist(pharmacist_name,loginid,password,status,email,address,phonenumber,pharmacist_slmc_id) values('$_POST[pharmacist_name]','$_POST[loginid]','$_POST[password]','$_POST[select]','$_POST[email]','$_POST[address]','$_POST[phonenumber]','$_POST[pharmacist_slmc_id]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<div class='alert alert-success'>
			pharmacist Record Inserted successfully
			</div>";
		}
		else
		{
			echo mysqli_error($con);
		}




			/////select data from pharmassit database to get deleteid of user tablae
			$sql = "SELECT * FROM pharmacist WHERE loginid='$_POST[loginid]'  ";
			$qsql = mysqli_query($con, $sql);
			$getDeleteIDfromUser = mysqli_fetch_array($qsql);
	
			$getdoctorid = $getDeleteIDfromUser[pharmacist_id];





		//insert data to user tables
		$sql ="INSERT INTO users(loginid,type,password,email,deletID) values('$_POST[loginid]','pharmacist','$_POST[password]','$_POST[email]','$getdoctorid')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<div class='alert alert-success'>
			the data is inserted in users table
			</div>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM pharmacist WHERE pharmacist_id='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<div class="container-fluid">
	<div class="block-header">
		<h2 class="text-center"> Add New Pharmacist </h2>
	</div>
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">

				<form method="post" action="" name="frmadminprofile" >


					<div class="body">


						<div class="row clearfix">
							<div class="col-sm-12">   
								<div class="form-group">
									<label> Pharmacist Name</label>
									<div class="form-line">
										<input type="text" class="form-control"  name="pharmacist_name" id="name"  value="<?php echo $rsedit[pharmacist_name]; ?>"  />
									</div>
								</div>

							</div>	

						</div>


						<div class="row clearfix">
							<div class="col-sm-12">   
								<div class="form-group">
									<label> Pharmacist Email</label>
									<div class="form-line">
										<input type="text" class="form-control"  name="email" id="email"  value="<?php echo $rsedit[email]; ?>"  />
									</div>
								</div>

							</div>	

						</div>

						<div class="row clearfix"> 
							<div class="col-sm-12">                           
								<div class="form-group">
									<label>Pharmacist Login Id </label>
									<div class="form-line">
										<input type="text" class="form-control" name="loginid" id="loginid"  value="<?php echo $rsedit[loginid]; ?>"  />
									</div>
								</div>    
							</div>                      
						</div>  



                        <div class="row clearfix">
							<div class="col-sm-12">   
								<div class="form-group">
									<label> Pharmacist Address</label>
									<div class="form-line">
										<input type="text" class="form-control"  name="address" id="address"  value="<?php echo $rsedit[address]; ?>" />
									</div>
								</div>

							</div>	

						</div>



                        <div class="row clearfix">
							<div class="col-sm-12">   
								<div class="form-group">
									<label> Pharmacist Phone</label>
									<div class="form-line">
										<input type="text" class="form-control"  name="phone" id="phone"  value="<?php echo $rsedit[phonenumber]; ?>"  />
									</div>
								</div>

							</div>	

						</div>




                        
                        <div class="row clearfix">
							<div class="col-sm-12">   
								<div class="form-group">
									<label> Pharmacist SLMC ID</label>
									<div class="form-line">
										<input type="text" class="form-control"  name="pharmacist_slmc_id" id="pharmacist_slmc_id"  value="<?php echo $rsedit[pharmacist_slmc_id]; ?>" />
									</div>
								</div>

							</div>	

						</div>





						<div class="row clearfix"> 
							<div class="col-sm-12">                              
								<div class="form-group">
									<label> Pharmacist Password</label>
									<div class="form-line">
										<input type="password" class="form-control"  name="password" id="password" />
									</div>
								</div>
							</div>                          
						</div> 


						<div class="row clearfix"> 
							<div class="col-sm-12">                              
								<div class="form-group">
									<label>Confirm Pharmacist Password</label>
									<div class="form-line">
										<input type="password" class="form-control"  name="cpassword" id="cpassword" />
									</div>
								</div>
							</div>                          
						</div> 


						<div class="row clearfix">                            
							<div class="col-sm-3 col-xs-12">
								<div class="form-group drop-custum">
									<label>Status</label>

									<select class="form-control show-tick" name="select">
										<option value="" selected>Select One</option>
										<?php
										$arr = array("Active","Inactive");
										foreach($arr as $val)
										{
											if($val == $rsedit[status])
											{
												echo "<option value='$val' selected>$val</option>";
											}
											else
											{
												echo "<option value='$val'>$val</option>";			  
											}
										}
										?>
									</select>
								</div>
							</div>                            
						</div>                    

						<div class="col-sm-12">
							<input type="submit" class="btn btn-raised g-bg-cyan" name="submit" id="submit" value="Submit" />

						</div>
					</div>


				</form>
			</div>
		</div>
	</div>
</div>

				<?php
				include("adfooter.php");
				?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmadminprofile.adminname.value == "")
	{
		alert("Admin name should not be empty..");
		document.frmadminprofile.adminname.focus();
		return false;
	}
	else if(!document.frmadminprofile.adminname.value.match(alphaspaceExp))
	{
		alert("Admin name not valid..");
		document.frmadminprofile.adminname.focus();
		return false;
	}
	else if(document.frmadminprofile.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmadminprofile.loginid.focus();
		return false;
	}
	else if(!document.frmadminprofile.loginid.value.match(alphanumericExp))
	{
		alert("Login ID not valid..");
		document.frmadminprofile.loginid.focus();
		return false;
	}
	else if(document.frmadminprofile.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmadminprofile.password.focus();
		return false;
	}
	else if(document.frmadminprofile.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmadminprofile.password.focus();
		return false;
	}
	else if(document.frmadminprofile.password.value != document.frmadminprofile.cnfirmpassword.value )
	{
		alert("Password and confirm password should be equal..");
		document.frmadminprofile.password.focus();
		return false;
	}
	else if(document.frmadminprofile.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmadminprofile.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>