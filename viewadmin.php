<?php
include("adheader.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM admin WHERE adminid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('admin record deleted successfully..');</script>";
	}


  //delete data from user table
  $sql ="DELETE FROM users WHERE deletID='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('admin record deleted from users successfully..');</script>";
	}
}

else if(isset($_GET[AdminActiveId]))
{

  $sql ="UPDATE admin SET status='Active' WHERE adminid = '$_GET[AdminActiveId]'";
if($qsql = mysqli_query($con,$sql))
{
echo "<script>alert('Admin Activated successfully.');</script>";
}
else
{
echo mysqli_error($con);
}
}


else if(isset($_GET[AdminDeactiveId]))
{

  $sql ="UPDATE admin SET status='Deactivate' WHERE adminid = '$_GET[AdminDeactiveId]'";
if($qsql = mysqli_query($con,$sql))
{
echo "<script>alert('Admin Deacivaated successfully.');</script>";
}
else
{
echo mysqli_error($con);
}



}


?>

<div class="container-fluid">
<div class="block-header">
		<h2 class="text-center"> View Admin </h2>
	</div>
</div>
<div class="card">
  <section class="container">
   <table class="table table-bordered table-striped table-hover js-basic-example dataTable">


    <thead>
      <tr>
        <td width="12%" height="40">Admin Name</td>
        <td width="12%" height="40">Admin Email</td>
        <td width="11%">Login ID</td>
        <td width="12%">Status</td>
        <td width="10%">Action</td>
      </tr>
    </thead>
    <tbody>
     <?php
     $sql ="SELECT * FROM admin";
     $qsql = mysqli_query($con,$sql);
     while($rs = mysqli_fetch_array($qsql))
     {
      echo "<tr>
      <td>$rs[adminname]</td>
      <td>$rs[email]</td>
      <td>$rs[loginid]</td>
      

      <td align='center'> $rs[status] <br>
      <a href='viewadmin.php?AdminActiveId=$rs[adminid]' class='btn btn-sm btn-raised g-bg-cyan'>Active</a> <br>
      <a href='viewadmin.php?AdminDeactiveId=$rs[adminid]' class='btn btn-sm btn-raised g-bg-blush2'>Deactive</a>  </td>

      <td>
      <a href='admin.php?editid=$rs[adminid]' class='btn btn-raised g-bg-cyan'>Edit</a> 
      <a href='viewadmin.php?delid=$rs[adminid]' class='btn btn-raised g-bg-blush2'>Delete</a> </td>
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