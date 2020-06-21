<?php
include 'conn.php';
session_start();
$id = $_SESSION['r_id'];
$sql5 = "insert into rentee_info(rid) values('$id')";
mysqli_query($conn,$sql5);
header("Location:r_info.php");
?>