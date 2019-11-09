<?php
session_start();
require '../server/server.php';
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT rent_form.created_at,date_back, rent_form.place, rent_form.request, rent_form.place, approve_form.status, approve_form.note
    FROM user, rent_form, driver_rent,approve_form
    WHERE rent_form.user_id = user.id AND driver_rent.rent_form_id = rent_form.id 
    AND approve_form.rent_form_id = rent_form.id AND user.id = '$id'
    AND driver_rent.approver_id IS NOT NULL 
    ORDER BY created_at DESC";
    $result = mysqli_query($connect, $sql);
} else {
    header("location:../login.php");
    exit();
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
                <?php while ($row = mysqli_fetch_array($result)) {  ?>

                    <tr>
                        <td><?php echo $row['created_at'] ?></td>
                        <td><?php echo $row['date_back'] ?></td>
                        <td><?php echo $row['request'] ?></td>
                        <td><?php echo $row['place'] ?></td>
                        <td style="color:red"><?php echo $row['note']." ".$row['status'] ?></td>
                        <!-- <td>
                        <a href="../tcpdf/create_pdf.php" target="_blank" class="btn waves-effect waves-light teal lighten-1 z-depth-4">PDF
                        </a>
                        <form method="POST" target="_blank">
                            <input type="submit" name="create_pdf" class="btn waves-effect waves-light teal lighten-1 z-depth-4" value="PDF">
                        </form> 
                    </td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>




</body>

</html>
