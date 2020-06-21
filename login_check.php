<?php
session_start();

if(empty($_POST['uname']) or empty($_POST['pwd']))
{
	if(empty($_POST['uname']))
	{
		echo "<script>alert('Please enter Username')</script>";
	    echo "<script>location.href='index.php'</script>";
	}
	else
	{
		echo "<script>alert('Please enter password')</script>";
	    echo "<script>location.href='index.php'</script>";
	}
	
}
else
{
if(isset($_POST['type_login']))
{
	if($_POST['type_login'] == 'User_login')
	{
		$_SESSION['name'] = $_POST['uname'];
		$_SESSION['password'] = $_POST['pwd'];
		header("Location:login.php");
	}
	else
	{
		
		$_SESSION['name'] = $_POST['uname'];
		$_SESSION['password'] = $_POST['pwd'];
		header("Location:login_rentee.php");
	}
	
}
else
{
	echo "<script>alert('Please choose login type')</script>";
	echo "<script>location.href='index.php'</script>";
}
}
?>