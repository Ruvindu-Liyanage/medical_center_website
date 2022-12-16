<?php
include("adheader.php");
include("dbconnection.php");
if(isset($_POST[btnsubmit]))
{
	if(isset($_GET[editid]))
	{
		$sql ="UPDATE patient SET patientname='$_POST[txtpatientname]',admissiondate='$_POST[admissiondate]',
        address='$_POST[txtaddress]',mobileno='$_POST[txtcontactnumber]',bloodgroup='$_POST[selectbloodgroup]',
        gender='$_POST[selectGender]',dob='$_POST[dateofbirth]',status='$_POST[select]' WHERE patientid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('patient record updated successfully.');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO patient(patientname,NIC,admissiondate,address,mobileno,bloodgroup,gender,dob,status,email) 
		values('$_POST[txtpatientname]','$_POST[txtpatientNIC]','$dt','$_POST[txtaddress]','$_POST[txtcontactnumber]',
		'$_POST[selectbloodgroup]','$_POST[selectGender]','$_POST[dateofbirth]','Active','$_POST[txtemail]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('patients record added successfully.');</script>";
			/*
			$insid= mysqli_insert_id($con);
			if(isset($_SESSION[adminid]))
			{
				echo "<script>window.location='appointment.php?patid=$insid';</script>";	
			}
			else
			{
				echo "<script>window.location='patientlogin.php';</script>";	
			}
			*/		
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM patient WHERE patientid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);



    
    $sqldept = "SELECT email FROM patient WHERE patientid='$_GET[editid]'";
    $qsqldept = mysqli_query($con,$sqldept);
    $rsdept = mysqli_fetch_array($qsqldept);

	
}
?>

<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center">Patient Registration Panel</h2>

    </div>
    <div class="card">

        <form method="post" action="" name="patientform" onSubmit="return validate()" style="padding: 10px">
            <div class="form-group"><label>Patient Name</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="txtpatientname" id="txtpatientname"
                        value="<?php echo $rsedit[patientname]; ?>" />
                </div>
            </div>

			<div class="form-group"><label>Patient NIC</label>
                <div class="form-line">
                    <input class="form-control" type="txtpatientNIC" name="txtpatientNIC" id="txtpatientNIC"/>
                </div>
            </div>

            <?php
			if(isset($_GET[editid]))
			{
				?>
            <div class="form-group"><label>Admission Date</label>
                <div class="form-line">
                    <input class="form-control" type="date" name="admissiondate" id="admissiondate"
                        value="<?php echo $rsedit[admissiondate]; ?>"  />
                </div>
            </div>





            <?php
			}
			?>
			
            <div class="form-group">
                <label>Address</label>
                <div class="form-line">
                    <input class="form-control " name="txtaddress" id="txtaddress" value="<?php echo $rsedit[address]; ?>">
                </div>
            </div>

            <div class="form-group"><label>Contact Number</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="txtcontactnumber" id="txtcontactnumber"
                        value="<?php echo $rsedit[mobileno]; ?>" />
                </div>
            </div>

            <div class="form-group"><label>Blood Group</label>
                <div class="form-line"><select class="form-control show-tick" name="selectbloodgroup" id="selectbloodgroup">
                        <option value="">Select</option>
                        <?php
					$arr = array("A+","A-","B+","B-","O+","O-","AB+","AB-");
					foreach($arr as $value)
					{
						if($value == $rsedit[bloodgroup])
						{
							echo "<option value='$value' selected>$value</option>";
						}
						else
						{
							echo "<option value='$value'>$value</option>";			  
						}
					}
					?>
                    </select>
                </div>
            </div>

            <div class="form-group"><label>Gender</label>
                <div class="form-line"><select class="form-control show-tick" name="selectGender" id="selectGender">
                        <option value="">Select</option>
                        <?php
				$arr = array("MALE","FEMALE");
				foreach($arr as $value)
				{
					if($value == $rsedit[gender])
					{
						echo "<option value='$value' selected>$value</option>";
					}
					else
					{
						echo "<option value='$value'>$value</option>";			  
					}
				}
				?>
                    </select>
                </div>
            </div>

            <div class="form-group"><label>Date Of Birth</label>
                <div class="form-line">
                    <input class="form-control" type="date" name="dateofbirth" max="<?php echo date("Y-m-d"); ?>"
                        id="dateofbirth" value="<?php echo $rsedit[dob]; ?>" />
                </div>
            </div>

			<div class="form-group"><label>Email Address</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="txtemail" id="txtemail" 
				    value="<?php echo $rsdept[email]; ?>"/>
                </div>
            </div>


           

            <input class="btn btn-default" type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />

        </form>
        <p>&nbsp;</p>
    </div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
include("adformfooter.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validate() {
    if (document.patientform.txtpatientname.value == "") {
        alert("Patient name should not be empty..");
        document.patientform.txtpatientname.focus();
        return false;
    } else if (!document.patientform.txtpatientname.value.match(alphaspaceExp)) {
        alert("Patient name not valid..");
        document.patientform.txtpatientname.focus();
        return false;
    } else if (document.patientform.admissiondate.value == "") {
        alert("Admission date should not be empty..");
        document.patientform.admissiondate.focus();
        return false;
    } else if (document.patientform.txtaddress.value == "") {
        alert("Address should not be empty..");
        document.patientform.address.focus();
        return false;
    } else if (document.patientform.txtcontactnumber.value == "") {
        alert("Mobile number should not be empty..");
        document.patientform.txtcontactnumber.focus();
        return false;
    } else if (!document.patientform.txtcontactnumber.value.match(numericExpression)) {
        alert("Mobile number not valid..");
        document.patientform.txtcontactnumber.focus();
        return false;
    } else if (document.patientform.selectbloodgroup.value == "") {
        alert("Blood Group should not be empty..");
        document.patientform.selectbloodgroup.focus();
        return false;
    } else if (document.patientform.selectGender.value == "") {
        alert("Gender should not be empty..");
        document.patientform.selectGender.focus();
        return false;
    } else if (document.patientform.dateofbirth.value == "") {
        alert("Date Of Birth should not be empty..");
        document.patientform.dateofbirth.focus();
        return false;
    } else {
        return true;
    }
}
</script>