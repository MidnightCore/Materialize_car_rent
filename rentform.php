<?php
session_start();
require "server.php";
// $today = date("Y-m-j H:i:s");
// echo$today."<br>";
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
   if(isset($_POST['note'])){
    $note = $_POST['note'];
    }else{
    $note = " ";
    } 
}


function DateTimeDiff($strDateTime1,$strDateTime2)
{
    return (strtotime($strDateTime2) - strtotime($strDateTime1))/( 60 * 60 *24); // 1 Hour =  60*60
}
$request           = $_POST['want'];
$place          = $_POST['place'];
$county         = $_POST['county'];
$people         = $_POST['people'];

//รวมวันเวลาที่ไปและกลับลงช่องเดียว
// ไป
$date_go        = $_POST['date_go'];
$time_go        = $_POST['time_go'];
$date_time_go   = $date_go." ".$time_go.":00";
// กลับ
$date_back      = $_POST['date_back'];
$time_back      = $_POST['time_back'];
$date_time_back = $date_back." ".$time_back.":00";

$phone          = $_POST['phone_num'];
$references_id = $_POST['references_id'];
// echo$date_time_go."<br>";
// echo "Date Diff = ".DateTimeDiff($today,$date_time_go)."<br>";

$sql = "INSERT INTO `rent_form`(`user_id`, `request`, `place`, `count`, `people`, `date_go`, `date_back`, `phone`,`note`,`references_id`) VALUES ('$user_id', '$request', '$place', '$county', '$people', '$date_time_go', '$date_time_back', '$phone', '$note', '$references_id')";

if ($result = mysqli_query($connect,$sql)) {
    
    header("location:index.php?alert=1"); 
    exit();   
}

 else {
    echo "<script>alert('เกิดข้อผิดพลาดกรุณากรอกแบบฟอร์มใหม่ค่ะ');</script>";
    
}
