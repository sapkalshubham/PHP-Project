<?php
session_start();
include 'conn.php';

echo "<a href='logout.php'>Logout</a>";
echo "<br>";
$flag=0;


$arr = array('Sunday','Saturday');
if(isset($_POST['grd']))
{
	$_SESSION['grd'] = $_POST['grd'];
}

$ground = $_SESSION['grd'];
$id = $_SESSION['id'];
//based on grd from chose.php retrieve the data of the ground
$game = $_SESSION['sport_chose'];

$choice = $_SESSION['date_chose'];

$sql2 = "select * from equipment where id='$ground' && game='$game'";
$result2 = mysqli_query($conn,$sql2);

while($row2 = mysqli_fetch_assoc($result2))
{
	$a = $row2['start_time'];
	$b = $row2['end_time'];
	$day = $row2['day'];
	$quantity = $row2['quantity'];
	if($quantity>0)
	{
		$equipment = $row2['name'];
	    $price = $row2['price'];
	}
	
}

$_SESSION['a'] = $a;
$_SESSION['b'] = $b;

$sql8 = "select dayname('$choice') as dayname from dual";
$result8 = mysqli_query($conn,$sql8);
while($row8 = mysqli_fetch_assoc($result8))
{
	$dayname = $row8['dayname'];
}


if($day=='Weekend' and !in_array($dayname,$arr))
{
	echo "<script>alert('This ground is not available on weekdays')</script>";
    echo "<script>location.href='booking_form.php'</script>";
}
else
{
	




$sql = "select * from rentee_info where rid = '$ground'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
	$about = $row['about'];
	$sum = $row['sum'];
	$number = $row['number'];
	$image = $row['image'];
	$rid = $row['rid'];
	$rent = $row['rent'];
	$_SESSION['rent'] = $row['rent'];
}

$sport = $_SESSION['sport_chose'];

if($image == 0)
{
	echo "<img src = 'default/default.jpg' width=100>";
}
else
{
	if(strtolower($sport) == 'football')
	{
		echo "<img src = 'football/".$rid.".jpg' width=100>";
	}
	elseif(strtolower($sport) == 'basketball')
	{
		echo "<img src = 'basketball/".$rid.".jpg' width=100>";
	}
}

echo "<br>";
echo $about;
echo "<br>";
if($sum == 0)
{
	echo "No ratings yet";
	echo "<br>";
}
else
{
	echo "Rating :";
    echo $sum/$number;
    echo "<br>";
}





echo "Available on :".$day;
echo "<br>";

echo "Open from :".$a;
echo "till :".$b;
echo "<br>";
echo "Current bookings:";
echo "<br>";

$sql3 = "select * from lim where rid='$ground' && date='$choice' && game_name='$sport'";
$result3 = mysqli_query($conn,$sql3);

if(mysqli_num_rows($result3)==0)
{
	echo "No bookings yet, be the first one to book!!";
	echo "<br>";
}
else
{
	$flag=1;
	//create table and display timeslot and remaining number of players
	echo "<table>
          <tr>
          <th>Starting time</th>
          <th>Ending time</th>
		  <th>Vacancies</th>
          </tr>";
	
	while($row3 = mysqli_fetch_assoc($result3))
	{
	echo "<tr>";
    echo "<td>"	.$row3['s_time']. "</td>";
    echo "<td>"	.$row3['e_time']. "</td>";
	echo "<td>"	.$row3['players']. "</td>";
	echo "</tr>";
    }	
	echo "<table>";
}

if($quantity==0)
{
	echo "No equipment for rent";
}	


else
{
	if($flag==0) //No bookings yet
	{
	
		$_SESSION['quantity'] = $quantity;
		echo "Equipment for rent :";
	echo "
	     <table>
		 <tr>
		 <th>Equipment name</th>
		 <th>Equipment rent</th>
		 <th>Equipment Available</th>
		 </tr>
		 <tr>
		 <td>".$equipment."</td>
		 <td>".$price."</td>
		 <td>".$quantity."</td>
		 </tr>
		 </table>
	";
	}
	else
	{
	
		if(isset($_SESSION['quantity']))
		{
			unset($_SESSION['quantity']);
		}
		$sql11 = "select * from lim where rid='$ground' && date='$choice' && game_name='$sport'";
        $result11 = mysqli_query($conn,$sql11);
		echo "Equipment for rent :";
	        echo "
	           <table>
		       <tr>
			   <th>Start time</th>
			   <th>End time</th>
		       <th>Equipment name</th>
		       <th>Equipment rent</th>
		       <th>Equipment Available</th>
		       </tr>";
		while($row11 = mysqli_fetch_assoc($result11))
	    {
			$temp_stime = $row11['s_time'];
			$temp_etime = $row11['e_time'];
			$temp_equipment = $row11['equipment'];
			$temp_quantity = $row11['quantity'];
			//$_SESSION['quantity'] = $temp_quantity;
			
		      echo "<tr>
			   <td>".$temp_stime."</td>
			   <td>".$temp_etime."</td>
		       <td>".$temp_equipment."</td>
		       <td>".$price."</td>
		       <td>".$temp_quantity."</td>
		       </tr>";
		       
	        
	    }
		echo "</table>";
	}
	
}
echo "The rent for the ground is :".$rent;
echo "<br>";


echo "
<form action='booking.php' method='post'>
Choose the equipment for rent(ignore if not wanted) :
<br>Equipment : <input type='text' name='equipment_chose'>
Quantity : <input type='nuber' name='quantity_chose'><br>
Choose the time slot you want to play in :
<br>From:<input type='time' name='starting_time'>
to:<input type='time' name='ending_time'>
<input type='submit' value='Book'>
";

}
?>