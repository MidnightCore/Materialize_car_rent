<?php
session_start();
require "../server/server.php";
if(isset($_SESSION['id'])){
    if(isset($_POST['license']) && isset($_POST['rank_approver']) && $_POST['role'] == 'approver'){
        $license = $_POST['license'];
        $rank_approver = $_POST['rank_approver'];
        
    }else if(isset($_POST['image']) && $_POST['role'] == 'driver'){
        $image = $_POST['image'];
    }
}else{
    header("location:../login.php");
    exit();
}
$first_name     = $_POST['first_name'];
$last_name      = $_POST['last_name'];
$user_id        = $_POST['user_id'];
$user_password  = $_POST['user_password'];
$Phone_num      = $_POST['Phone_num'];
$user_email     = $_POST['user_email'];
$Role           = $_POST['role'];
$rank = $_POST['rank'];
$department = $_POST['department'];

$search = "SELECT id FROM user WHERE user.id='$user_id'";
$result_id = mysqli_query($connect, $search);
$row_id = mysqli_fetch_array($result_id);
$sql = "INSERT INTO `user`(`fname`, `lname`, `id`, `password`, 
        `Phone`, `email` , `role`,`rank`,`department`) 
        VALUES ('$first_name','$last_name','$user_id','$user_password','$Phone_num',
        '$user_email','$Role','$rank','$department')";
if($row_id['id'] != $user_id){
    if (mysqli_query($connect,$sql)){
        $searchrole = "SELECT user.role FROM user WHERE user.id = '$user_id'";
        $resultrole = mysqli_query($connect, $searchrole);
        $rowrole = mysqli_fetch_array($resultrole);
        if($rowrole['role'] == 'user'){
            header("location:admin_page.php?alert=1");    
            exit();
        }else if($rowrole['role'] == 'approver'){
            $insert_approver ="INSERT INTO `approver`(`user_id`, `license`,  `rank`) VALUES ('$user_id', '$license', '$rank_approver')";
            if(mysqli_query($connect, $insert_approver)){
                header("location:admin_page.php?alert=1");    
                exit();
            }  
        }else if($rowrole['role'] == 'driver'){
            $insert_driver = "INSERT INTO `driver`(`id`, `user_id`, `image`) VALUES(NULL, '$user_id', '$image')";
            if(mysqli_query($connect, $insert_driver)){
                header("location:admin_page.php?alert=1");    
                exit();
            }
        }else{
        echo "<script>alert('คุณคือ admin');history.back();</script>";
        }
    } else {
    echo "<script>alert('กรอกข้อมูลไม่ถูกต้องกรุณากรอกใหม่ค่ะ');history.back();</script>";
    }
}else{
     echo "<script>alert('ชื่อผู้ใช้นี้มีคนใช้แล้วค่ะ');history.back();</script>";

}

