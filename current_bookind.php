<?php
include 'conn.php';
session_start();
if(isset($_SESSION['b_id']))
{
	unset($_SESSION['b_id']);
}
$id = $_SESSION['id'];
$sql = "select * from lim natural join booking where p_id='$id' and s_time>CURRENT_TIME() and date=sysdate() union select * from lim natural join booking where p_id='$id' and date>CURRENT_DATE";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	echo "
	<table>
	<tr>
	<th>Date</th>
	<th>Booking id</th>
	<th>Ground name</th>
	<th>Game name</th>
	<th>From</th>
	<th>Till</th>
	</tr>";
while($row=mysqli_fetch_assoc($result))
{
	$bid = $row['bid'];
	$rid = $row['rid'];
	$game = $row['game_name'];
	$date = $row['date'];
	$s_time = $row['s_time'];
	$e_time = $row['e_time'];
	$sql1 = "select * from rentee where rid='$rid'";
	$result1 = mysqli_query($conn,$sql1);
	while($row1=mysqli_fetch_assoc($result1))
	{
		$rname = $row1['rname'];
	}

	
	echo"<tr>
	<th>".$date."</th>
	<th>".$bid."</th>
	<th>".$rname."</th>
	<th>".$game."</th>
	<th>".$s_time."</th>
	<th>".$e_time."</th>
	</tr>
    
	
	";
}
echo "</table>";
echo "To check about the fellow players, please enter the booking id:<br>";
echo "
<form action='fellow_current.php' method='post'>
Booking ID : <input type='number' name='bid'><br>
<input type='submit' name='fellow' value='Submit'>
</form>

";
}
else
{
	echo "No current bookings.<br>";
}
echo "<a href='home_player.php'>Home</a>";

?>