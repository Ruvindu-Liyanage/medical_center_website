<?php
include("adheader.php");
include("dbconnection.php");

    session_start();
    if(!isset($_SESSION[receptionist_id])){
        echo "<script>window.location='receptionistlogin.php';</script>";
    }
    // if(!isset($_SESSION[adminid])){
    //    
    // }

?>
<div class="container-fluid">
    <div class="block-header">
        <h2>Dashboard</h2>
        <small class="text-muted">Welcome to Receptionist Panel</small>
    </div>
    <!-- <button onclick="window.print()">Print this page</button> -->
    <div class="row clearfix">


        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
            <div class="icon"> <i class="zmdi col-cyan"><img src="https://i.postimg.cc/9fHtkfwd/pation-ti-ti-tuk.png"/></i> </div>
                <div class="content">
                    <div class="text">Total Patients</div>
                    <div class="number">
                      <a href="./viewpatient.php">

                      <?php
                        $sql = "SELECT * FROM patient WHERE status='Active'";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                      </a>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
            <div class="icon"> <i class="zmdi  col-cyan"><img src="https://i.postimg.cc/ZYvt87m1/docter-30-X30.png"/></i> </div>
                <div class="content">
                    <div class="text">Total Doctors </div>
                    <div class="number">
                        <?php
                        $sql = "SELECT * FROM doctor WHERE status='Active' ";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
                <div class="icon"> <i class="zmdi col-blush"><img src="https://img.icons8.com/external-others-iconmarket/30/null/external-appointments-health-and-medical-others-iconmarket-2.png"/></i> </div>
                <div class="content">
                    <div class="text">Total Appointments</div>
                    <div class="number">
                      <a href="./viewpatient.php">

                      <?php
                        $sql = "SELECT * FROM appointment ";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                      </a>
                    </div>
                </div>
            </div>
        </div>





        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
                <div class="icon"> <i class="zmdi col-blush"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/30/null/external-appointments-modelling-agency-flaticons-lineal-color-flat-icons.png"/></i> </div>
                <div class="content">
                    <div class="text">Pending Appointments</div>
                    <div class="number">
                      <a href="./viewpatient.php">

                      <?php
                        $sql = "SELECT * FROM appointment WHERE status='Active'";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                      </a>
                    </div>
                </div>
            </div>
        </div>





        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
                <div class="icon"> <i class="zmdi col-blush"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/30/null/external-appointments-spa-flaticons-lineal-color-flat-icons-2.png"/></i> </div>
                <div class="content">
                    <div class="text">Approved Appointments</div>
                    <div class="number">
                      <a href="./viewpatient.php">

                      <?php
                        $sql = "SELECT * FROM appointment WHERE status='Inactive'";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                      </a>
                    </div>
                </div>
            </div>
        </div>






        
      <div class="col-lg-3 col-md-3 col-sm-6">
        <div class="info-box-4 hover-zoom-effect">
          <div class="icon"> <i class="zmdi col-blush"><img src="https://img.icons8.com/external-flat-icon-mangsaabguru-/30/null/external-appointment-calendar-flat-flat-icon-mangsaabguru--2.png"/></i> </div>
          <div class="content">
            <div class="text">Today's Appointments</div>
            <div class="number">
            <a href="./viewPrescriptionPharmacist.php">
            <?php
                $sql = "SELECT * FROM appointment WHERE status='Active' AND appointmentdate=' " . date("Y-m-d") . "' ";
                $qsql = mysqli_query($con, $sql);
                echo mysqli_num_rows($qsql);
                ?>
            </a>
            </div>
          </div>
        </div>
      </div>




    </div>
    <div class="clear"></div>
</div>
</div>
<?php
include("adfooter.php");
?>
