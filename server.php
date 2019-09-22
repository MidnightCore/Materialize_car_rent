<?php

$hostname = "localhost";
$user = "root";
$pass ="";
$dbName ="vanreservationsystem";

$connect = mysqli_connect($hostname,$user,$pass,$dbName) or die ("ไม่สามารถติดต่อฐานข้อมูลได้");
mysqli_set_charset($connect,"utf8");

?>