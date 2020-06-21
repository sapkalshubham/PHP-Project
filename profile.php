<?php
require "logged_in_check.php";
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/profile.css">  
  </head>
  <body>
  <div class="bar">
        <button class="home" onclick="location.href='home_player.php'">Home</button>
		
		<button class="logout" onclick="location.href='logout.php'">Logout</button>
		
  </div>
  <hr>
     
<?php
include 'conn.php';
$id = $_SESSION['id'];
$sql = "select * from player_info where pid='$id'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
	$img = $row['image'];
	$age = $row['age'];
	$about = $row['about'];
}
if($img == 0)
{
	echo "<img src = 'default/default.jpg' style='float:left; margin:2em;' height= 300 width=270><br>";
}
else
{
	echo "<img src = 'profile/".$id.".jpg' style='float:left; margin:2em; border:5px solid lightgreen;' height= 300 width=270><br>";
}
echo "<h1 style=' font-size: 45px; margin-left:50%; color:red;'>My Profile</h1>";
echo "<p style='font: 25px Arial, sans-serif;'>Age : ".$age."</p>";
echo "<p style='font: 25px Arial, sans-serif;'>Bio : ".$about."</p>";
echo "<br clear='all'/>";
?>
   <div class="buttons">
   <button class="btn1" onclick="location.href='update_profile.php'">Update Profile</button>
   
   <button class="btn2" onclick="location.href='upload_profile.php'">Upload Photo</button>
   </div>

   
   </body>
</html>