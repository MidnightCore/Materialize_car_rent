<?php
require './../server.php';

session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}else{
    header("location:./../login.php");  
    exit();  
}
$sql = "SELECT * FROM user WHERE user.role != 'admin'";
$result = mysqli_query($connect, $sql);
$alert = 0;
if (isset($_GET['alert'])) {
    $alert = $_GET['alert'];
}
if ($alert == 1) {
    echo "<script>alert('เพิ่มข้อมูลเรียนร้อยแล้วค่ะ');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Admin Page</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <style>
        #lob {
            background color: red;
        }
    </style>
</head>

<body>
    <nav class="teal lighten-3" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="admin_page.php" class="brand-logo">Admin Page</a>
            <!-- เอาปุ่มเพิ่มไว้มุมบนขวา -->
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


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>

    <div class="container">
        <br>
        <div class="row">
            <div class="col 6">
                <h4>รายชื่อ User</h4>
            </div>
            <br>
            <!-- <div class="col 6">
                <div style="text-align:right">
                    <a href="admin_add_user.php" class="btn waves-effect waves-light teal lighten-1 z-depth-4">เพิ่มข้อมูลผู้ใช้</a>
                </div>
            </div> -->
        </div>

        <table class="responsive-table">
            <thead>
                <tr>

                    <th>fname</th>
                    <th>lname</th>
                    <th>role</th>
                    <!-- <th>email</th> -->
                    <th>phone</th>
                    <th>rank</th>
                    <th>department</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) {  ?>

                    <tr>
                        <td><?php echo $row['fname'] ?></td>
                        <td><?php echo $row['lname'] ?></td>
                        <td><?php echo $row['role'] ?></td>
                        <!-- <td><?php echo $row['email'] ?></td> -->
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['rank'] ?></td>
                        <td><?php echo $row['department'] ?></td>
                        <td>
                            <a>
                                <button type="submit" form="ee" class="btn amber darken-4-effect amber darken-4-light">แก้ไข
                                    <i class="material-icons right">border_color</i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a>
                                <button id="lob" type="submit" form="ee" class="btn red accent-4-effect red accent-4-light">ลบ
                                    <i class="material-icons right">close</i>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>



            </tbody>
        </table>
        <br><br><br>
    </div>
</body>

</html>