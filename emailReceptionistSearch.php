<?php
// include("adheader.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM receptionist WHERE receptionist_id='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Receptionist record deleted successfully..');</script>";
	}
}
?>
<div class="container-fluid">
	<div class="block-header">
		<h2 class="text-center">View Available Receptinist</h2>

	</div>

<div class="card">

	<section class="container">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			<thead>
				<tr>
					<td>Name</td>
					<td>Email</td>
					<td>Phone</td>
					<!-- <td>LoginID</td> -->
					<td>Address</td>
					<td>Status</td>
					<!-- <td>Action</td> -->
				</tr>
			</thead>
			<tbody>
				
				<?php
				$sql ="SELECT * FROM receptionist";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{

					$sqldept = "SELECT * FROM receptionist WHERE receptionist_id='$rs[receptionist_id]'";
					$qsqldept = mysqli_query($con,$sqldept);
					$rsdept = mysqli_fetch_array($qsqldept);
					echo "<tr>
					<td>&nbsp;$rs[name]</td>
					<td>&nbsp;$rs[email]</td>
					<td>&nbsp;$rs[phone]</td>
					<td>&nbsp;$rs[address]</td>
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