<?php

require 'conn.php';
session_start();

$username = $_SESSION['name'];
$pwd = $_SESSION['password'];
$sql = "select * from rentee";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result))
{
	if($username == $row['username'] AND md5($pwd) ==  $row['password'])
	{
				$_SESSION['r_id'] = $row['rid'];
				$id = $row['rid'];
	}
}
if(empty($id))
{
	echo "<script>alert('incorrect username or password')</script>";
	echo "<script>location.href='index.php'</script>";
}
else
{
	header("Location:rentee_home.php");
}
?>