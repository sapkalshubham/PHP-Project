<?php
session_start();
include 'conn.php';
$id = $_SESSION['id'];
if(isset($_POST['bio']))
{
	$bio = $_POST['bio'];
	$sql="update player_info set about='$bio' where pid='$id'";
	mysqli_query($conn,$sql);
	header("Location:profile.php");
}
echo "<form method='post'>
<textarea name='bio' rows='5' cols='80'>Bio</textarea><br>
<input type='submit' value='Update'>
";


?>