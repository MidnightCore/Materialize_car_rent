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

    <title>เช็คคำร้องขอ</title>
</head>

<body>
    <nav class="teal lighten-3" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="admin_page.php" class="brand-logo">Dashboard</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="admin_add_user.php">เพิ่มข้อมูลผู้ใช้</a></li>
                <li><a href="admin_add_driver.php">เพิ่มข้อมูลคนขับรถ</a></li>
                <li><a href="admin_add_car.php">เพิ่มข้อมูลรถ</a></li>
                <li><a href="admin_check_status.php">ตรวจสถานะคำร้อง</a></li>
                <li><a href="http://localhost/phpmyadmin/db_structure.php?server=1&db=materialize_car_rent" target="_blank">phpMyAdmin</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav">
                <br><br>
                <li><a href="admin_add_user.php">เพิ่มข้อมูลผู้ใช้</a></li>
                <li><a href="admin_add_driver.php">เพิ่มข้อมูลคนขับรถ</a></li>
                <li><a href="admin_add_car.php">เพิ่มข้อมูลรถ</a></li>
                <li><a href="admin_check_status.php">ตรวจสถานะคำร้อง</a></li>
                <li><a href="http://localhost/phpmyadmin/db_structure.php?server=1&db=materialize_car_rent" target="_blank">phpMyAdmin</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <div class="container">
    <br>
        <h3>สถานะคำขอ</h3>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>คำขอเลขที่</th>
                    <th>วันที่เดินทาง</th>
                    <th>ปลายทาง</th>
                    <th>วันที่กลับ</th>
                    <th>จำนวนคน</th>
                    <th>สถานะ</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>03-Aug-19</td>
                    <td>มหาวิทยาลับศิลปากร วิทยาเขตหัวหิน</td>
                    <td>05-Aug-19</td>
                    <td>2</td>
                    <td>รอการอนุมัติ</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>07-Aug-19</td>
                    <td>มหาวิทยาลัยเอแบค</td>
                    <td>08-Aug-19</td>
                    <td>5</td>
                    <td>รอการอนุมัติ</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>09-Aug-19</td>
                    <td>อิมแพคเมืองทองธานี</td>
                    <td>11-Aug-19</td>
                    <td>11</td>
                    <td>รอการอนุมัติ</td>
                </tr>
            </tbody>
        </table>
    </div>


</body>

</html>