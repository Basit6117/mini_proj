<?php
include("config/connect.php");
$userid = $_GET['userid'];
$sql = "DELETE FROM users WHERE id='$userid'";
$data = mysqli_query($conn,$sql);
header("Location: registered.php");
?>