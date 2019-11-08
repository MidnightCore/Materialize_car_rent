<?php
session_start();
require "../server/server.php";
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
$request        = $_POST['want'];
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

$sql = "INSERT INTO `rent_form`(`user_id`, `request`, `place`, `count`, `people`, `date_go`, `date_back`, `phone`,`note`,`references_id`) VALUES ('$user_id', '$request', '$place', '$county', '$people', '$date_time_go', '$date_time_back', '$phone', '$note', '$references_id')";

if ($result = mysqli_query($connect,$sql)) {
    // หาไอดีล่าสุดที่เพิ่งเพิ่มเข้าไป
    $sql = "SELECT id FROM rent_form ORDER BY created_at DESC LIMIT 1";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    $id_rentform = $row['id'];
    // หา approver_id จาก rank 
    $search_ap_id = "SELECT id FROM approver WHERE rank = '1'";
    $result_ap_id = mysqli_query($connect, $search_ap_id);
    $row_ap_id = mysqli_fetch_array($result_ap_id);
    $id_approver = $row_ap_id['id'];

    $insert_driver_rent = "INSERT INTO `driver_rent`(`rent_form_id`, `approver_id`) VALUES('$id_rentform', '$id_approver')";
    if(mysqli_query($connect, $insert_driver_rent)){
        $status = "กำลังตรวจสอบ";
        $note = "ขั้นตอนการเลือกรถ";
        $insert_ap_id = "INSERT INTO `approve_form`(`rent_form_id`, `approver_id`, `status`, `note`) VALUES('$id_rentform', '$id_approver', '$status', '$note')";
        if(mysqli_query($connect, $insert_ap_id)){
            header("location:../index.php?alert=1"); 
            exit();
        }
         
    } 
}else {
    echo "<script>alert('เกิดข้อผิดพลาดกรุณากรอกแบบฟอร์มใหม่ค่ะ');</script>";
    
}
