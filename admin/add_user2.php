<?php 
require '../login_form2.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_id = $_POST['user_id'];
$Password = $_POST['Password'];
$Phone_num = $_POST['Phone_num'];
$email = $_POST['email'];
// $Mail = $_POST['em_mail'];

$p = "SELECT user.user_id FROM user_id WHERE user_id=$user_id";
$result5 = mysqli_query($connect,$p);
$row = mysqli_fetch_array($result5);
    if($row>0){
        echo "<script>alert('User_id นี้มีผู้ใช้ไปแล้วค่ะ');history.back;</script>";    
    // ติดปัญหา

    }else{
        $sql = "Insert into user"
        . "(`first_name`, `last_name`, `user_id`, `Password`, `Phone_num`, `email`) value('$first_name','$last_name','$user_id','$Password','$Phone_num','$email')";       
        $result = mysqli_query($connect,$sql);       
        header("location:add_user.php?alert=1");
}
?>