<?php 
session_start();
require './../server.php';
if(isset($_SESSION['id'])){

}else{
    header("location:./../login.php");
    exit();
}
$color = $_POST['car_color'];
$brand = $_POST['car_brand'];
$version = $_POST['car_version'];
$num = $_POST['car_number'];
$image = $_POST['carimage'];
$sql = "INSERT INTO `car`(`color`, `brand`, `version`, `license`,`image`) 
        VALUES ('$color', '$brand', '$version', '$num', '$image')";
$search = "SELECT license FROM car WHERE car.license = '$num'";
$result = mysqli_query($connect,$search);
$row = mysqli_fetch_array($result);
if (!$row){
    if(mysqli_query($connect, $sql)){
         header("location:admin_page.php?alert=1");
    exit();
    }
} 
else {
    if(mysqli_query($connect,$search)){
    echo "<script>alert('ทะเบียนรถคันนี้ลงทะเบียนไปแล้วค่ะ');history.back();</script>";

    }else{
    echo "<script>alert('กรอกข้อมูลไม่ถูกต้องกรุณากรอกใหม่ค่ะ');history.back();</script>";
    }
}

?>