<?php
require './../server.php';

session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}else{
    header("location:./../login.php");  
    exit();  
}
// เลือกแร้งคนตรวจ
$sql = "SELECT approver.rank,fname,lname FROM user,approver WHERE user.role = 'approver' AND approver.user_id = user.id AND user.id = '$id'";
$result = mysqli_query($connect, $sql);
$row_approver = mysqli_fetch_array($result);
$rank_ap = $row_approver['rank'];
// เลือกฟอร์มออมาโชว์
$rent_form = "SELECT user.id, fname, lname, rent_form.phone, date_go, date_back, references_id, rent_form.id AS id_rent
FROM `rent_form`, `user`,`driver_rent` 
WHERE rent_form.user_id = user.id AND driver_rent.rent_form_id = rent_form.id AND driver_rent.approver_id IN(SELECT id FROM `approver` WHERE rank = '$rank_ap')
ORDER BY rent_form.id ASC";
$result_rent_form = mysqli_query($connect, $rent_form);

$alert = 0;
if (isset($_GET['alert'])) {
    $alert = $_GET['alert'];
}
if ($alert == 1) {
    echo "<script>alert('เพิ่มข้อมูลเรียบร้อยแล้วค่ะ');</script>";
}else if($alert == 2){
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้วค่ะ');</script>";

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
            <a id="logo-container" href="admin_page.php" class="brand-logo">Approver Page</a>
            <!-- เอาปุ่มเพิ่มไว้มุมบนขวา -->
            <ul class="right hide-on-med-and-down">
                <!-- <li><a href="show_user.php">ข้อมูลUser</a></li>
                <li><a href="show_approver.php">ข้อมูลApprover</a></li>
                <li><a href="show_driver_car.php">ข้อมูลรถและคนขับรถ</a></li>
                <li><a href="request_form.php">ตรวจสถานะคำร้อง</a></li> -->
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav"><br><br>
                <!-- <li><a href="show_user.php">ข้อมูลUser</a></li>
                <li><a href="show_approver.php">ข้อมูลApprover</a></li>
                <li><a href="show_driver_car.php">ข้อมูลรถและคนขับรถ</a></li>
                <li><a href="request_form.php">ตรวจสถานะคำร้อง</a></li> -->
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <!-- <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
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
                <h4>ฟอร์มจองรถตู้ที่คุณสามารถตวจได้</h4>
            </div>
            <br>
        </div>

        <table class="responsive-table">
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>วัน-เวลา ที่ไป</th>
                    <th>วัน-เวลา ที่กลับ</th>
                    <!-- <th>email</th> -->
                    <th>เบอร์ติดต่อ</th>
                    <th>คนดำเนินเรื่อง</th>
                    <!-- <th>department</th> -->
                    <!-- <th>Edit</th> -->
                    <th>ดูรายละเอียด</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($result_rent_form)) {  ?>

                    <tr>
                        <td><?php echo $row['fname']." ".$row['lname'] ?></td>
                        <td><?php echo $row['date_go'] ?></td>
                        <td><?php echo $row['date_back'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['references_id'] ?></td>
                        <td>
                            
                        <a href="form_allowed.php?d=<?php echo base64_encode($row['id_rent'])?>&?@#$^@^$=6DFbdgnwdgWRYen548#$^73422">
                                    <button type="submit" form="ee" class="btn amber darken-4-effect amber darken-4-light">ดูรายละเอียด
                                        <i class="material-icons right">border_color</i>
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