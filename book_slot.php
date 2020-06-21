<?php
require 'conn.php';
session_start();
$from = $_POST['from'];
$to = $_POST['to'];
$rid = $_SESSION['r_id'];
$sql = "select * from lim where '$from'<date && date<'$to'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	echo "<script>alert('Cannot book this date.')</script>";
	echo "<script>location.href='rentee_home.php'</script>";
}
else
{
	$sql1="insert into maintenance values('$rid','$from','$to')";
	mysqli_query($conn,$sql1);
	$sql2="update equipment set status='N' where id='$rid'";
	mysqli_query($conn,$sql2);
	echo "<script>alert('Booked for maintenance.')</script>";
	echo "<script>location.href='rentee_home.php'</script>";
}	


?>