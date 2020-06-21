<?php
session_start();
include 'conn.php';
$id = $_SESSION['id'];
if(isset($_POST['dob']))
{
	$dob = $_POST['dob'];
	$sql = "select timestampdiff(YEAR,'$dob',sysdate()) as age from users where pid  = '$id'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{
		$age  = $row['age'];
	}
	$sql1="update users set dob='$dob' where pid='$id'";
	mysqli_query($conn,$sql1);
	$sql2 = "update player_info set age='$age'";
	mysqli_query($conn,$sql2);
	header("Location:profile.php");
}
echo "<form method='post'>
Date of Birth :<input type='date' name='dob'><br>
<input type='submit' value='Update'>
";


?>