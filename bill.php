<?php
include 'conn.php';
session_start();
echo "Your booking has been made! Enjoy the game!<br>
      Following is the summary of your bill.<br>
	  Please note your booking id and do not share it with anyone.";
$bid = $_SESSION['bid'];
$id = $_SESSION['id'];	  
$sql = "SELECT * FROM bill join lim where bill.bid='$bid' and pid='$id'";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
	$rid = $row['rid'];
	$sql2 = "select * from rentee where rid='$rid'";
	$result2 = mysqli_query($conn,$sql2);
	while($row2=mysqli_fetch_assoc($result2))
	{
		$rname = $row2['rname'];
	}
	$game = $row['game_name'];
	$date = $row['date'];
	$s_time = $row['s_time'];
	$e_time = $row['e_time'];
	$bill = $row['bill'];
}
echo "<table>
      <tr>
	  <th>Booking id</th>
	  <th>Ground name</th>
	  <th>Sport</th>
	  <th>Date</th>
	  <th>From</th>
	  <th>Till</th>
	  <th>Bill</th>
	  </tr>
	  <tr>
	  <td>".$bid."</td>
	  <td>".$rname."</td>
	  <td>".$game."</td>
	  <td>".$date."</td>
	  <td>".$s_time."</td>
	  <td>".$e_time."</td>
	  <td>".$bill."</td>
	  </table>";
	  
$sql1 = "select * from booking where bid='$bid'";	
$result1 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result1)>1)
{
	echo "<a href='fellow.php'>Check fellow players' id</a><br>";
}	
else
{
	unset($_SESSION['bid']);
	echo "<a href='home_player.php'>Done</a>";
}

echo "<a href='logout.php'>Logout</a>";
echo "<br>";
unset($_SESSION['date_chose']);
unset($_SESSION['sport_chose']);
unset($_SESSION['location_chose']);
unset($_SESSION['a']);
unset($_SESSION['b']);
unset($_SESSION['rent']);
if(isset($_SESSION['quantity']))
{
	unset($_SESSION['quantity']);
}
?>