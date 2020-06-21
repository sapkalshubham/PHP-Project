<?php
include 'conn.php';
session_start();
$id = $_SESSION['id'];
echo "
<form method='post'>
Enter the name of player you would like spam:<input type='text' name='name'><br>
<textarea name='reason' rows='5' cols='80'>You reason for spam</textarea><br>
<input type='submit' value='Submit'>
</form>

";

if(isset($_POST['name']))
{
	$name = $_POST['name'];
	$reason = $_POST['reason'];
	$sql = "select pid from users where Name='$name'";
		$result = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
			$to_id = $row['pid'];
			
		}
	$sql1 = "select * from spam_record where spam_to='$to_id' and spam_from ='$id'";
		$result1 = mysqli_query($conn,$sql1);
		if(mysqli_num_rows($result1)>0)
		{
			echo "<script>alert('You have already spammed this player.Your response is already recorded')</script>";
	        echo "<script>location.href='fellow_past.php'</script>";
		}
		else
		{
			$sql2 = "insert into spam_record values('$to_id','$id','$reason')";
			mysqli_query($conn,$sql2);
			$sql3 = "update spam set date=CURRENT_DATE,count=count+1 where pid='$to_id'";
			mysqli_query($conn,$sql3);
			echo "Would you like to spam someone else?<br>";
			echo "<input type='button' value='Yes' onclick=location.href='spam.php'>";
			echo "   ";
			echo "<input type='button' value='No' onclick=location.href='fellow_past.php'>";
		}
}
?>