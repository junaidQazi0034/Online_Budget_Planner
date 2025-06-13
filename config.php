<?php
$server ="localhost";
$database="expense_db";
$user = "root";
$password = "";
$con = mysqli_connect($server,$user,$password,$database);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>