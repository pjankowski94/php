<?php
$con = mysqli_connect("localhost","root","","registration");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to SQL server." . mysqli_connect_error();
  }
?>