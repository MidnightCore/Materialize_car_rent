<?php
// print_r($_POST);
$car_name       = $_POST['car_name'];
$car_id         = $_POST['car_id'];
$car_brand      = $_POST['car_brand'];
$car_version    = $_POST['car_version'];
$car_color      = $_POST['car_color'];
$car_number     = $_POST['car_number'];

require "../server.php";

$sql = "INSERT INTO `add_car`(`car_name`, `car_id`, `car_brand`, `car_version`, 
        `car_color`, `car_number`) 
        VALUES ('$car_name','$car_id','$car_brand','$car_version','$car_color',
        '$car_number')";

$result = mysqli_query($connect, $sql);

if ($result) {
    echo "<script>alert('เพิ่มรถยนต์แล้วค่ะ');</script>";
    exit();
    header("location:admin_page.php");     //มันไม่เปลี่ยนหน้า !!!!!!!!!   TT^TT
} 
else {
    
}