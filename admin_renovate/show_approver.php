<?php
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header("location:login.php");
}
require './../server.php';
$sql = "SELECT * FROM user WHERE user.role = 'approver'";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

    <div class="container">
        <div class="row">
            <div class="col 6">
                <br><br>
                <div style="text-align:left">
                    <a href="admin_add_approver.php" class="btn waves-effect waves-light teal lighten-1 z-depth-4">เพิ่ม approver</a>
                </div>
            </div>
            <div class="col 6">
                <br><br>
                <div style="text-align:right">
                    <a href="admin_page.php" class="btn waves-effect waves-light teal lighten-1 z-depth-4">กลับ</a>
                </div>
            </div>
            <br><br><br><br>
            <table class="responsive-table">
                <thead>
                    <tr>

                        <th>fname</th>
                        <th>lname</th>
                        <th>role</th>
                        <th>email</th>
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
                            <td><?php echo $row['email'] ?></td>
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
        </div>
    </div>
</body>

</html>