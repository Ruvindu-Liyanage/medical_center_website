<?php
include("adheader.php");
include("dbconnection.php");

    session_start();
    if(!isset($_SESSION[adminid])){
        echo "<script>window.location='adminlogin.php';</script>";
    }
    // if(!isset($_SESSION[adminid])){
    //     echo "<script>window.location='adminlogin.php';</script>";

    // }




    
                if(isset($_SESSION[adminid]))
                {

                    $sql="SELECT * FROM admin WHERE adminid='$_SESSION[adminid]' ";
                    $qsql = mysqli_query($con,$sql);
                    $rsedit = mysqli_fetch_array($qsql);
                }
?>






<div class="container-fluid">
    <div class="block-header">
        <h2>Dashboard</h2>
        <small class="text-muted">Welcome to Admin Panel</small>
        
    
<h4>HI <?php echo $rsedit[adminname]; ?></h4>
    
    </div>
    <!-- <button onclick="window.print()">Print this page</button> -->
    <div class="row clearfix">

    
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
            <div class="icon"> <i class="zmdi col-cyan"><img src="https://i.postimg.cc/9fHtkfwd/pation-ti-ti-tuk.png"/></i> </div>
                <div class="content">
                    <div class="text">Total Patient</div>
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
                    <div class="text">Total Doctors</div>
                    <div class="number">
                      <a href="./viewdoctor.php">

                      <?php
                        $sql = "SELECT * FROM doctor WHERE status='Active'";
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
            <div class="icon"> <i class="zmdi  col-cyan"><img src="https://img.icons8.com/office/30/null/administrator-male--v1.png"/></i> </div>
                <div class="content">
                    <div class="text">Total Administrator</div>
                    <div class="number">
                      <a href="./viewadmin.php">

                      <?php
                        $sql = "SELECT * FROM admin WHERE status='Active'";
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
            <div class="icon"> <i class="zmdi  col-cyan"><img src="https://img.icons8.com/external-smashingstocks-flat-smashing-stocks/30/null/external-Lab-Assistant-medical-concepts-smashingstocks-flat-smashing-stocks.png"/></i> </div>
                <div class="content">
                    <div class="text">Total Lab Assistant</div>
                    <div class="number">
                      <a href="./viewlabAssistant.php">

                      <?php
                        $sql = "SELECT * FROM labAssistant WHERE status='Active'";
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
            <div class="icon"> <i class="zmdi  col-cyan"><img src="https://img.icons8.com/external-sbts2018-lineal-color-sbts2018/30/null/external-pharmacist-women-profession-sbts2018-lineal-color-sbts2018.png"/></i> </div>
                <div class="content">
                    <div class="text">Total Pharmacist</div>
                    <div class="number">
                      <a href="./viewPharmacist.php">

                      <?php
                        $sql = "SELECT * FROM pharmacist WHERE status='Active'";
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
            <div class="icon"> <i class="zmdi  col-cyan"><img src="https://img.icons8.com/external-flaticons-flat-flat-icons/30/null/external-reception-hospitality-services-flaticons-flat-flat-icons-4.png"/></i> </div>
                <div class="content">
                    <div class="text">Total Receptionist</div>
                    <div class="number">
                      <a href="./viewReceptionist.php">

                      <?php
                        $sql = "SELECT * FROM receptionist WHERE status='Active'";
                        $qsql = mysqli_query($con,$sql);
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