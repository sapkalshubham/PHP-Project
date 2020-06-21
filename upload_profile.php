<?php
include 'conn.php';
session_start();
echo "<form action='upload_profile_pic.php' method='post' enctype='multipart/form-data'>
<input type='file' name='profile_image' id='profile_image'>
			<br/>	
			
            <input type='submit' name='Submit_profile'>
            </form>";
			

?>