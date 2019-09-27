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
$sql = "INSERT INTO `car`(`color`, `brand`, `version`, `license`) 
        VALUES ('$color','$brand','$version','$num')";
$search = "SELECT license FROM car WHERE car.license = '$num'";
$result = mysqli_query($connect,$search);
$row = mysqli_fetch_array($result);
if (!$row){
    echo mysqli_query($connect, $sql)."351468";
    
    header("location:admin_page.php?alert=1");
    exit();     //มันไม่เปลี่ยนหน้า !!!!!!!!!   TT^TT
} 
else {
    if(mysqli_query($connect,$search)){
    echo "<script>alert('ทะเบียนรถคันนี้ลงทะเบียนไปแล้วค่ะ');history.back();</script>";

    }else{
    echo "<script>alert('กรอกข้อมูลไม่ถูกต้องกรุณากรอกใหม่ค่ะ');history.back();</script>";
    }
}

?>