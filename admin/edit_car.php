<?php 
session_start();
require '../server/server.php';
if(isset($_SESSION['id'])){
    $id = $_POST['id'];
}else{
    header("location:../login.php");
    exit();
}
$color = $_POST['car_color'];
$brand = $_POST['car_brand'];
$version = $_POST['car_version'];
$num = $_POST['car_number'];
$image = $_POST['carimage'];
$sql = "UPDATE car SET `color` = '$color', `brand` = '$brand', `version` = '$version', `license` = '$num', `image` = '$image' WHERE car.id = '$id'";
// $search = "SELECT license FROM car WHERE car.license = '$num'";
// $result = mysqli_query($connect,$search);
// $row = mysqli_fetch_array($result);

    if(mysqli_query($connect, $sql)){
         header("location:admin_page.php?alert=2");
    exit();
    }else{
        echo"ไม่สำเร็จ";
    }

?>