<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'BAbalola2018';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
$dbname = 'pgcgpa';
mysqli_select_db($dbname);

//echo (date('d-n-Y') + 1);
//echo date('tomorrow');
//echo date("Y-m-d",strtotime("tomorrow"));
?> 

