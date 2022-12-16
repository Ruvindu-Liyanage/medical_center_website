<?php
// include("adheader.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM patient WHERE patientid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('patient record deleted successfully..');</script>";
	}
}
?>
<div class="container-fluid">
	<div class="block-header">
		<h2 class="text-center">View Available Patients</h2>

	</div>

<div class="card">

	<section class="container">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			<thead>
				<tr>
					<td>Name</td>
           <td>Email</td>
					<td>Phone</td>
          <td>NIC</td>
					<td>Addmission Date</td>
					<td>Address</td>
          <td>Gender</td>
					<td>Status</td>
				</tr>
			</thead>
			<tbody>
				
				<?php
				$sql ="SELECT * FROM patient";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{

					$sqldept = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
					$qsqldept = mysqli_query($con,$sqldept);
					$rsdept = mysqli_fetch_array($qsqldept);
					echo "<tr>
					<td>&nbsp;$rs[patientname]</td>
          <td>&nbsp;$rs[email]</td>
					<td>&nbsp;$rs[mobileno]</td>
					<td>&nbsp;$rs[NIC]</td>
          <td>&nbsp;$rs[admissiondate]</td>
          <td>&nbsp;$rs[address]</td>
					<td>&nbsp;$rs[gender]</td>
					<td>$rs[status]</td>
					</tr>";
				}
				?>      </tbody>
			</table>
		</section>
	</div>
</div>
	<?php
	include("adformfooter.php");
	?>