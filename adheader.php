<?php
session_start();
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>HMS - Admin</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/images/logo none background2.png" type=image/png>

    <!-- Custom Css -->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
    <!-- Bootstrap Material Datetime Picker Css -->

    <style>
        .navbarnew {
            background-color: #01c0c8 !important;
        }

        .newtheme {
            background-color: #CCCCCC !important;
        }

        .sidebar .menu {
            height: 100%;
        }

        .login-img {
            height: 30px;
        }

        .login-name {
            margin: 10 0 0 10px;
            font-size: 15px !important;
        }

        .navbar-brand {
            display: flex !important;
            margin-left: 10px;
        }

        .navbar-header {
            line-height: 0.8em !important;
        }

        .bars:after {
            margin-top: 10px;
        }

        .bars:after {
            margin-top: 10px;
        }
    </style>

</head>

<body class="theme-cyan newtheme">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-cyan">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Morphing Search  -->

    <!-- Top Bar -->

    <!-- #Top Bar -->

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">

            <?php
            if (isset($_SESSION[adminid])) {

                $sql = "SELECT * FROM admin WHERE adminid='$_SESSION[adminid]' ";
                $qsql = mysqli_query($con, $sql);
                $rsedit = mysqli_fetch_array($qsql);
            ?>




                <nav class="navbar clearHeader navbarnew">
                    <div class="col-12">
                        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="#"><img src="images/pngegg.png" href="adminprofile.php" alt="" class="login-img">
                                <p class="login-name"><?php echo $rsedit[adminname]; ?></p>
                            </a> </div>
                        <ul class="nav navbar-nav navbar-right">


                            <!-- Notifications -->
                            <li>
                                <a data-placement="bottom" title="Log out!" href="logout.php"><i class="zmdi zmdi-sign-in"></i></a>
                            </li>

                        </ul>
                    </div>
                </nav>





                <!--Admin Menu -->
                <div class="menu">
                    <ul class="list" style="overflow: hidden; width: auto; height: calc(-184px + 100vh);">
                        <li class="header">MAIN NAVIGATION</li>


                        <li class="active open"><a href="adminaccount.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                        </li>



                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/external-nawicon-mixed-nawicon/20/EBEBEB/external-doctor-medical-nawicon-mixed-nawicon.png"/></i><span>Doctors</span> </a>
                            <ul class="ml-menu">
                                <!-- <li><a href="doctorprofile.php">Doctor Profile</a></li> -->
                                <!-- <li><a href="doctorchangepassword.php">Change Password</a></li> -->
                                <li><a href="doctor.php">Add Doctor</a></li>
                                <li><a href="viewdoctor.php">View Doctor</a></li>
                            </ul>
                        </li>






                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi "><img src="https://img.icons8.com/ios-filled/20/EBEBEB/laboratory.png"/></i><span>Labratory</span> </a>
                            <ul class="ml-menu">
                                <!-- <li><a href="adminprofile.php">Labratory Profile</a></li> -->
                                <!-- <li><a href="adminchangepassword.php">Change Password</a></li> -->
                                <li><a href="labAssistant.php">Add Labratory</a></li>
                                <li><a href="viewLabAssistant.php">View Labratory</a></li>
                            </ul>
                        </li>



                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/ios-filled/20/EBEBEB/hand-with-a-pill.png"/></i><span>Pharmacist</span> </a>
                            <ul class="ml-menu">
                                <!-- <li><a href="adminprofile.php">Pharmacist Profile</a></li> -->
                                <!-- <li><a href="adminchangepassword.php">Change Password</a></li> -->
                                <li><a href="pharmacist.php">Add Pharmacist</a></li>
                                <li><a href="viewPharmacist.php">View Pharmacist</a></li>
                            </ul>
                        </li>




                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/20/EBEBEB/external-man-male-profession-vitaliy-gorbachev-fill-vitaly-gorbachev-6.png"/></i><span>Receptionist</span> </a>
                            <ul class="ml-menu">
                                <!-- <li><a href="adminprofile.php">Receptionist Profile</a></li> -->
                                <!-- <li><a href="adminchangepassword.php">Change Password</a></li> -->
                                <li><a href="receptionist.php">Add Receptionist</a></li>
                                <li><a href="viewReceptionist.php">View Receptionist</a></li>
                            </ul>
                        </li>



                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/ios-filled/20/EBEBEB/triangular-bandage.png"/></i><span>Patient</span> </a>
                            <ul class="ml-menu">
                                <li><a href="patient.php">Add Patient</a></li>
                                <li><a href="viewpatient.php">View Patient</a></li>
                            </ul>
                        </li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/user-male-circle--v1.png"/></i><span>Profile</span> </a>
                            <ul class="ml-menu">
                                <li><a href="adminprofile.php">Admin Profile</a></li>
                                <li><a href="admin.php">Add Admin</a></li>
                                <li><a href="viewadmin.php">View Admin</a></li>
                            </ul>
                        </li>



                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/ios-filled/20/EBEBEB/technical-support.png"/></i><span>Service</span> </a>
                            <ul class="ml-menu">







                                <li>
                                    <a href="javascript:void(0);" class="menu-toggle">Email</span> </a>

                                    <ul class="ml-menu">

                                        <li><a href="emailPatient.php">To Patient</a>
                                        <li><a href="emailAdmin.php">To Admin</a>
                                        <li><a href="emailDoctor.php">To Doctor</a>
                                        <li><a href="emailReceptionist.php">To Receptionist</a>
                                        <li><a href="emailPharmacist.php">To Pharmacist</a>
                                        <li><a href="emailLabAssistant.php">To Labratory</a>


                                    </ul>

                                </li>


                            </ul>
                        </li>







                        </li>

                    </ul>
                </div>
                <!-- Admin Menu -->



            <?php } ?>









            <!-- doctor Menu -->
            <?php
            if (isset($_SESSION[doctorid])) {

                $sql = "SELECT * FROM doctor WHERE doctorid='$_SESSION[doctorid]' ";
                $qsql = mysqli_query($con, $sql);
                $rsedit = mysqli_fetch_array($qsql);

            ?>



                <nav class="navbar clearHeader navbarnew">
                    <div class="col-12">
                    <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="#"><img src="images/pngegg.png" href="doctorprofile.php" alt="" class="login-img">
                                <p class="login-name"><?php echo $rsedit[doctorname]; ?></p>
                            </a> </div>
                        <ul class="nav navbar-nav navbar-right">


                            <!-- Notifications -->
                            <li>
                                <a data-placement="bottom" title="Log out!" href="logout.php"><i class="zmdi zmdi-sign-in"></i></a>
                            </li>

                        </ul>
                    </div>
                </nav>




                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active open"><a href="doctoraccount.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/check-document.png"/></i><span>Appointment</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewappointmentpending.php" style="width:250px;">View Pending Appointments</a>
                                </li>
                                <li><a href="viewappointmentapproved.php" style="width:250px;">View Approved
                                        Appointments</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/treatment-plan--v1.png"/></i><span>Prescription</span> </a>
                            <ul class="ml-menu">

                                <li><a href="prescriptionform.php">Add Prescription</a>
                                </li>
                                <li><a href="viewprescription.php">View prescripion</a></li>

                            </ul>
                        </li>

                        <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/graph-report.png"/></i><span>Lab Reports</span> </a>
                            <ul class="ml-menu">
                                <li><a href="labReport.php">Add Lab Reports</a>
                                <li><a href="viewLabReport.php">View Lab Reports</a> </li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/ios-filled/20/EBEBEB/triangular-bandage.png"/></i><span>Patients</span> </a>
                            <ul class="ml-menu">
                            <li><a href="patient.php">Add Patient</a></li>
                                <li><a href="viewpatient.php">View Patient</a>
                                <!-- <li><a href="BMICalculator.php">Check BMI</a> -->
                                </li>
                            </ul>
                        </li>

                        <li> <a href="BMICalculator.php"><i class="zmdi"><img src="https://img.icons8.com/android/20/EBEBEB/combo-chart.png"/></i><span>Check BMI</span> </a></li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/meeting-time.png"/></i><span>Doctor Visiting Hours </span> </a>
                            <ul class="ml-menu">

                                <li><a href="doctortimings.php">Add Visiting Hour</a></li>
                                <li><a href="viewdoctortimings.php">View Visiting Hour</a></li>
                            </ul>
                        </li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/user-male-circle--v1.png"/></i><span>Profile</span> </a>
                            <ul class="ml-menu">
                                <li><a href="doctorprofile.php">Profile</a></li>
                                <li><a href="doctorchangepassword.php">Change Password</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>

            <?php }; ?>
            <!-- doctor Menu -->



            <!-- patient Menu -->
            <?php
            if (isset($_SESSION[patientid])) {


                $sql = "SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
                $qsql = mysqli_query($con, $sql);
                $rsedit = mysqli_fetch_array($qsql);

            ?>


                <nav class="navbar clearHeader navbarnew">
                    <div class="col-12">
                        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="#"><img src="images/pngegg.png" alt="" class="login-img">
                                <p class="login-name"><?php echo $rsedit[patientname]; ?></p>
                            </a> </div>
                        <ul class="nav navbar-nav navbar-right">


                            <!-- Notifications -->
                            <li>
                                <a data-placement="bottom" title="Log out!" href="logout.php"><i class="zmdi zmdi-sign-in"></i></a>
                            </li>

                        </ul>
                    </div>
                </nav>








                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active open"><a href="patientaccount.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Profile</span> </a>
                            <ul class="ml-menu">
                               
                                <li><a href="patientchangepassword.php">Change Password</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Appointment</span> </a>
                            <ul class="ml-menu">
                                <li><a href="patientappointment.php">Add Appointment</a></li>
                                <li><a href="viewappointment.php">View Appointments</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>Prescription</span> </a>
                            <ul class="ml-menu">
                                <li><a href="patviewprescription.php">View Prescription Records</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Treatment</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewtreatmentrecord.php">View Treatment Records</a></li>
                        </li>
                    </ul>
                    </li>


                    </ul>
                </div>

            <?php }; ?>
            <!-- patient Menu -->




            <!-- Receptionist Menu -->


            <?php
            if (isset($_SESSION[receptionist_id])) {

                $sql = "SELECT * FROM receptionist WHERE receptionist_id='$_SESSION[receptionist_id]' ";
                $qsql = mysqli_query($con, $sql);
                $rsedit = mysqli_fetch_array($qsql);
            ?>




                <nav class="navbar clearHeader navbarnew">
                    <div class="col-12">
                        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="#"><img src="images/pngegg.png" alt="" class="login-img">
                                <p class="login-name"><?php echo $rsedit[name]; ?></p>
                            </a> </div>
                        <ul class="nav navbar-nav navbar-right">


                            <!-- Notifications -->
                            <li>
                                <a data-placement="bottom" title="Log out!" href="logout.php"><i class="zmdi zmdi-sign-in"></i></a>
                            </li>

                        </ul>
                    </div>
                </nav>

                <!--Receptionist Menu -->
                <div class="menu">
                    <ul class="list" style="overflow: hidden; width: auto; height: calc(-184px + 100vh);">
                        <li class="header">MAIN NAVIGATION</li>


                        <li class="active open"><a href="receptionistaccount.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                        </li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/check-document.png"/></i><span>Appointment</span> </a>
                            <ul class="ml-menu">
                                <li><a href="appointment.php">New Appointment</a></li>
                                <li><a href="viewpendingAppointmentReceptionist.php">View Pending Appointments</a>
                                </li>
                                <li><a href="viewappointmentapproved.php">View Approved
                                        Appointments</a></li>
                            </ul>
                        </li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/ios-filled/20/EBEBEB/triangular-bandage.png"/></i><span>Patients</span> </a>
                            <ul class="ml-menu">
                                <li><a href="patient.php">Add Patient</a></li>
                                <li><a href="viewpatient.php">View Patient Records</a></li>
                            </ul>
                        </li>



                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/meeting-time.png"/></i><span>Doctors</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewVisitingHoursReceptionist.php">View Visiting Hours</a></li>
                                
                            </ul>
                        </li>



                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/ios-filled/20/EBEBEB/laboratory.png"/></i><span>Labratory</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewlabReportReceptionist.php">View Lab Reports</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/pill--v1.png"/></i><span>Pharmacy</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewprescriptionReceptionist.php">View Prescription</a></li>
                            </ul>
                        </li>

                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/user-male-circle--v1.png"/></i><span>Profile</span> </a>
                            <ul class="ml-menu">
                              
                                <li><a href="receptionistchangepassword.php">Change Password</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- Receptionist Menu -->

            <?php } ?>








            <!--- pharmacist menu --->




            <?php
            if (isset($_SESSION[pharmacist_id])) {


                $sql = "SELECT * FROM pharmacist WHERE pharmacist_id='$_SESSION[pharmacist_id]' ";
                $qsql = mysqli_query($con, $sql);
                $rsedit = mysqli_fetch_array($qsql);

            ?>


                <nav class="navbar clearHeader navbarnew">
                    <div class="col-12">
                        <div class="navbar-header">
                            <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="#"><img src="images/pngegg.png" alt="" class="login-img">
                                <p class="login-name"><?php echo $rsedit[pharmacist_name]; ?></p>
                            </a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">


                            <!-- Notifications -->
                            <li>
                                <a data-placement="bottom" title="Log out!" href="logout.php"><i class="zmdi zmdi-sign-in"></i></a>
                            </li>

                        </ul>
                    </div>
                </nav>




                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active open"><a href="pharmacistaccount.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/pill--v1.png"/></i><span>Medicine Store</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewmedicine.php">View Medicine Store</a></li>
                                <li><a href="medicine.php">Add Medicine</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/treatment-plan--v1.png"/></i><span>Prescription</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewPrescriptionPharmacist.php">View Prescription Records</a>
                                </li>

                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/user-male-circle--v1.png"/></i><span>Profile</span> </a>
                            <ul class="ml-menu">
                            
                                <li><a href="pharmacistchangepassword.php">Change Password</a></li>
                            </ul>
                        </li>


                    </ul>
                    </li>


                    </ul>
                </div>

            <?php }; ?>




            <?php
            if (isset($_SESSION[labAssistantId])) {

                $sql = "SELECT * FROM labAssistant WHERE labAssistantId='$_SESSION[labAssistantId]' ";
                $qsql = mysqli_query($con, $sql);
                $rsedit = mysqli_fetch_array($qsql);
            ?>




                <nav class="navbar clearHeader navbarnew">
                    <div class="col-12">
                        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="#"><img src="images/pngegg.png" alt="" class="login-img">
                                <p class="login-name"><?php echo $rsedit[name]; ?></p>
                            </a> </div>
                        <ul class="nav navbar-nav navbar-right">


                            <!-- Notifications -->
                            <li>
                                <a data-placement="bottom" title="Log out!" href="logout.php"><i class="zmdi zmdi-sign-in"></i></a>
                            </li>

                        </ul>
                    </div>
                </nav>





                <!--Lab assistant Menu -->
                <div class="menu">
                    <ul class="list" style="overflow: hidden; width: auto; height: calc(-184px + 100vh);">
                        <li class="header">MAIN NAVIGATION</li>


                        <li class="active open"><a href="labAssistantAccount.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                        </li>


                       
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/graph-report.png"/></i><span>Lab Report</span> </a>
                            <ul class="ml-menu">
                                <li><a href="viewLabReportLabAssistant.php">View Lab Repot</a></li>
                            </ul>
                        </li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi"><img src="https://img.icons8.com/material/20/EBEBEB/user-male-circle--v1.png"/></i><span>Profile</span> </a>
                            <ul class="ml-menu">
                                <li><a href="labAssistantchangepassword.php">Change Password</a></li>
                            </ul>
                        </li>

                        </li>

                    </ul>
                </div>
                <!-- Admin Menu -->



            <?php } ?>

















        </aside>
        <!-- #END# Left Sidebar -->

    </section>
    <section class="content home">