<?php
include("adheader.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM prescription WHERE prescriptionid = '$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('prescription record deleted successfully.');</script>";
	}
}



else if(isset($_GET[prescriptionActiveId]))
{

  $sql ="UPDATE prescription SET status='Active' WHERE prescriptionid = '$_GET[prescriptionActiveId]'";
if($qsql = mysqli_query($con,$sql))
{
echo "<script>alert('prescription Activated successfully.');</script>";
}
else
{
echo mysqli_error($con);
}
}


else if(isset($_GET[prescriptionDeactiveId]))
{

  $sql ="UPDATE prescription SET status='Deactivate' WHERE prescriptionid = '$_GET[prescriptionDeactiveId]'";
if($qsql = mysqli_query($con,$sql))
{
echo "<script>alert('prescription Deacivaated successfully.');</script>";
}
else
{
echo mysqli_error($con);
}



}



?>
<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center">Prescription Records</h2>
  </div>
<div class="card">
  <section class="container">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <thead>
        <tr>
          <th width="20%" height="36"><div align="center">Doctor & Pateint Name</div></th>
          <th width="15%"><div align="center">Brand & Generic</div></th>
          <th width="8%"><div align="center">Dosage & Frequnecy</div></th> 
          <th width="20%"><div align="center">Consumption Mthod & Route of Administration</div></th>  
          <th width="10%"><div align="center">Prescription Date</div></th> 
          <th width="17%"><div align="center">Status</div></th>
          
        
        </tr>
      </thead>
      <tbody>

       <?php
       $sql ="SELECT * FROM prescription";
       $qsql = mysqli_query($con,$sql);
       while($row = mysqli_fetch_array($qsql))
       {

            echo "<tr>
            <td><strong>Doctor Name</strong> - $row[doctorname]<br>
            <strong>Patient Name</strong> - &nbsp;$row[patientname]</td>
    
            <td><strong>Brand</strong> - $row[brand]<br>
            <strong>Generic</strong> - &nbsp;$row[generic]</td>
    
            <td><strong>Dosage</strong> - $row[dosage]<br>
            <strong>Doage Fequency</strong> - &nbsp;$row[dosageFrequency]</td>
    
            <td><strong>Consumtion Method</strong> - $row[consumptionMethod]<br>
            <strong>Route of Admin</strong> - &nbsp;$row[routeOfAdministration]</td>
    
            <td>$row[prescriptiondate]</td>
            <td align='center'>$row[status]</td>
    
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