<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ตรวจสถานะคำขอ</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</head>

<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="index.php" class="brand-logo">Home</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="calender.php">ตรวจเช็คตารางรถ</a></li>
                <li><a href="form_rentform.php">แบบฟอร์มจองรถ</a></li>
                <li><a href="history.php">ประวัติการใช้งาน</a></li>
                <li><a href="checkstatus.php">ตรวจสอบสถานะคำขอ</a></li>
                <li><a href="login.php">ออกจากระบบ</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <br><br>
                <li><a href="calender.php">ตรวจเช็คตารางรถ</a></li>
                <li><a href="form_rentform.php">แบบฟอร์มจองรถ</a></li>
                <li><a href="history.php">ประวัติการใช้งาน</a></li>
                <li><a href="checkstatus.php">ตรวจสอบสถานะคำขอ</a></li>
                <li><a href="login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>


    <div class="container">
        <br>
        <h4>สถานะคำขอ</h4><br>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>วันที่จอง</th>
                    <th>รถที่ใช้</th>
                    <th>ทะเบียนรถ</th>
                    <th>ปลายทาง</th>
                    <th>สถานะคำขอ</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>01-Aug-19</td>
                    <td>รถตู้</td>
                    <td>กน1234</td>
                    <td>มหาวิทยาลัยเอแบค</td>
                    <td>
                        <form action="checkstatus_now.php" method="post">
                            <input type="hidden" name="id_order" value="<?php echo $row2['id_order'] ?>">
                            <input type="submit" class="btn waves-effect waves-light" value="เช็คสถานะ">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>03-Aug-19</td>
                    <td>รถตู้</td>
                    <td>มส5678</td>
                    <td>โรงเรียนวัดคูบัว จังหวัดราชบุรี</td>
                    <td>
                        <form action="checkstatus_now.php" method="post">
                            <input type="hidden" name="id_order" value="<?php echo $row2['id_order'] ?>">
                            <input type="submit" class="btn waves-effect waves-light" value="เช็คสถานะ">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>05-Aug-19</td>
                    <td>รถตู้</td>
                    <td>ดป6389</td>
                    <td>หมู่บ้านเด็ก จังหวัดกาญจนบุรี</td>
                    <td>
                        <form action="checkstatus_now.php" method="post">
                            <input type="hidden" name="id_order" value="<?php echo $row2['id_order'] ?>">
                            <input type="submit" class="btn waves-effect waves-light" value="เช็คสถานะ">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>




</body>

</html>