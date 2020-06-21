<?php
session_start();


if(isset($_SESSION['r_id']))
{
	echo "<style>
nav 
{
	background-color: blue;
	height = 50px;
}
nav ul
{
	
}
nav ul li
{
	list-style-type: none;
	width: 150px;
	float: left;
	border-right: 1px solid #ccc;
	text-align: center;
}
nav a
{
	text-decoration: none;
	color: black;
	line-height:50px;
	display: block;
}
li a:hover
{
	background-color: yellow;
	color: green;
}
</style>
<nav>
   <ul>
        <li><a href='logout.php'>Logout</a></li>
	    <li><a href='main_slot.php'>Maintenance</a></li>
		<li><a href='add.php'>Add sport</li>
		
   </ul>
</nav>
	";
	
}
else
{
	echo "Please login first"; 
}

?>