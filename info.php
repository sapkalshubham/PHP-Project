<?php
require 'conn.php';
session_start();


$file=$_FILES['image'];
$filename = $_FILES['image']['name'];
$filetmpname = $_FILES['image']['tmp_name'];
$filesize = $_FILES['image']['size'];
$fileError = $_FILES['image']['error'];
$filetype = $_FILES['image']['type'];

$id = $_SESSION['r_id'];	

$folder = $_POST['sport'];

$day = $_POST['day'];

$in_time = $_POST['start_time'];

$out_time = $_POST['end_time'];

$rent = $_POST['rent'];

$_SESSION['sport_name'] = $_POST['sport'];

$fileExt = explode('.', $filename);
$fileActualext = strtolower(end($fileExt));
$fileNameNew = $id.".".$fileActualext;

if(isset($_POST['Submit_data']))
{
if($folder == 'football')
{
	
	$fileDestination = 'football/'.$fileNameNew;
	move_uploaded_file(	$filetmpname,$fileDestination);
	$query1 = "update rentee_info set image=1,sport='football',rent='$rent' where  rid='$id' && sport is NULL";
	mysqli_query($conn,$query1);
    
	$query = "insert into equipment(id,game,day,start_time,
end_time ) values('$id','football','$day','$in_time','$out_time')";
	mysqli_query($conn,$query);
	header("Location:equipment_form.php");
}
else if($folder == 'basketball')
{
	
	$fileDestination = 'basketball/'.$fileNameNew;
	move_uploaded_file(	$filetmpname,$fileDestination);
	$query1 = "update rentee_info set image=1,sport='basketball',rent='$rent' where rid='$id' && sport is NULL";
	mysqli_query($conn,$query1);
    
	$query = "insert into equipment(id,game,day,start_time,
end_time ) values('$id','basketball','$day','$in_time','$out_time')";
	mysqli_query($conn,$query);
	header("Location:equipment_form.php");
}
else if($folder == 'tt')
{
	
	$fileDestination = 'tt/'.$fileNameNew;
	move_uploaded_file(	$filetmpname,$fileDestination);
	$query1 = "update rentee_info set image=1,sport='tt',rent='$rent' where rid='$id' && sport is NULL";
	mysqli_query($conn,$query1);
    
	$query = "insert into equipment(id,game,day,start_time,
end_time ) values('$id','tt','$day','$in_time','$out_time')";
	mysqli_query($conn,$query);
	header("Location:equipment_form.php");
}



}

?>