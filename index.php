<?php
require 'conn.php';
?>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
   <body>
      <div class="login-box">
	     <h1>Login</h1>
		 <form action='Login_check.php' method='post'>
		 <div class="textbox">
		    <input type='text' placeholder="Username" name='uname'>
		 </div>

        <div class="textbox">
		    <input type='password' placeholder="Password" name='pwd'>
		</div>		 
		
		
		<input type = 'radio' name='type_login' value='User_login'>
        <label for='User_login'>Login as a Player</label><br>
        

        
        <input type = 'radio' name='type_login' value='Rentee_login'>
        <label for='Rentee_login'>Login as a Rentee</label><br>
		
		
		<input class="btn" type="submit" name="login_button" value="Login">
		 </form>
	    
	    <form action='index.php' method='post'>
	        <input class="btn1" type="submit" name="Signup" value="Sign Up"> 	
		</form>
		
		<?php
		  if(isset($_POST['Signup']))
          {
	          echo "
			  <form action='signup_form_player.php' method='post'>
			  <input class='choice' type='submit' name='user_signup' value='As a player'>
              </form>
			  
			  
			  <form action='signup_form_rentee.php' method='post'>
			  <input class='choice' type='submit' name='rentee_signup' value='As a rentee'>
              </form>
	               ";
	      }
		?>
	  
	  </div>
   </body>



</html>