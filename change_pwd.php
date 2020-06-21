<?php
session_start();
include 'conn.php';
$id = $_SESSION['id'];
if(isset($_POST['old']))
{
	$old = $_POST['old'];
	$new=$_POST['new'];
	$pwd_old = md5($old);
    $sql = "select Password from users where pid='$id'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
		$pwd = $row['Password'];
	}		
	if($pwd == $pwd_old)
	{
		$pwd_new = md5($new);
		$sql1 = "update users set Password='$pwd_new' where pid='$id'";
		mysqli_query($conn,$sql1);
		echo "<script>alert('Password updated successfully')</script>";
	    echo "<script>location.href='profile.php'</script>";
	}
	else
	{
		echo "<script>alert('Incorrect password')</script>";
	    echo "<script>location.href='change_pwd.php'</script>";
	}
}

echo "<form method='post'>
Enter old password :<input type='password' name='old'><br>
Enter new password :<input type='password' name='new'><br>
<input type='submit' value='Update'>
";
?>