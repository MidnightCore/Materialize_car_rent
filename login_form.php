<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <?php
        $user_id = $_POST['user_id'];
        $user_password = $_POST['user_password'];

        require 'login_form2.php';

        $sql = "SELECT user.user_id,user.user_password FROM user WHERE user.user_id ='$user_id' and user.user_password='$user_password'";
        $result = mysqli_query($connect,$sql);

        $Palm = mysqli_fetch_array($result);
        $num_row = mysqli_num_rows($result);

        if($num_row == 1){
          $_SESSION['user_id'] = $user_id;
          $_SESSION['user_password'] = $user_password;
          if($Palm['role'] == "admin"){
            header("location:Admin/admin_page.php");
          }
          else{
            header("location:index.html");
          }
        }
        else{
          echo"คุณใส่ข้อมูลไม่ถูกต้อง"."<br>";
        }

    
    echo"<br><br>";
    echo"<a href='login.php'>กลับหน้าล็อกอิน</a><br>";
    
    ?>
</body>
</html>