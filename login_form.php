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
        $em_User     = $_POST['em_User'];
        $em_Password = $_POST['em_Password'];

        require 'server.php';

        $sql    = "SELECT user.user_id,user.user_password,user.Phone_num,user.Role FROM user WHERE user.user_id ='$em_User' and user.user_password='$em_Password'";
        $result = mysqli_query($connect,$sql);

        $Palm    = mysqli_fetch_array($result);
        $num_row = mysqli_num_rows($result);

        if($num_row == 1){
          $_SESSION['user_id'] = $em_User;
          $_SESSION['user_password'] = $em_Password;

          if($Palm['Role'] == "admin"){
            header("location:admin/sidebar.php");
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