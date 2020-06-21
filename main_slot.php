<?php
require 'conn.php';
session_start();
echo "
<form action='book_slot.php' method='post'>
Enter the dates which you want to book for maintenance:<br><br>
From:<input type='date' name='from'>
To:<input type='date' name='to'><br>
<input type='submit' value='Book'>

";


?>