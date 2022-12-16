<?php
include("adheader.php");
include("dbconnection.php");


$doctorid = $_SESSION[doctorid];



if (isset($_POST[btnsubmit])) {
    if (isset($_GET[editid])) {
        $sql = "UPDATE prescription SET patientname='$_POST[patientname]',generic='$_POST[generic]',
        brand='$_POST[brand]',dosage='$_POST[dosage]',dosageFrequency='$_POST[dosageFrequency]',
        routeOfAdministration='$_POST[routeOfAdministration]',consumptionMethod='$_POST[consumptionMethod]',prescriptiondate='$_POST[prescriptiondate]',status='$_POST[status]',doctorname='$_POST[doctorname]'  WHERE prescriptionid='$_GET[editid]'";
        if ($qsql = mysqli_query($con, $sql)) {
            echo "<script>alert('prescription record updated successfully.');</script>";
        } else {
            echo mysqli_error($con);
        }
    } else {
        $sql = "INSERT INTO prescription(patientname,generic,brand,dosage,dosageFrequency,routeOfAdministration,consumptionMethod,prescriptiondate,status,doctorid,doctorname) 
		values('$_POST[patientname]','$_POST[generic]','$_POST[brand]','$_POST[dosage]','$_POST[dosageFrequency]',
		'$_POST[routeOfAdministration]','$_POST[consumptionMethod]','$_POST[prescriptiondate]','$_POST[status]','$doctorid','$_POST[doctorname]')";
        if ($qsql = mysqli_query($con, $sql)) {
            echo "<script>alert('Prescription record added successfully.');</script>";
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
        } else {
            echo mysqli_error($con);
        }
    }
}
if (isset($_GET[editid])) {
    $sql = "SELECT * FROM prescription WHERE prescriptionid='$_GET[editid]' ";
    $qsql = mysqli_query($con, $sql);
    $rsedit = mysqli_fetch_array($qsql);




    $sqldept = "SELECT email FROM prescription WHERE prescriptionid='$_GET[editid]'";
    $qsqldept = mysqli_query($con, $sqldept);
    $rsdept = mysqli_fetch_array($qsqldept);
}
?>

<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center">Prescription Add Panel</h2>

    </div>
    <div class="card">

        <form method="post" action="" name="patientform" style="padding: 10px">







            <div class="form-group"><label>Doctor Name</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="doctorname" id="doctorname" value="	<?php
                                                                                                            $sqldoctor = "SELECT * FROM doctor INNER JOIN department ON department.departmentid=doctor.departmentid WHERE doctor.status='Active' AND doctor.doctorid='$_SESSION[doctorid]'";
                                                                                                            $qsqldoctor = mysqli_query($con, $sqldoctor);
                                                                                                            while ($rsdoctor = mysqli_fetch_array($qsqldoctor)) {
                                                                                                                echo "$rsdoctor[doctorname] ( $rsdoctor[departmentname] )";
                                                                                                            }
                                                                                                            ?>" />
                </div>
            </div>

            <div class="form-group"><label>Patient Name</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="patientname" id="patientname" value="<?php echo $rsedit[patientname]; ?>" />
                </div>
            </div>


            <div class="form-group"><label>Generic</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="generic" id="generic" value="<?php echo $rsedit[generic]; ?>" />
                </div>
            </div>

            <div class="form-group">
                <label>Brand</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="brand" id="brand" value="<?php echo $rsedit[brand]; ?>" />
                </div>
            </div>

            <div class="form-group">
                <label>Dosage</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="dosage" id="dosage" value="<?php echo $rsedit[dosage]; ?>" />
                </div>
            </div>


            <div class="form-group">
                <label>Dosage Frequnecy</label>
                <div class="form-line">
                    <input class="form-control " type="text" name="dosageFrequency" id="dosageFrequency" value="<?php echo $rsedit[dosageFrequency]; ?>">
                </div>
            </div>


            <div class="form-group"><label>Route of Administration</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="routeOfAdministration" id="routeOfAdministration" value="<?php echo $rsedit[routeOfAdministration]; ?>" />
                </div>
            </div>



            <div class="form-group"><label>Consumption Method</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="consumptionMethod" id="consumptionMethod" value="<?php echo $rsedit[consumptionMethod]; ?>" />
                </div>
            </div>


            <div class="form-group"><label>Prescription Date</label>
                <div class="form-line">
                    <input class="form-control" type="date" name="prescriptiondate" id="prescriptiondate" value="<?php echo $rsedit[prescriptiondate]; ?>" />
                </div>
            </div>



            <div class="form-group"><label>Status</label>
                <div class="form-line"><select class="form-control show-tick" name="status" id="status">
                        <option value="">Select</option>
                        <?php
                        $arr = array("Active", "Inactive");
                        foreach ($arr as $value) {
                            if ($value == $rsedit[status]) {
                                echo "<option value='$value' selected>$value</option>";
                            } else {
                                echo "<option value='$value'>$value</option>";
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