<?php
session_start();

require 'conn.php';
require 'signup_form_rentee.php';

	
$rentee_name = $_POST['rentee_name'];
$rentee_phone = $_POST['rentee_number'];
$rentee_username = $_POST['rentee_username'];
$rentee_password = $pwd;
$rentee_street = $_POST['rentee_street'];
$rentee_landmark = $_POST['rentee_landmark'];
$rentee_locality = $_POST['rentee_locality'];
$rentee_city = $_POST['rentee_city'];



$sql = ("insert into rentee(rname,
number,username,password,
street,landmark,locality,city) values('$rentee_name','$rentee_phone','$rentee_username','$rentee_password','$rentee_street','$rentee_landmark','$rentee_locality','$rentee_city')");
mysqli_query($conn,$sql);



$sql1 = ("select * from rentee where username = '$rentee_username'");


$result = mysqli_query($conn,$sql1);

while($row = mysqli_fetch_assoc($result))
{
	$_SESSION['r_id'] = $row['rid'];
	$id = $row['rid'];
}

$sql5 = "insert into rentee_info(rid) values('$id')";
mysqli_query($conn,$sql5);


header("Location:r_info.php");



?>