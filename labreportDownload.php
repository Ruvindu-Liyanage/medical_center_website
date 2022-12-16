<?php

include("dbconnection.php");






if (isset($_GET[labReportDownload]))
{
    $sql = "SELECT * FROM lab_report WHERE labreportid='$_GET[labReportDownload]' ";
    $qsql = mysqli_query($con, $sql);
    $rsedit = mysqli_fetch_array($qsql);

    $path = "uploadPDF/". $rsedit[pdf];


    

    header("Content-type: application/pdf");
    header("Content-Disposition: attachment; filename=ruvi.pdf");
    header("Pragma: no-cache");
    header("Expires: 0");
    readfile($path);
    exit;


}


?>