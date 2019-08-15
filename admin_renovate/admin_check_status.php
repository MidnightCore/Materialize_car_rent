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
</body>
</html>