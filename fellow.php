<?php
include 'conn.php';
session_start();
$bid = $_SESSION['bid'];
$id = $_SESSION['id'];
$sql = "select * from booking where bid='$bid' and p_id!='$id'";	
$result = mysqli_query($conn,$sql);
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
	if($rating==0)
	{
		echo "No ratings yet.<br>";
	}
	else
	{
		echo "<br>Rating :".$rating;
	}
	
	echo "<br><hr>";
}
unset($_SESSION['bid']);
echo "<br><input type='button' value='Done' onclick=location.href='home_player.php'>";

?>