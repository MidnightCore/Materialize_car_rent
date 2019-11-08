<?php 
require '../server/server.php';
session_start();
if(isset($_SESSION['id'])){
    if(isset($_POST['cartodriver'])){
        $car_id =  $_POST['cartodriver'];
    }else{
        echo "<script>alert('ไม่ได้เลือกทะเบียนรถค่ะ กรุณาเลือก');history.back();</script>";
        exit();
    }
}
else{
    header("location:../login.php");
    exit(); 
}
$user_id = base64_decode($_POST['id']);
$search_id = "SELECT id FROM driver WHERE driver.user_id = '$user_id'";
$result_id = mysqli_query($connect, $search_id);
$rowid = mysqli_fetch_array($result_id);
$id = $rowid['id'];

$sql = "UPDATE car SET driver_id = '$id' WHERE car.license = '$car_id'";

$search_user = "SELECT user_id
                FROM user,driver,car 
                WHERE user.id = driver.user_id AND driver.id = car.driver_id AND user.id = '$user_id'";
$result_user = mysqli_query($connect, $search_user);
$row_user = mysqli_fetch_array($result_user);
if($row_user['user_id']){
    echo "<script>alert('คนขับรถมีรถอยู่แล้วค่ะ');history.back();</script>";
}else{
    if(mysqli_query($connect, $sql)){
        echo "<script>alert('เพิ่มข้อมูลรถเรียบร้อยค่ะ');history.back();</script>";
    }
}
?>