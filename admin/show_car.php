<?php
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header("location:./../login.php");
}
require './../server.php';
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
    <title>Show Car</title>

    <!-- CSS  -->
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
                <a href="form_add_car.php" class="btn waves-effect waves-light teal lighten-1 z-depth-4">เพิ่มรถ</a>
                    <!-- ปุ่มดูคนขับ  ปุ่มดูรถที่มี -->
                </div>
            </div>
            <div class="col 6">
                <br><br>
                <div style="text-align:right">
                    <a href="show_driver_car.php" class="btn waves-effect waves-light teal lighten-1 z-depth-4">กลับ</a>
                </div>
            </div>
            <br><br><br><br>
            <table class="responsive-table">
                <thead>
                    <tr>

                        <th>Color</th>
                        <th>Brand</th>
                        <th>Image</th>
                        <th>Version</th>
                        <th>license</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) {  ?>

                        <tr>
                            <td><?php echo $row['color'] ?></td>
                            <td><?php echo $row['brand'] ?></td>
                            <td><?php echo $row['image'] ?></td>
                            <td><?php echo $row['version'] ?></td>
                            <td><?php echo $row['license'] ?></td>
                            <td>
                            <a href="form_edit_car.php?user=<?php echo base64_encode($row['license']) ?>&?!@#^!=<?php echo base64_encode("ASFEBHRWHRYNRaefgqwm98456") ?>">
                                    <button type="submit" class="btn amber darken-4-effect amber darken-4-light">แก้ไข
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