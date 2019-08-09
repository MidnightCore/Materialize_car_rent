<?php

$hostname = "localhost";
$username = "root";
$password ="";
$dbName ="Materialize_car_rent";

$connect = mysqli_connect($hostname,$username,$password,$dbName) or die ("ไม่สามารถติดต่อฐานข้อมูลได้");
mysqli_set_charset($connect,"utf8");

?>