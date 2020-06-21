<?php
session_start();
include 'conn.php';
$id = $_SESSION['id'];
if(isset($_POST['name']))
{
	$name = $_POST['name'];
	$sql="update users set Name='$name' where pid='$id'";
	mysqli_query($conn,$sql);
	header("Location:profile.php");
}
echo "<form method='post'>
Name :<input type='text' name='name'><br>
<input type='submit' value='Update'>
";


?>