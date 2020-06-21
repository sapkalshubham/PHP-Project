
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/home_player.css">
</head>
<?php
require "logged_in_check.php";
?>
<body>

        <div class="bar">
            <button class="profile" onclick="location.href='profile.php'">Profile</button>
	        <button class="logout" onclick="location.href='logout.php'">Logout</button>
		</div>
	    <hr>
		<div class="box">
		     <ul>
			    <li><a href='booking_form.php'>Book</a></li>
				<li><a href='current_bookind.php'>Current bookings</li>
		        <li><a href='past_bookings.php'>Past bookings</li>
			 </ul>
		</div>
</body>
</html>