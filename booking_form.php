<?php
require "logged_in_check.php";
// enter the name of the sport with initial letter capital
?>



<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/booking_form.css">
</head>
<body>  
   <div class="bar">
            <button class="logout" onclick="location.href='logout.php'">Logout</button>
	        <button class="home" onclick="location.href='home_player.php'">Home</button>
    </div>
	<hr>
   <div class="box">
	     <form action='chose.php' method='post'>
		 
		    <div>
		    <label class="sport">Sport: </label>
		    <select name="sport_chose" class="sport_chose">
			     <option value="Football">Football</option>
				 <option value="Basketball">Basketball</option>
			</select>
			</div>
			
			<div>
            <label class="sport">Locality: </label>
            <input type='text' name='location_chose'>
			</div>
			
			<div>
			<label  class="sport">Date: </label>
            <input type='date' name='date_chose'>
			</div>
			
            <input type='submit' name='book' value="Search" class="btn">
         </form>
    </div>
</body>
</html>