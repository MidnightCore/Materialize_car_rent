<?php
session_start();
require "server.php";
// $_SESSION['id'];
$user_id = $_SESSION['id'];
if(isset($_POST['note'])){
$note = $_POST['note'];
}else{
    $note = " ";
}
// print_r($_POST);
// $date_write     = $_POST['date_write'];
// $first_name     = $_POST['first_name'];
// $last_name      = $_POST['last_name'];
// $rank           = $_POST['rank'];
// $department     = $_POST['zone'];
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
// $license_user   = $_POST['license_user'];
// echo$date_time_go."<br>";
// echo$date_time_back;
$sql = "INSERT INTO `rent_form`(`user_id`, `request`, `place`, `count`, `people`, `date_go`, `date_back`, `phone`,`note`) VALUES ('$user_id','$request','$place','$county','$people','$date_time_go','$date_time_back','$phone','$note')";

if ($result = mysqli_query($connect,$sql)) {
    // echo "<script>alert('แบบฟอร์มได้รับการบันทึกแล้วค่ะ');</script>";
    // exit();
    header("location:create_pdf.php");    
    //popup เสร็จแล้ว มันไม่ยอมเปลี่ยนหน้า !!!!!!!!   TT^TT
}

 else {
    echo "<script>alert('เกิดข้อผิดพลาดกรุณากรอกแบบฟอร์มใหม่ค่ะ');</script>";
    
}
