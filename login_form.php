<?php 
session_start();
?>

<?php
  $em_User       = $_POST['em_User'];
  $em_Password   = $_POST['em_Password'];

  require 'server.php';

  $sql    = "SELECT user.id,user.password,user.role FROM user WHERE user.id ='$em_User' and user.password='$em_Password'";
  $result = mysqli_query($connect,$sql);

  $Palm    = mysqli_fetch_array($result);
  $num_row = mysqli_num_rows($result);

  if($num_row == 1) {
    $_SESSION['id']       = $em_User;
    $_SESSION['password'] = $em_Password;

    if($Palm['role'] == "admin") {
      header("location:admin_renovate/admin_page.php");
    }
    else {
      header("location:index.html");
    }
  }
  else {
    echo"คุณใส่ข้อมูลไม่ถูกต้อง"."<br>";
  }

    echo"<br><br>";
    echo"<a href='login.php'>กลับหน้าล็อกอิน</a><br>";