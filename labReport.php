<?php
include("adheader.php");


include("dbconnection.php");


$doctorid = $_SESSION[doctorid];





if (isset($_POST[btnsubmit])) {
    if (isset($_GET[editid])) {
        $sql = "UPDATE lab_report SET doctorname='$_POST[doctorname]',patientname='$_POST[patientname]',type='$_POST[type]',
        note='$_POST[note]',date='$_POST[date]',status='$_POST[status]',doctorid='$doctorid', pdf='$_POST[pdf]' WHERE labreportid='$_GET[editid]'";

        if ($qsql = mysqli_query($con, $sql)) {
            echo "<script>alert('lab report record updated successfully.');</script>";
        } else {
            echo mysqli_error($con);
        }
    } else {

        

    //for upload files
       $pdf= $_FILES['pdf']['name'];
       $pdf_type = $_FILES['pdf']['type'];
       $pdf_size = $_FILES['pdf']['size'];
       $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
       $pdf_store ="uploadPDF/".$pdf;

       move_uploaded_file($pdf_tem_loc,  $pdf_store);





        $sql = "INSERT INTO lab_report(doctorname,patientname,type,note,date,status,doctorid,pdf) 
		values('$_POST[doctorname]','$_POST[patientname]','$_POST[type]','$_POST[note]','$_POST[date]',
		'$_POST[status]','$doctorid','$pdf')";
        if ($qsql = mysqli_query($con, $sql)) {
            echo "<script>alert('lab report record added successfully.');</script>";
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
    $sql = "SELECT * FROM lab_report WHERE labreportid='$_GET[editid]' ";
    $qsql = mysqli_query($con, $sql);
    $rsedit = mysqli_fetch_array($qsql);




    $sqldept = "SELECT email FROM lab_report WHERE labreportid='$_GET[editid]'";
    $qsqldept = mysqli_query($con, $sqldept);
    $rsdept = mysqli_fetch_array($qsqldept);
}
?>

<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center">Lab Report Add Panel</h2>

    </div>
    <div class="card">

        <form method="post" action="labReport.php" name="patientform" style="padding: 10px" enctype="multipart/form-data">

       





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


            <div class="form-group"><label>type</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="type" id="type" value="<?php echo $rsedit[type]; ?>" />
                </div>
            </div>

            <div class="form-group">
                <label>note</label>
                <div class="form-line">
                    <input class="form-control" type="textarea" name="note" id="note" value="<?php echo $rsedit[note]; ?>" />
                </div>
            </div>

            <div class="form-group"><label>Prescription Date</label>
                <div class="form-line">
                    <input class="form-control" type="date" name="date" id="date" value="<?php echo $rsedit[date]; ?>" />
                </div>
            </div>

          
            <div class="form-group1"><label>Update PDF Files</label>
                <div class="form-line">
                <input type="file" name="pdf" id="pdf"  required>
              
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