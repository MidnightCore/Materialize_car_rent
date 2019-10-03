<?php  
require './../server.php';
session_start();
if($_SESSION['id']){
$user_id = base64_decode($_GET['user']);
// echo$user_id;
}else{
    header("location:./../login.php");
    exit();
}
$role = "SELECT user.role FROM user WHERE user.id = '$user_id'";
$resultrole = mysqli_query($connect, $role);
$rowr = mysqli_fetch_array($resultrole);
///////////////////////////////////////////////////
if($rowr['role'] == 'user'){
    $sql = "SELECT fname,lname,phone,user.rank,department,email FROM user WHERE user.role = 'user' AND user.id = '$user_id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    ////////////////////////////////////////////////////////////////
}else if($rowr['role'] == 'approver'){
    $sql = "SELECT fname,lname,phone,user.rank,department,email,approver.rank AS APrank FROM user,approver WHERE user.role = 'approver' AND user.id = approver.user_id AND user.id = '$user_id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    ////////////////////////////////////////////////////////////////
}else if($rowr['role'] == 'driver'){
    $sql = "SELECT fname,lname,phone,department,email,rank FROM user,driver WHERE user.role = 'driver' AND user.id = driver.user_id AND user.id = '$user_id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>

    <title>แก้ไขข้อมูล Approver</title>
</head>

<body>
    <nav class="teal lighten-3" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="admin_page.php" class="brand-logo">Admin Page</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="show_user.php">ข้อมูลUser</a></li>
                <li><a href="show_approver.php">ข้อมูลApprover</a></li>
                <li><a href="show_driver_car.php">ข้อมูลรถและคนขับรถ</a></li>
                <li><a href="#">ตรวจสถานะคำร้อง</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav"><br><br>
                <li><a href="show_user.php">ข้อมูลUser</a></li>
                <li><a href="show_approver.php">ข้อมูลApprover</a></li>
                <li><a href="show_driver_car.php">ข้อมูลรถและคนขับรถ</a></li>
                <li><a href="#">ตรวจสถานะคำร้อง</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>


    <form action="edit_user.php" id="ee" method="POST">

        <!-- เริ่มต้นแบบฟอร์ม -->
        <div class="container">
            <!-- หัวกระดาษ -->
            <div class="content border border-secondary mt-3 pb-1 pt-1">
                <div class="m-4">
                    <h5 class="text-center">แก้ไขข้อมูลApprover <input type="hidden" name="role" value="approver"><br></h5>
                </div>
            </div><!-- จบหัวกระดาษ -->
            <div class="row">
                <div class="col s12">
                    <h6><b>กรุณา</b> กรอกข้อมูลทั้งหมดตามความเป็นจริง<input type="hidden" name="user_id" value="<?php echo$user_id ?>"></h6>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="first_name" id="first_name" type="text" class="validate" value="<?php echo$row['fname'] ?>" required>
                            <label for="first_name">ชื่อจริง</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" id="last_name" type="text" class="validate" value="<?php echo$row['lname'] ?>" required>
                            <label for="last_name">นามสกุล</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="Phone_num" id="Phone_num" type="text" class="validate" value="<?php echo$row['phone'] ?>"  required>
                            <label for="Phone_num">เบอร์โทรศัพท์</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="user_email" id="user_email" type="text" class="validate" value="<?php echo$row['email'] ?>"  required>
                            <label for="user_email">อีเมลล์</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="rank" id="rank" type="text" class="validate" value="<?php echo$row['rank'] ?>"  required>
                            <label for="rank">Rank</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="department" id="department" type="text" class="validate" value="<?php echo$row['department'] ?>"  required>
                            <label for="department">Department</label>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('select').formSelect();
                        });
                    </script>
                        <?php if($rowr['role'] == 'approver'){
                                ?><div class="row">
                                <div class="input-field col s12">
                                    <input name="rank_approver" id="rank_approver" type="text" class="validate" value="<?php echo$row['APrank'] ?>" required>
                                    <label for="rank">Rank Approver</label>
                                </div>
                                <!-- <div class="input-field col s6">
                                    <input name="license" id="license" type="text" class="validate" required>
                                    <label for="department">License</label>
                                </div> -->
                                <div class="input-field col s12">
                                        <div class="file-field input-field" id="license">
                                            <div class="btn">
                                                <span>อัพโหลดรูปลายเซ็นต์</span>
                                                <input type="file" multiple class="validate" required>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Upload License" name="license" required>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <?php }else if($rowr['role'] == 'driver'){ ?>
                                <div class="file-field input-field" >
                            <div class="btn">
                                <span>อัพโหลดรูปภาพ</span>
                                <input type="file" multiple required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="image" type="text" placeholder="Upload one or more files"required>
                            </div>
                        </div>
                          <?php  } ?>
                
                            </form>
                       
                </div>
            </div>
        </div>
        <!-- <input type="text" name="rank_approver" value="rank_approver">
                        <input type="text" name="license" value="license"> -->
    </form>
    <div class="center-align">
        <button type="submit" form="ee" class="btn waves-effect waves-light">ยืนยัน
            <i class="material-icons right">done</i>
        </button>
        <!-- <button type="" form="" class="btn red darken-4-effect red darken-4-light">ลบข้อมูล
            <i class="material-icons right">delete_forever</i>
        </button> -->
    </div>
    <br><br>
</body>

</html>