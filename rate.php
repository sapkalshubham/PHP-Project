<?php
include 'conn.php';
session_start();
$id = $_SESSION['id'];
echo "
<form method='post'>
Player name:<input type='text' name='name'><br>
Rating out of 10:<input type='number' name='rating'><br>
<input type='submit' value='Submit'>
</form>
";
if(isset($_POST['name']))
{
	$rating = $_POST['rating'];
	$name = $_POST['name'];
	if($rating>10)
	{
		echo "<script>alert('Please a rating less than 10')</script>";
	    echo "<script>location.href='rate.php'</script>";
	}
	else
	{
		$sql = "select pid from users where Name='$name'";
		$result = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
			$to_id = $row['pid'];
		}
		
		$sql1 = "select * from rating where rated_to='$to_id' and rated_by='$id'";
		$result1 = mysqli_query($conn,$sql1);
		if(mysqli_num_rows($result1)>0)
		{
			echo "<script>alert('You have already rated this player.')</script>";
	        echo "<script>location.href='fellow_past.php'</script>";
		}
		else
		{
			$sql2 = "update player_info set sum=sum+'$rating',number=number+1 where pid='$to_id'";
			mysqli_query($conn,$sql2);
			$sql3 = "insert into rating(rated_by,rated_to) values('$id','$to_id')";
			mysqli_query($conn,$sql3);
			echo "Would you like to rate someone else?<br>";
			echo "<input type='button' value='Yes' onclick=location.href='rate.php'>";
			echo "   ";
			echo "<input type='button' value='No' onclick=location.href='fellow_past.php'>";
		}
	}
}
?>