<?php
// print_r($_POST);
$first_name     = $_POST['first_name'];
$last_name      = $_POST['last_name'];
$user_id        = $_POST['user_id'];
$user_password  = $_POST['user_password'];
$Phone_num      = $_POST['Phone_num'];
$user_email     = $_POST['user_email'];
$Role           = $_POST['Role'];

require "../server.php";

$sql = "INSERT INTO `user`(`first_name`, `last_name`, `user_id`, `user_password`, 
        `Phone_num`, `user_email` , `Role`) 
        VALUES ('$first_name','$last_name','$user_id','$user_password','$Phone_num',
        '$user_email','$Role')";

$result = mysqli_query($connect, $sql);

if ($result) {
    echo "<script>alert('เพิ่มบัญชีผู้ใช้แล้วค่ะ');</script>";
    exit();
    header("location:admin_page.php");     //มันไม่เปลี่ยนหน้า !!!!!!!!!   TT^TT
} 

else {
    
}
