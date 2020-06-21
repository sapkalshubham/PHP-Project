<?php
	  session_start();
	  include 'conn.php';
	  

	  echo "<form action='info.php' method='post' enctype='multipart/form-data'>
            Choose Sport:
            <select name='sport'>
            <option value='football'>Football</option>
            <option value='basketball'>Basketball</option>
			<option value='tt'>Table Tennis</option>
			<option value='cricket'>Cricket</option>
			<option value='volleyball'>Volleyball</option>
            </select>
            <br/>
			 <br/>
			
			Available on:
			<select name='day'>
            <option value='Weekend'>Weekend</option>
            <option value='All days'>All days</option>
            </select>
            <br/>
			<br/>
			
			Rent per hour:
			<input type='number' name='rent'>
			
			Available from:
			<input type='time' name='start_time'>
			
			  To:
			<input type='time' name='end_time'>
				<br/>
				
			<input type='file' name='image' id='image'>
			<br/>	
			
            <input type='submit' name='Submit_data'>
            </form>";
			
			
			
			

	  
	 
		   

?>

 <button onclick="window.location.href='rentee_home.php';" >Finish</button>
