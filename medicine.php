<?php
include("adheader.php");
include("dbconnection.php");
if(isset($_POST[btnsubmit]))
{
	if(isset($_GET[editid]))
	{
		$sql ="UPDATE medicine SET medicinename='$_POST[generic]',medicinecost='$_POST[cost]',
        description='$_POST[description]',brand='$_POST[brand]',status='$_POST[status]' WHERE medicineid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('medicine record updated successfully.');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO medicine(medicinename,medicinecost,description,brand,status) 
		values('$_POST[generic]','$_POST[cost]','$_POST[description]','$_POST[brand]','$_POST[status]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('new Medicine record added successfully.');</script>";
			
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM medicine WHERE medicineid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);



    
    $sqldept = "SELECT email FROM patient WHERE patientid='$_GET[editid]'";
    $qsqldept = mysqli_query($con,$sqldept);
    $rsdept = mysqli_fetch_array($qsqldept);

	
}
?>

<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center">Add Medicine</h2>

    </div>
    <div class="card">

        <form method="post" action="" name="medicineform" style="padding: 10px">
            <div class="form-group"><label>Generic</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="generic" id="generic"
                        value="<?php echo $rsedit[medicinename]; ?>" />
                </div>
            </div>

			<div class="form-group"><label>Brand</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="brand" id="brand" value="<?php echo $rsedit[brand]; ?>"/>
                </div>
            </div>



			<div class="form-group"><label>Cost</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="cost" id="cost" value="<?php echo $rsedit[medicinecost]; ?>"/>
                </div>
            </div>

    
			
            <div class="form-group">
                <label>Description</label>
                <div class="form-line">
                    <input class="form-control " name="description" id="description" value="<?php echo $rsedit[description]; ?>">
                </div>
            </div>

      

       

            <div class="form-group"><label>Status</label>
                <div class="form-line"><select class="form-control show-tick" name="status" id="status">
                        <option value="">Select</option>
                        <?php
										$arr = array("Active", "Inactive");
										foreach ($arr as $val) {
											if ($val == $rsedit[status]) {
												echo "<option value='$val' selected>$val</option>";
											} else {
												echo "<option value='$val'>$val</option>";
											}
										}
										?>
                    </select>
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
    if (document.patientform.generic.value == "") {
        alert("Patient name should not be empty..");
        document.patientform.generic.focus();
        return false;
    } else if (!document.patientform.generic.value.match(alphaspaceExp)) {
        alert("Patient name not valid..");
        document.patientform.generic.focus();
        return false;
    } else if (document.patientform.cost.value == "") {
        alert("Admission date should not be empty..");
        document.patientform.cost.focus();
        return false;
    } else if (document.patientform.description.value == "") {
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
    } else if (document.patientform.status.value == "") {
        alert("Gender should not be empty..");
        document.patientform.status.focus();
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