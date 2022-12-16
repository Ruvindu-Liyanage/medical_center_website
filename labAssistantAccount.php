<?php

include("adheader.php");
include ("dbconnection.php");


if (!isset($_SESSION[labAssistantId])) {
  echo "<script>window.location='labAssistantLogin.php';</script>";
}

?>
<div class="container-fluid">
  <div class="block-header">
    <h2>Welcome <?php $sql = "SELECT * FROM `labAssistant` WHERE labAssistantId='$_SESSION[labAssistantId]' ";
                $pharmicisttable = mysqli_query($con, $sql);
                $doc = mysqli_fetch_array($pharmicisttable);

                echo 'Lab Assitant ' . $doc[name]; ?>

    </h2>
  </div>
</div>



<div class="card">
  <section class="container">
    <div class="row clearfix" style="margin-top: 10px">





    <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="info-box-4 hover-zoom-effect">
          <div class="icon"> <i class="zmdi col-blue"><img src="https://img.icons8.com/fluency/30/null/download-graph-report.png"/></i> </div>
          <div class="content">
            <div class="text">New Report</div>

            <div class="number">
              <a href="./viewPrescriptionPharmacist.php">

                <?php
                $sql = "SELECT * FROM prescription WHERE status='Active'";
                $qsql = mysqli_query($con, $sql);
                echo mysqli_num_rows($qsql);
                ?>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="info-box-4 hover-zoom-effect">
          <div class="icon"> <i class="zmdi col-blush"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/30/null/external-annual-report-sales-flaticons-lineal-color-flat-icons.png"/></i> </div>
          <div class="content">
            <div class="text">Today's Report</div>
            <div class="number">
            <a href="./viewPrescriptionPharmacist.php">
            <?php
                $sql = "SELECT * FROM prescription WHERE status='Active' AND prescriptiondate=' " . date("Y-m-d") . "' ";
                $qsql = mysqli_query($con, $sql);
                echo mysqli_num_rows($qsql);
                ?>
            </a>
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="info-box-4 hover-zoom-effect">
          <div class="icon"> <i class="zmdi col-blue"><img src="https://img.icons8.com/external-flaticons-flat-flat-icons/30/null/external-report-100-most-used-icons-flaticons-flat-flat-icons-2.png"/></i> </div>
          <div class="content">
            <div class="text">Completed Report</div>

            <div class="number">
              <a href="./viewPrescriptionPharmacist.php">

                <?php
                $sql = "SELECT * FROM prescription WHERE status='Deactivate'";
                $qsql = mysqli_query($con, $sql);
                echo mysqli_num_rows($qsql);
                ?>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="info-box-4 hover-zoom-effect">
          <div class="icon"> <i class="zmdi col-blue"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/30/null/external-reports-productivity-flaticons-lineal-color-flat-icons.png"/></i> </div>
          <div class="content">
            <div class="text">Total Report</div>

            <div class="number">
              <a href="./viewPrescriptionPharmacist.php">

                <?php
                $sql = "SELECT * FROM prescription ";
                $qsql = mysqli_query($con, $sql);
                echo mysqli_num_rows($qsql);
                ?>
              </a>
            </div>
          </div>
        </div>
      </div>







      





    </div>
  </section>
</div>



<?php
include("adfooter.php");
?>