<html>
   <head>
      <link rel="stylesheet" type="text/css" href="css/signup_form_rentee.css">
   </head>
   <body>
      <div class="signup">
	   <img src="css\images.png" width=50>
	   <h2>Sign Up Now</h2>
       <form action='signup_rentee.php' method='post'>
	   
	   
	     <div class="top">
            <div class="info">
            <input type='text' placeholder="Ground name" name='rentee_name'>
            </div>
			
			<div class="info">
            <input type='number' placeholder="Phone" name='rentee_number'>
            </div>
			
			<div class="info">
            <input type='text' placeholder="Username" name='rentee_username'>
            </div>
			
			<div class="info">
            <input type='password' placeholder="Password" name='rentee_password'>
            </div>
			<hr>
		 </div>
			
			<div class="adr">
            <h3>Location:</h3>

            <div class="loctn">
            <input type='text' placeholder="Street" name='rentee_street'>
            </div>
			
			<div class="loctn">
            <input type='text' placeholder="Landmark" name='rentee_landmark'>
            </div>
			
			<div class="loctn">
            <input type='text' placeholder="Locality" name='rentee_locality'>
            </div>
			
			<div class="loctn">
            <input type='text' placeholder="City" name='rentee_city'>
            </div>

            </div>


            <input class="btn" type='submit' name='rentee_submit_button' value="Sign Up">
        </form>
      </div>
    </body>
<html>
<?php
@$pwd = md5($_POST['rentee_password']);
?>

