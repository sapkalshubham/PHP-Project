<?php
include 'conn.php';

$file=$_FILES['image'];
$filename = $_FILES['image']['name'];
$filetmpname = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];
$fileError = $_FILES['image']['error'];
$filetype = $_FILES['image']['type'];

$id =$_SESSION['r_id'];	

$fileExt = explode('.', $filename);
$fileActualext = strtolower(end($fileExt));
$fileNameNew = "football".$id.".".$fileActualext;
$fileDestination = 'football/'.$fileNameNew;
move_uploaded_file(	$filetmpname,$fileDestination);
$sql = "update profile_image set status = 1 where userid = '$id'";
$result = mysqli_query($conn,$sql);

echo "<img src = 'footbal/footbal".$id.".jpg'>";
?>