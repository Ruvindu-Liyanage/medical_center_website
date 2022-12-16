<?php
include("adheader.php");
include("dbconnection.php");




if (isset($_GET[delid])) {
  $sql = "DELETE FROM lab_report WHERE labreportid = '$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('Lab report record deleted successfully.');</script>";
  }
}


else if (isset($_GET[labReportActiveId])) {

  $sql = "UPDATE lab_report SET status='Active' WHERE labreportid = '$_GET[labReportActiveId]'";
  if ($qsql = mysqli_query($con, $sql)) {
    echo "<script>alert('Lab report Activated successfully.');</script>";
  } else {
    echo mysqli_error($con);
  }
} 


else if (isset($_GET[labReportDeactiveId])) {

  $sql = "UPDATE lab_report SET status='Deactivate' WHERE labreportid = '$_GET[labReportDeactiveId]'";
  if ($qsql = mysqli_query($con, $sql)) {
    echo "<script>alert('Lab report Deacivaated successfully.');</script>";
  } else {
    echo mysqli_error($con);
  }
}








?>
<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center">Lab Reports Records</h2>
  </div>
  <div class="card">
    <section class="container">
      <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
          <tr>
            <th width="20%" height="36">
              <div align="center">Doctor </div>
            </th>
            <th width="15%">
              <div align="center">Patient</div>
            </th>
            <th width="8%">
              <div align="center">Type</div>
            </th>
            <th width="10%">
              <div align="center">Date</div>
            </th>
            <th width="20%">
              <div align="center">Note</div>
            </th>

            <th width="20%">
              <div align="center">Download</div>
            </th>
      
            <th width="17%">
              <div align="center">Status</div>
            </th>
     

          </tr>
        </thead>
        <tbody>





          <?php
          $sql = "SELECT * FROM lab_report";
          $qsql = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_array($qsql)) {

            echo "<tr>


        <td> $row[doctorname]
        <td>$row[patientname]</td>

        <td> $row[type]</td>

        <td>$row[date]</td>

        <td>$row[note]</td>


        <td align='center'> 
        <a href='labreportDownload.php?labReportDownload=$row[labreportid]' class='btn btn-sm btn-raised g-bg-cyan' >Download</a>    </td>
        
        <td>$row[status]</td>


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