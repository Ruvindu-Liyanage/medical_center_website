<?php

include("adheader.php");
include("dbconnection.php");
if(isset($_POST[btnsubmit]))
{
  if(isset($_GET[editid]))
  {
   $sql ="UPDATE appointment SET patientid='$_POST[selectpatient]',appointmentdate='$_POST[appointmentdate]',
   appointmenttime='$_POST[time]',doctorid='$_POST[selectdoc]',status='$_POST[selectstatus]' WHERE appointmentid='$_GET[editid]'";
   if($qsql = mysqli_query($con,$sql))
   {
    echo "<script>alert('appointment record updated successfully...');</script>";
}
else
{
    echo mysqli_error($con);
}	
}
else
{
   $sql ="UPDATE patient SET status='Active' WHERE patientid='$_POST[selectpatient]'";
   $qsql=mysqli_query($con,$sql);

   $sql ="INSERT INTO appointment(patientid,appointmentdate, appointmenttime, doctorid, app_reason,status) 
   values('$_POST[selectpatient]','$_POST[appointmentdate]','$_POST[time]','$_POST[selectdoc]','$_POST[appointmentreason]','$_POST[selectstatus]')";
   if($qsql = mysqli_query($con,$sql))
   {
    echo "<script>alert('Appointment record inserted successfully.');</script>";
    echo "<script>window.location='patientreport.php?patientid=$_POST[selectpatient]';</script>";
   }
else{
    echo mysqli_error($con);
}
}
}

if(isset($_GET[editid])){
    $sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>

<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center">Book Appointment</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <form method="post" action="" name="appointmentForm" onSubmit="return validateform()">
                    <input type="hidden" name="select2" value="Offline">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php
                                        if(isset($_GET[patid]))
                                        {
                                          $sqlpatient= "SELECT * FROM patient WHERE patientid='$_GET[patid]'";
                                          $qsqlpatient = mysqli_query($con,$sqlpatient);
                                          $rspatient=mysqli_fetch_array($qsqlpatient);
                                          echo $rspatient[patientname] . " (Patient ID - $rspatient[patientid])";
                                          echo "<input type='hidden' name='selectpatient' value='$rspatient[patientid]'>";
                                      }
                                      else
                                      {
                                          ?>
                                        <select name="selectpatient" id="selectpatient" class=" form-control show-tick">
                                            <option value="">Select Patient</option>
                                            <?php
                                            $sqlpatient= "SELECT * FROM patient WHERE status='Active'";
                                            $qsqlpatient = mysqli_query($con,$sqlpatient);
                                            while($rspatient=mysqli_fetch_array($qsqlpatient))
                                            {
                                                if($rspatient[patientid] == $rsedit[patientid]){
                                                    echo "<option value='$rspatient[patientid]' selected>$rspatient[patientid] - $rspatient[patientname]</option>";
                                                }                        
                                             else
                                            {
                                                echo "<option value='$rspatient[patientid]'>$rspatient[patientid] - $rspatient[patientname]</option>";
                                            }

                                         }
                                         ?>
                                        </select>
                                        <?php
                                 }
                                 ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                
                            </div>

                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" type="date" name="appointmentdate"
                                            id="appointmentdate" value="<?php echo $rsedit[appointmentdate]; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" type="time" name="time" id="time"
                                            value="<?php echo $rsedit[appointmenttime]; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="selectdoc" id="selectdoc" class=" form-control show-tick">
                                            <option value="">Select Doctor</option>
                                            <?php
                                $sqldoctor= "SELECT * FROM doctor WHERE doctor.status='Active'";
                                $qsqldoctor = mysqli_query($con,$sqldoctor);
                                while($rsdoctor = mysqli_fetch_array($qsqldoctor))
                                {
                                   if($rsdoctor[doctorid] == $rsedit[doctorid])
                                   {
                                    echo "<option value='$rsdoctor[doctorid]' selected>$rsdoctor[doctorname]</option>";
                                }
                                else
                                {
                                    echo "<option value='$rsdoctor[doctorid]'>$rsdoctor[doctorname]</option>";				
                                }
                            }
                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" class="form-control no-resize" name="appointmentreason"
                                            id="appointmentreason">Appointment Reason </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 ">
                                <div class="form-group drop-custum">
                                    <select name="selectstatus" id="selectstatus" class=" form-control show-tick">
                                        <option value="">Select Status</option>
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


                            <div class="col-sm-12">

                                <input type="submit" class="btn btn-raised g-bg-cyan" name="btnsubmit" id="btnsubmit"
                                    value="Submit" />

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'adfooter.php'; ?>
<script type="application/javascript">
function validateform() {
    if (document.appointmentForm.selectpatient.value == "") {
        alert("Patient name should not be empty.");
        document.appointmentForm.selectpatient.focus();
        return false;
    } else if (document.appointmentForm.appointmentdate.value == "") {
        alert("Appointment date should not be empty..");
        document.appointmentForm.appointmentdate.focus();
        return false;
    } else if (document.appointmentForm.time.value == "") {
        alert("Appointment time should not be empty..");
        document.appointmentForm.time.focus();
        return false;
    } else if (document.appointmentForm.selectdoc.value == "") {
        alert("Doctor name should not be empty..");
        document.appointmentForm.selectdoc.focus();
        return false;
    } else if (document.appointmentForm.selectstatus.value == "") {
        alert("Kindly select the status..");
        document.appointmentForm.selectstatus.focus();
        return false;
    } else {
        return true;
    }
}
</script>