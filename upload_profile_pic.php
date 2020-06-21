<?php
include 'conn.php';
session_start();

$file=$_FILES['profile_image'];
$filename = $_FILES['profile_image']['name'];
$filetmpname = $_FILES['profile_image']['tmp_name'];
$filesize = $_FILES['profile_image']['size'];
$fileError = $_FILES['profile_image']['error'];
$filetype = $_FILES['profile_image']['type'];

$id =$_SESSION['id'];	

$fileExt = explode('.', $filename);
$fileActualext = strtolower(end($fileExt));
$fileNameNew = $id.".".$fileActualext;
$fileDestination = 'profile/'.$fileNameNew;
move_uploaded_file(	$filetmpname,$fileDestination);
$sql = "update player_info set image=1 where pid='$id'";
mysqli_query($conn,$sql);
header("Location:profile.php");

?>