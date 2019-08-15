<?php
// print_r($_POST);
$date_write    = $_POST['date_write'];
$first_name    = $_POST['first_name'];
$last_name     = $_POST['last_name'];
$rank          = $_POST['rank'];
$zone          = $_POST['zone'];
$want          = $_POST['want'];
$place         = $_POST['place'];
$county        = $_POST['county'];
$people        = $_POST['people'];
$date_go       = $_POST['date_go'];
$time_go       = $_POST['time_go'];
$date_back     = $_POST['date_back'];
$time_back     = $_POST['time_back'];
$phone_num     = $_POST['phone_num'];
$license_user  = $_POST['license_user'];
$can_go        = $_POST['can_go'];
$driver_name   = $_POST['driver_name'];
$driver_car    = $_POST['driver_car'];
$driver_carid  = $_POST['driver_carid'];
$license_agent = $_POST['license_agent'];

require "server.php";
$sql = "INSERT INTO `rent_form`(`date_write`, `first_name`, `last_name`, `rank`, `zone`, 
    `want`, `place`, `county`, `people`, `date_go`, `time_go`, `date_back`, `time_back`, 
    `phone_num`, `license_user`, `can_go`, `driver_name`, `driver_car`, `driver_carid`, 
    `license_agent`) 
        VALUES ('$date_write','$first_name','$last_name','$rank','$zone','$want','$place',
        '$county','$people','$date_go','$time_go','$date_back','$time_back','$phone_num',
        '$license_user','$can_go','$driver_name','$driver_car','$driver_carid ','$license_agent')";

$result = mysqli_query($connect, $sql);

if ($result) {
    // ทำได้
    echo "<script>alert('แบบฟอร์มได้รับการบันทึกแล้วค่ะ');</script>";
    exit();
    header("location:index.html"); //มันไม่เปลี่ยนหน้า !!!!
     
}
 else {
    // ทำไม่ได้
}
    // โยนกลับ


// echo"<br><br>";
// echo"<a href='index.html'>กลับหน้าหลัก</a><br>";
