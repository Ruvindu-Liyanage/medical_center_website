<?php
include("adheader.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM patient WHERE patientid = '$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('patient record deleted successfully.');</script>";
	}
}



else if(isset($_GET[patientActiveId]))
{

  $sql ="UPDATE patient SET status='Active' WHERE patientid = '$_GET[patientActiveId]'";
if($qsql = mysqli_query($con,$sql))
{
echo "<script>alert('patient Activated successfully.');</script>";
}
else
{
echo mysqli_error($con);
}
}


else if(isset($_GET[patienDeactiveId]))
{

  $sql ="UPDATE patient SET status='Deactivate' WHERE patientid = '$_GET[patienDeactiveId]'";
if($qsql = mysqli_query($con,$sql))
{
echo "<script>alert('patient Deacivaated successfully.');</script>";
}
else
{
echo mysqli_error($con);
}



}



?>
<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center">Patient Records</h2>
  </div>
<div class="card">
  <section class="container">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <thead>
        <tr>
          <th width="20%" height="36"><div align="center">Patient ID,Name</div></th>
          <th width="15%"><div align="center">Patient NIC</div></th>
          <th width="10%"><div align="center">Admission Date</div></th>
          <th width="8%"><div align="center">Address</div></th> 
          <th width="20%"><div align="center">Contact Details</div></th>   
          <th width="22%"><div align="center">Patient General Details</div></th>
          <th width="17%"><div align="center">Status</div></th>
          <th width="17%"><div align="center">Action</div></th>
        </tr>
      </thead>
      <tbody>

       <?php
       $sql ="SELECT * FROM patient";
       $qsql = mysqli_query($con,$sql);
       while($row = mysqli_fetch_array($qsql))
       {
        echo "<tr>
        <td><strong>Patient ID</strong> - $row[patientid]<br>
        <strong>Patient Name</strong> - &nbsp;$row[patientname]</td>

        <td>$row[NIC]</td>

        <td>$row[admissiondate]</td>

        <td>$row[address]</td>

        <td><strong>Contact Number</strong> - $row[mobileno]<br>
        <strong>Email Address</strong> - &nbsp;$row[email]</td>

        <td><strong>DOB</strong> - $row[dob]<br>
        <strong>Gender</strong> - &nbsp;$row[gender]<br>
        <strong>Blood Group</strong> - &nbsp;$row[bloodgroup]</td>

        <td align='center'> $row[status] <br>
        <a href='viewpatient.php?patientActiveId=$row[patientid]' class='btn btn-sm btn-raised g-bg-cyan'>Active</a> <br>
        <a href='viewpatient.php?patienDeactiveId=$row[patientid]' class='btn btn-sm btn-raised g-bg-blush2'>Deactive</a>  </td>



        <td>&nbsp;
        <a href='patient.php?editid=$row[patientid]' class='btn btn-sm btn-raised g-bg-cyan'>Edit</a> 
      
      
         </td>


        </tr>";


      }
      ?>
    </tbody>
  </table>
</section>

</div>
</div>
<?php
include("adformfooter.php");
?>