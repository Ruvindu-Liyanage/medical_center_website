<?php

include("adheader.php");
include 'dbconnection.php';

if (!isset($_SESSION[pharmacist_id])) {
  echo "<script>window.location='pharmacistlogin.php';</script>";
}

?>
<div class="container-fluid">
  <div class="block-header">
    <h2>Welcome <?php $sql = "SELECT * FROM `pharmacist` WHERE pharmacist_id='$_SESSION[pharmacist_id]' ";
                $pharmicisttable = mysqli_query($con, $sql);
                $doc = mysqli_fetch_array($pharmicisttable);

                echo 'Pharmacist ' . $doc[pharmacist_name]; ?>

    </h2>
  </div>
</div>



<div class="card">
  <section class="container">
    <div class="row clearfix" style="margin-top: 10px">



      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="info-box-4 hover-zoom-effect">
          <div class="icon"> <i class="zmdi col-blue"><img src="https://img.icons8.com/color/30/null/new-by-copy.png"/></i> </div>
          <div class="content">
            <div class="text">New Prescriptions</div>

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
          <div class="icon"> <i class="zmdi col-blue"><img src="https://img.icons8.com/external-flat-berkahicon/30/null/external-Prescription-healthcare-flat-berkahicon.png"/></i> </div>
          <div class="content">
            <div class="text">Total Prescriptions</div>

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


      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="info-box-4 hover-zoom-effect">
          <div class="icon"> <i class="zmdi col-blue"><img src="https://img.icons8.com/color/30/null/task-completed.png"/></i> </div>
          <div class="content">
            <div class="text">Completed Prescriptions</div>

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
          <div class="icon"> <i class="zmdi col-blush"><img src="https://img.icons8.com/color/30/null/today.png"/></i> </div>
          <div class="content">
            <div class="text">Today's Prescriptions</div>
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
          <div class="icon"> <i class="zmdi col-blush"><img src="https://img.icons8.com/color/30/null/pills.png"/></i> </div>
          <div class="content">
            <div class="text">Unavailable Medicine</div>
            <div class="number">
            <a href="./viewmedicine.php">
            <?php
                $sql = "SELECT * FROM medicine WHERE status='Inactive' ";
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