<?php
include 'conn.php';
session_start();
if(empty($_POST['bid']) and !isset($_SESSION['b_id']))
{
	echo "<script>alert('Please enter a booking id')</script>";
	echo "<script>location.href='past_bookings.php'</script>";
}
if(isset($_POST['fellow']))
{
	$_SESSION['b_id']=$_POST['bid'];
}

$bid = $_SESSION['b_id'];
$id = $_SESSION['id'];
$sql = "select * from booking where bid='$bid' and p_id!='$id'";	
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==0)
{
	echo "Looks like you played alone<br>";
	echo "<a href='past_bookings.php'>Go back</a>";
}
else
{
while($row = mysqli_fetch_assoc($result))
{
	$pid = $row['p_id'];
	$sql1 = "select Name from users where pid='$pid'";
	$result1 = mysqli_query($conn,$sql1);
	while($row1 = mysqli_fetch_assoc($result1))
	{
		$name = $row1['Name'];
	}
	$sql2 = "select *,(sum/number) as rating from player_info where pid='$pid'";
	$result2 = mysqli_query($conn,$sql2);
	while($row2 = mysqli_fetch_assoc($result2))
	{
		$about = $row2['about'];
		$img = $row2['image'];
		$age = $row2['age'];
		$rating = $row2['rating'];
	}
	if($img == 0)
    {
	   echo "<img src = 'default/default.jpg' width=100><br>";
    }
    else
    {
	   echo "<img src = 'profile/".$pid.".jpg' width=100><br>";
    }
    echo "Name :".$name;
	echo "<br>Age :".$age;
	echo "<br>Bio :".$about;
	echo "<br>Rating :".$rating;
	echo "<br><hr>";
}
echo "<a href='rate.php'>Rate a player</a><br>";
echo "<a href='spam.php'>Spam a player</a><br>";
echo "<a href='past_bookings.php'>Go back</a>";
}
?>