<?php
 require 'conn.php';
 session_start();

$username = $_SESSION['name'];
$pwd = $_SESSION['password'];
$sql = "select * from users";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result))
{
	if($username == $row['Username'] AND md5($pwd) ==  $row['Password'])
	{
				$_SESSION['id'] = $row['pid'];
				$id = $row['pid'];
	}
}
if(empty($id))
{
	echo "<script>alert('incorrect username or password')</script>";
	echo "<script>location.href='index.php'</script>";
}
else
{
	$sql2 = "select * from spam where pid = $id";
	$result2 = mysqli_query($conn,$sql2);
	while ($row2 = mysqli_fetch_assoc($result2))
    {
	      $spam_count = $row2['count'];
    }
	if($spam_count>3)
	{
		$sql4 = "SELECT timestampdiff(DAY,date,sysdate()) as diff from spam where rid = $id";
		$result4 = mysqli_query($conn,$sql4);
		while($row4=mysqli_fetch_assoc($result4))
        {
	       $new = $row4['diff'];
        }
		
		if($new<30)
		{
			$release_date = $row2['date'];
		    echo "<script>alert('Your account has been blocked due to excessive spam reports. You can again start using your account after 30 days')</script>";
	        echo "<script>location.href='index.php'</script>";
		}
		else
		{
			$sql5 = "delete from spam_record where spam_to = '$id'";
			mysqli_query($conn,$sql5);
			header("Location:home_player.php");
		}
		
	}
	else
	{
		header("Location:home_player.php");
	}

}
?>