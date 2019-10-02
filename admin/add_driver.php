<?php
require './../server.php';
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header("location:./../login.php");
    exit();
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

    <title>เพิ่มข้อมูลผู้ใช้</title>
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


    <form action="add_user2.php" id="ee" method="POST">

        <!-- เริ่มต้นแบบฟอร์ม -->
        <div class="container">
            <!-- หัวกระดาษ -->
            <div class="content border border-secondary mt-3 pb-1 pt-1">
                <div class="m-4">
                    <!-- <h2>เพิ่มใส่รูปช่องคนขับรถงับ<br>เก็บเป็นไฟล์ -->
                    </h2>
        
                    <h5 class="text-center">เพิ่มข้อมูลผู้ใช้<input type="hidden" name="role" value="driver"><br></h5>
                </div>
            </div><!-- จบหัวกระดาษ -->

            <div class="row">
                <div class="col s12">
                    <h6><b>กรุณา</b> กรอกข้อมูลทั้งหมดตามความเป็นจริง</h6>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="first_name" id="first_name" type="text" class="validate" required>
                            <label for="first_name">ชื่อจริง</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" id="last_name" type="text" class="validate"required>
                            <label for="last_name">นามสกุล</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="user_id" id="user_id" type="text" class="validate"required>
                            <label for="user_id">ชื่อผู้ใช้</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="user_password" id="user_password" type="text" class="validate"required>
                            <label for="user_password">รหัสผ่าน</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="Phone_num" id="Phone_num" type="text" class="validate"required>
                            <label for="Phone_num">เบอร์โทรศัพท์</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="user_email" id="user_email" type="text" class="validate"required>
                            <label for="user_email">อีเมลล์</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="rank" id="rank" type="text" class="validate"required>
                            <label for="rank">Rank</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="department" id="department" type="text" class="validate"required>
                            <label for="department">Department</label>
                        </div>
                    </div>

                    <!-- <input type="text" name="image" id=""> -->

                    <form action="#">
                        <div class="file-field input-field" >
                            <div class="btn">
                                <span>อัพโหลดรูปภาพ</span>
                                <input type="file" multiple required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="image" type="text" placeholder="Upload one or more files"required>
                            </div>
                        </div>
                    </form>







                    <script>
                        $(document).ready(function() {
                            $('select').formSelect();
                        });
                    </script>

                </div>
            </div>
        </div>
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