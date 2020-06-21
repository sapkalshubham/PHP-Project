<?php
include 'conn.php';
session_start();

echo "<form action='equip.php' method='post'>
      Equipment name:<input type='text' name='e_name'>
	  Quantity:<input type='number' name='quantity'>
	  Price:<input type='number' name='price'>
	  <input type='submit' value='submit'>
	  </form>";

echo "<a href='r_info.php'>No equipment for rent</a>";









?>