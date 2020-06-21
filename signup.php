<?php
require 'conn.php';

session_start();


	
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['mail'];
$phone = $_POST['number'];
$password = md5($_POST['password']);
$city = $_POST['city'];
$dob = $_POST['dob'];
$sql = ("insert into users(Name,Username,Email,Phone_no,Password,city,dob) values('$name','$username','$email','$phone','$password','$city','$dob')");
mysqli_query($conn,$sql);

$sql1 = ("select *,timestampdiff(YEAR,dob,sysdate()) as age from users where Username  = '$username'");
$_SESSION['name'] = $username;

$result = mysqli_query($conn,$sql1);

while($row = mysqli_fetch_assoc($result))
{
	$_SESSION['id'] = $row['pid'];
	$id = $row['pid'];
	$age = $row['age'];
}

$sql2 = "insert into spam(pid) values('$id')";
mysqli_query($conn,$sql2);

$sql5 = "insert into player_info(pid,age) values('$id','$age')";
mysqli_query($conn,$sql5);

header("Location:home_player.php");



?>