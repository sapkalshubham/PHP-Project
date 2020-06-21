<?php
session_start();
include 'conn.php';

echo "echo <a href='logout.php'>Logout</a><br>";

$uid = $_SESSION['id'];
if(isset($_POST['date_chose']))
{
	$_SESSION['date_chose'] = $_POST['date_chose'];
    $_SESSION['sport_chose'] = $_POST['sport_chose'];
	$_SESSION['location_chose'] = $_POST['location_chose'];
}
$sport = $_SESSION['sport_chose'];
$location = $_SESSION['location_chose'];

$sql2 = "select city from users where pid='$uid'";
$result2 = mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2))
{
	$city = $row2['city'];
}

$sql = "SELECT * FROM rentee JOIN equipment where rid=id && game='$sport' && locality = '$location' && city='$city'";
$result = mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0)
{
	echo "<table>
          <tr>
          <th>ID</th>
          <th>Name</th>
          </tr>";
	while ($row = mysqli_fetch_assoc($result))
    {
            $status = $row['status'];		
		    if($row['status']=='N')
			{
				$t_id = $row['rid'];
				$check_update = "select lasting_till from maintenance where rid='$t_id'";
				$check_result = mysqli_query($conn,$check_update);
				while($row_update=mysqli_fetch_assoc($check_result))
				{
					$check_date = $row_update['lasting_till'];
					$sql9 = "SELECT CURRENT_DATE as date from dual";
					$result9 = mysqli_query($conn,$sql9);
					while($row9=mysqli_fetch_assoc($result9))
					{
						$curr_date = $row9['date'];
					}
					if($curr_date>$check_date)
					{
						$status = 'Y';
						$sql11 = "update equipment set status='Y' where id='$t_id'";
						mysqli_query($conn,$sql11);
						$sql12 = "delete from maintenance where rid='$t_id'";
						mysqli_query($conn,$sql12);
					}
				}
			}
			if($status=='Y')
			{
	        echo "<tr>";
           	echo "<td>"	.$row['rid']. "</td>";
			echo "<td>"	.$row['rname']. "</td>";
			echo "</tr>";
			}
    }	
	echo "<table>";
	
    echo "Please enter the id of the ground: 
	      <form action='ground_info.php' method='post'>
	      <input type='number' name='grd'>
		  <br>
		  <input type='submit' value='Choose'>
		  </form>
	
	";	
}

else
{
	echo "This sport isnt available in this locality";
	echo "<a href='booking_form.php'>Back</a>";
}




?>