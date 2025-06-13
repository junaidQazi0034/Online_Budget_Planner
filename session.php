<?php
include("config.php");
session_start();
if(!isset($_SESSION["email"])){
header("Location: login.php");
exit();
}

$sess_email = $_SESSION["email"];
$sql = "SELECT * FROM users WHERE email = '$sess_email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $userid=$row["user_id"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $username =$row["firstname"]." ".$row["lastname"];
    $useremail=$row["email"];
    $userstatus=$row["status"];
    $usertype=$row["userType"];
    $userprofile="uploads/profile1.jpg";
  }
} else {
    $userid="XYZ";
    $username ="No User";
    $useremail="mailid@domain.com";
    $userprofile="Uploads/default_profile.png";
}
?>