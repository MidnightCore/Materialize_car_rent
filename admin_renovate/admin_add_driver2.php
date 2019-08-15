<?php
// print_r($_POST);
$first_name       = $_POST['first_name'];
$last_name        = $_POST['last_name'];
$id_license       = $_POST['id_license'];
$driver_license   = $_POST['driver_license'];
$driver_phone     = $_POST['driver_phone'];
$driver_email     = $_POST['driver_email'];

require "../server.php";

$sql = "INSERT INTO `add_driver`(`first_name`, `last_name`, `id_license`, `driver_license`, 
        `driver_phone`, `driver_email`) 
        VALUES ('$first_name','$last_name','$id_license','$driver_license','$driver_phone',
        '$driver_email')";

$result = mysqli_query($connect, $sql);

if ($result) {
    echo "<script>alert('เพิ่มคนขับรถแล้วค่ะ');</script>";
    exit();
    header("location:admin_page.php");     //มันไม่เปลี่ยนหน้า !!!!!!!!!   TT^TT
} 
else {
    
}