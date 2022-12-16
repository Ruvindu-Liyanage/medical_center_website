<?php
// Create connection
$con=mysqli_connect("localhost","medspher_user","Saymyname@123","medspher_ohmsphp");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>