<?php
// print_r($_POST);
$first_name     = $_POST['first_name'];
$last_name      = $_POST['last_name'];
$user_id        = $_POST['user_id'];
$user_password  = md5($_POST['user_password']);
$Phone_num      = $_POST['Phone_num'];
$user_email     = $_POST['user_email'];
$Role           = $_POST['role'];
$rank = $_POST['rank'];
$department = $_POST['department'];
require "../server.php";
$search = "SELECT id FROM user WHERE user.id='$user_id'";
$sql = "INSERT INTO `user`(`fname`, `lname`, `id`, `password`, 
        `Phone`, `email` , `role`,`rank`,`department`) 
        VALUES ('$first_name','$last_name','$user_id','$user_password','$Phone_num',
        '$user_email','$Role','$rank','$department')";

if (mysqli_query($connect,$sql)){
    header("location:admin_page.php?alert=1");     //มันไม่เปลี่ยนหน้า !!!!!!!!!   TT^TT
} 
else {
    if(mysqli_query($connect,$search)){
    echo "<script>alert('ชื่อผู้ใช้นี้มีคนใช้แล้วค่ะ');history.back();</script>";

    }else{
    echo "<script>alert('กรอกข้อมูลไม่ถูกต้องกรุณากรอกใหม่ค่ะ');history.back();</script>";
    }
}
