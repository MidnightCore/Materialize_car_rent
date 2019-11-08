<?php
session_start();
require '../server/server.php';
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $rent_form = "SELECT rent_form.id,created_at,car.licen,request,place,approve_form.status,approve_form.note
    FROM rent_form,driver_rent,approve_form,car
    WHERE rent_form.id = driver_rent.rent_form_id AND approve_form.rent_form_id = rent_form.id AND ";
} else {
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ตรวจสถานะคำขอ</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>
</head>

<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="../index.php" class="brand-logo">Home</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="calender.php">ตรวจเช็คตารางรถ</a></li>
                <li><a href="form_rentform.php">แบบฟอร์มจองรถ</a></li>
                <li><a href="history.php">ประวัติการใช้งาน</a></li>
                <li><a href="checkstatus.php">ตรวจสอบสถานะคำขอ</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <br><br>
                <li><a href="calender.php">ตรวจเช็คตารางรถ</a></li>
                <li><a href="form_rentform.php">แบบฟอร์มจองรถ</a></li>
                <li><a href="history.php">ประวัติการใช้งาน</a></li>
                <li><a href="checkstatus.php">ตรวจสอบสถานะคำขอ</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
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
                    <th>วัน/เวลา ที่จอง</th>
                    <th>วัน/เวลา ที่กลับ</th>
                    <th>เหตุผลที่ไป</th>
                    <th>ปลายทาง</th>
                    <th>สถานะคำขอ</th>
                    <th>บันทึก</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>01-Aug-19</td>
                    <td>01-Aug-19</td>
                    <td>01-Aug-19</td>
                    <td>01-Aug-19</td>
                    <td>
                        <a href="checkstatus_now.php" target="_blank" class="btn waves-effect waves-light teal lighten-1 z-depth-4">เช็คสถานะ
                        </a>
                    </td>
                    <td>
                        <a href="../tcpdf/create_pdf.php" target="_blank" class="btn waves-effect waves-light teal lighten-1 z-depth-4">PDF
                        </a>
                        <!-- <form method="POST" target="_blank">
                            <input type="submit" name="create_pdf" class="btn waves-effect waves-light teal lighten-1 z-depth-4" value="PDF">
                        </form> -->
                    </td>
                </tr>
            </tbody>
        </table>
    </div>




</body>

</html>
