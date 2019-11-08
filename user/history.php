<?php 
require './../server/server.php';
session_start();

if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
    // echo$user_id;
}else{
    header("location:../login.php");
    exit();
}
$sql = "SELECT rent_form.created_at, car.license, rent_form.place,car.brand
        FROM car, user, rent_form, driver_rent 
        WHERE rent_form.user_id = user.id AND driver_rent.rent_form_id = rent_form.id 
        AND driver_rent.driver_id = car.driver_id AND user.id = '$user_id'
        AND driver_rent.approver_id IS NULL 
        ORDER BY created_at DESC";
$result = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ประวัติการใช้งาน</title>

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
        <h4>ประวัติการเดินทางของฉัน</h4><br>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>วันที่จอง</th>
                    <th>รถที่ใช้</th>
                    <th>ทะเบียนรถ</th>
                    <th>ปลายทาง</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) {  ?>

                    <tr>
                        <td><?php echo $row['created_at'] ?></td>
                        <td><?php echo $row['brand'] ?></td>
                        <td><?php echo $row['license'] ?></td>
                        <td><?php echo $row['place'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>



</body>

</html>