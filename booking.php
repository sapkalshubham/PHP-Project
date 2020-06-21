<?php
session_start();
include 'conn.php';

$rid = $_SESSION['grd']; 
$date = $_SESSION['date_chose'];
$s_time = $_POST['starting_time'];
$e_time = $_POST['ending_time'];
$game_name = $_SESSION['sport_chose'];
$uid = $_SESSION['id'];
$equipment_name = $_POST['equipment_chose'];
$equipment_quantity = $_POST['quantity_chose'];
if(!empty($equipment_name))
{
	
	if(isset($_SESSION['quantity']))
	{
		
		if($equipment_quantity>$_SESSION['quantity'])
        {
	       echo "<script>alert('Please enter valid quantity of equipment')</script>";
	       echo "<script>location.href='ground_info.php'</script>";
        }
		else
		{
			$e_rent_sql = "select '$equipment_quantity'*price as total from equipment where id='$rid' && game='$game_name' && name='$equipment_name'";
		    $e_rent_result = mysqli_query($conn,$e_rent_sql);
		    while($e_row = mysqli_fetch_assoc($e_rent_result))
		    {
			    $e_rent = $e_row['total'];
		    }
		}
		
	}
	else
	{
		$check_qua_sql = "select * from lim where rid='$rid' && date='$date' && s_time='$s_time' && e_time='$e_time' && game_name='$game_name'";
		$result_check_qua = mysqli_query($conn,$check_qua_sql);
		while($row_check_qua_sql = mysqli_fetch_assoc($result_check_qua))
		{
			$check_qua = $row_check_qua_sql['quantity'];
		}
		if($equipment_quantity>$check_qua)
		{
			echo "<script>alert('Please enter valid quantity of equipment')</script>";
	        echo "<script>location.href='ground_info.php'</script>";
		}
		else
	    {
		
		$e_rent_sql = "select '$equipment_quantity'*price as total from equipment where id='$rid' && game='$game_name' && name='$equipment_name'";
		$e_rent_result = mysqli_query($conn,$e_rent_sql);
		while($e_row = mysqli_fetch_assoc($e_rent_result))
		{
			$e_rent = $e_row['total'];
		}
	    }
	}
	
}

else
{
	$e_rent=0;
}


if($s_time<$_SESSION['a'] or $_SESSION['b']<$e_time)
{
	echo "<script>alert('Please choose a valid timeslot')</script>";
	echo "<script>location.href='ground_info.php'</script>";
}
else
{
	
$sql = "select * from lim where rid='$rid' && date='$date' && s_time='$s_time' && e_time='$e_time' && game_name='$game_name' ";
$result = mysqli_query($conn,$sql);



if(mysqli_num_rows($result)>0) //bookings already started for this slot
{
	while ($row = mysqli_fetch_assoc($result))
    {
		$number = $row['players'];
		$bid1 = $row['bid'];
	}
	if($number == 0) //No extra player
	{
		echo "<script>alert('The bookings are full. Please choose a different time slot')</script>";
	    echo "<script>location.href='ground_info.php'</script>";
		
	}
	else
	{
		//unset($_SESSION['grd']);
		//unset($_SESSION['date_chose']);
		//unset($_SESSION['sport_chose']);
		//unset($_SESSION['location_chose']);
		
		
		$sql10 = "select * from booking where bid ='$bid1'";
		$result10 = mysqli_query($conn,$sql10);
		while($row10 = mysqli_fetch_assoc($result10))
		{
			$check = $row10['p_id'];
		}
		
		if($uid == $check)
		{
			echo "<script>alert('Your booking has already been made')</script>";
	        echo "<script>location.href='home_player.php'</script>";
		}
		else
		{
		$rent = $_SESSION['rent'];
		$sql3 = "update lim set players=players-1,quantity=quantity-'$equipment_quantity' where  bid='$bid1'";
		mysqli_query($conn,$sql3);
		
		
		$_SESSION['bid'] = $bid1;
		$sql4 = "insert into booking values('$bid1','$rid','$uid')";
		mysqli_query($conn,$sql4);
		$bill = $rent+$e_rent;
		$insert_bill = "insert into bill values('$bid1','$uid','$rent','$e_rent','$bill','no')";
		mysqli_query($conn,$insert_bill);
		
		
		header("Location:bill.php");
	}
	}
}
else
{
	$rent = $_SESSION['rent'];
	$eq = "select * from equipment where id='$rid' && game='$game_name'";
	$result_eq = mysqli_query($conn,$eq);
	while($row_eq = mysqli_fetch_assoc($result_eq))
	{
		$eqname = $row_eq['name'];
		$no = $row_eq['quantity'];
	}
	$final = $no-$equipment_quantity;
	if(strtolower($game_name) == 'football')
	{
		$sql1 = "insert into lim(rid, date, s_time ,e_time ,game_name ,players,equipment,quantity)
		         values('$rid','$date','$s_time','$e_time','$game_name',10,'$eqname','$final')";
		mysqli_query($conn,$sql1);
		
		$sql6 = "select * from lim where rid='$rid' && date='$date' && s_time='$s_time' && e_time='$e_time' && game_name='$game_name' ";
        $result6 = mysqli_query($conn,$sql6);
		while ($row6 = mysqli_fetch_assoc($result6))
		{
			$bid = $row6['bid'];
		}
		$_SESSION['bid'] = $bid;
		
		
		$sql4 = "insert into booking(bid,rid,p_id) values('$bid','$rid','$uid')";
		mysqli_query($conn,$sql4);
		$bill = $rent+$e_rent;
		$insert_bill = "insert into bill values('$bid','$uid','$rent','$e_rent','$bill','no')";
		mysqli_query($conn,$insert_bill);
		
		header("Location:bill.php");
	}
	elseif(strtolower($game_name) == 'basketball')
	{
		$sql1 = "insert into lim(rid, date, s_time ,e_time ,game_name ,players,equipment,quantity)
		         values('$rid','$date','$s_time','$e_time','$game_name',9,'$eqname','$final')";
	    mysqli_query($conn,$sql1);
		
		$sql6 = "select * from lim where rid='$rid' && date='$date' && s_time='$s_time' && e_time='$e_time' && game_name='$game_name' ";
        $result6 = mysqli_query($conn,$sql6);
		while ($row6 = mysqli_fetch_assoc($result6))
		{
			$bid = $row6['bid'];
		}
		$_SESSION['bid'] = $bid;
		
		$sql4 = "insert into booking(bid,rid,p_id) values('$bid','$rid','$uid')";
		mysqli_query($conn,$sql4);
		$bill = $rent+$e_rent;
		$insert_bill = "insert into bill values('$bid','$uid','$rent','$e_rent','$bill','no')";
		mysqli_query($conn,$insert_bill);
		header("Location:bill.php");
	}
}
}


?>