<?php
include 'conn.php';
session_start();

$eqname = $_POST['e_name'];
$quantity = $_POST['quantity'];
$pricing = $_POST['price'];
$game = $_SESSION['sport_name'];

$sql = "update equipment set name='$eqname',quantity='$quantity',price= '$pricing' 
       where price=0 && game='$game'";
mysqli_query($conn,$sql);
header("Location:r_info.php");
?>