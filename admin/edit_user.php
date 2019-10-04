 <?php
session_start();
require "./../server.php";
if(isset($_SESSION['id'])){
    $user_id = $_POST['user_id'];
    if(isset($_POST['license']) || isset($_POST['rank_approver'])){
        $license = $_POST['license'];
        $rank_approver = $_POST['rank_approver'];
    }else if(isset($_POST['image'])){
        $image = $_POST['image'];
    }
}else{
    header("location:./../login.php");
    exit();
}
$first_name     = $_POST['first_name'];
$last_name      = $_POST['last_name'];
$Phone_num      = $_POST['Phone_num'];
$user_email     = $_POST['user_email'];
$Role           = $_POST['role'];
$rank = $_POST['rank'];
$department = $_POST['department'];

// $search = "SELECT id FROM user WHERE user.id='$user_id'";
// echo"aaaaaaa";
    $searchrole = "SELECT user.role FROM user WHERE user.id = '$user_id'";
    $resultrole = mysqli_query($connect, $searchrole);
    $rowrole = mysqli_fetch_array($resultrole);
    if($rowrole['role'] == 'user'){
        // echo"roleqqqqq";
        $update_user = "UPDATE user SET `fname` = '$first_name', `lname` = '$last_name', `phone` = '$Phone_num', `email` = '$user_email', `rank` = '$rank', `department` = '$department' WHERE user.id = '$user_id'";
        if(mysqli_query($connect, $update_user)){
            echo"asfas";
            header("location:admin_page.php?alert=2");    
            exit();
        }
        
    }else if($rowrole['role'] == 'approver'){
        $update_approver = "UPDATE user SET `fname` = '$first_name', `lname` = '$last_name', `phone` = '$Phone_num', `email` = '$user_email', `rank` = '$rank', `department` = '$department' WHERE user.id = '$user_id'";
        if(mysqli_query($connect, $update_approver)){
            $update_tb_ap = "UPDATE approver SET `license` = '$license', `rank` = '$rank_approver' WHERE approver.user_id = '$user_id'";
            if(mysqli_query($connect, $update_tb_ap)){
                header("location:admin_page.php?alert=2");    
                exit();
            }
            
        }  
    }else if($rowrole['role'] == 'driver'){
        $update_driver = "UPDATE user SET `fname` = '$first_name', `lname` = '$last_name', `phone` = '$Phone_num', `email` = '$user_email', `rank` = '$rank', `department` = '$department' WHERE user.id = '$user_id'";
        if(mysqli_query($connect, $update_driver)){
            $update_driver = "UPDATE driver SET `image` = '$image' WHERE driver.user_id = '$user_id'";
            if(mysqli_query($connect, $update_driver)){
                header("location:admin_page.php?alert=2");    
                exit();
        }
            }
            
    }
?> 
