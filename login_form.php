<?php 
session_start();

  $em_User       = $_POST['em_User'];
  $em_Password   = md5($_POST['em_Password']);
  // $em_Password   = $_POST['em_Password'];

  require 'server.php';

  $sql    = "SELECT user.id,user.password,user.role FROM user WHERE user.id ='$em_User' and user.password='$em_Password'";
  $result = mysqli_query($connect,$sql);

  $role    = mysqli_fetch_array($result);
  $num_row = mysqli_num_rows($result);

  if($num_row == 1) {
    $_SESSION['id']       = $em_User;
    $_SESSION['password'] = $em_Password;

    if($role['role'] == "admin") {
      header("location:admin/admin_page.php");
    }else if($role['role'] == "user") {
      header("location:index.php");
    }else if($role['role'] == "approver"){
      header("location:approver/approver_page.php");
    }else if($role['role'] == "driver"){
      header("location:driver/driver_page.php");
    }else{
      header("location:login.php?alert=2");
    }
  }
  else {
    header("location:login.php?alert=1");
  }
  ?>