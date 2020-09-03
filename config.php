<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'amolana';
$link = mysqli_connect($host, $user, $pass, $db);
if(!$link){echo "Connecting To Database Fail! ".mysqli_error;}
?>
