<?php
require './../server.php';
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header("location:./../login.php");
    exit();
}
$sql = "SELECT color,brand,image,version,license FROM car";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
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

    <title>เพิ่มข้อมูลคนขับรถ</title>
</head>

<body>
    <nav class="teal lighten-3" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="admin_page.php" class="brand-logo">Admin Page</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="admin_page.php">กลับ</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav">
                <br><br>
                <li><a href="admin_add_user.php">เพิ่มข้อมูลผู้ใช้</a></li>
                <li><a href="admin_edit_user.php">แก้ไขข้อมูลผู้ใช้</a></li>
                <li><a href="admin_add_driver.php">เพิ่มข้อมูลคนขับรถ</a></li>
                <li><a href="admin_edit_driver.php">แก้ไขข้อมูลคนขับรถ</a></li>
                <li><a href="admin_check_status.php">ตรวจสถานะคำร้อง</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <form action="add_car2.php" id="ee" method="POST">
        <!-- เริ่มต้นแบบฟอร์ม -->
        <div class="container">
            <!-- หัวกระดาษ -->
            <div class="content border border-secondary mt-3 pb-1 pt-1">
                <div class="m-4">
                    <h5 class="text-center">เพิ่มข้อมูลรถ<br></h5>
                </div>
            </div><!-- จบหัวกระดาษ -->

            <div class="row">
                <div class="col s12">
                    <h6><b>กรุณา</b> กรอกข้อมูลทั้งหมดตามความเป็นจริง</h6>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="car_brand" id="car_brand" type="text" class="validate" value="<?php echo$row['brand'] ?>" required>
                            <label for="car_brand">ยี่ห้อ</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="car_version" id="car_version" type="text" class="validate" value="<?php echo$row['version'] ?>" required>
                            <label for="car_version">รุ่น</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="car_color" id="car_color" type="text" class="validate" value="<?php echo$row['color'] ?>" required>
                            <label for="car_color">สีของรถ</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="car_number" id="car_number" type="text" class="validate" value="<?php echo$row['license'] ?>" required>
                            <label for="car_number">ทะเบียนรถ</label>
                        </div>
                    </div>
                        
                            <div class="file-field input-field" name="carimage">
                                <div class="btn">
                                    <span>อัพโหลดรูปภาพ</span>
                                    <input type="file" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload one or more files" required>
                                </div>
                            </div>
                        <!-- </form> -->
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
    </div><br><br><br>
    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });
    </script>
</body>

</html>