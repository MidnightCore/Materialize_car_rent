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

    <title>Approver Page</title>
</head>

<body>
    <nav class="teal lighten-3" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="admin_page.php" class="brand-logo">Approver Page</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">เพิ่มข้อมูลผู้ใช้</a></li>
                <li><a href="#">แก้ไขข้อมูลผู้ใช้</a></li>
                <li><a href="#">เพิ่มข้อมูลคนขับรถ</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav">
                <br><br>
                <li><a href="#">เพิ่มข้อมูลผู้ใช้</a></li>
                <li><a href="#">แก้ไขข้อมูลผู้ใช้</a></li>
                <li><a href="#">เพิ่มข้อมูลคนขับรถ</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>



    <div class="container">
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


        <!-- ส่วนของเจ้าหน้าที่ -->
        <br><br>
        <h6><b>คำอนุญาติ</b> ให้บริการจองรถตู้</h6>
        <p>
            <label>
                <input name="can_go" type="radio" value="agree" required />
                <span>สามารถให้บริการรถยนต์ได้</span>
            </label>
        </p>
        <p>
            <label>
                <input name="can_go" type="radio" value="not_agree" required />
                <span>ไม่สามารถให้บริการรถยนต์ได้</span>
            </label>
        </p>
        <div>
            <p>เนื่องจาก <input type="text" class="reason"></p>
            <p>โดยมีพนักงานขับรถยนต์ ชื่อ <input name="driver_name" type="text" class="phone_num"></p>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input name="driver_car" id="cartype" type="text" class="validate">
                <label for="cartype">ขับรถ (ประเภทรถ)</label>
            </div>
            <div class="input-field col s6">
                <input name="driver_carid" id="carnum" type="text" class="validate">
                <label for="carnum">หมายเลขทะเบียนรถ</label>
            </div>
        </div>
        <div class="row">
            <div class="col s6 offset-s6">
                <div class="input-field inline">
                    <input name="license_agent" id="name_agent" type="text" class="validate">
                    <label for="name_agent">ลงชื่อ</label>
                    <span class="helper-text" data-error="wrong" data-success="right">เจ้าหน้าที่ฝ่ายยานพาหนะ</span>
                </div>
            </div>
        </div>
        <div class="center-align">
            <button type="submit" form="nukKaew" class="btn waves-effect waves-light">ยืนยันคำขอ
                <i class="material-icons right">done</i>
            </button>

            <button type="submit" form="" class="btn red darken-4 waves-effect waves-red">ปฏิเสธคำขอ
                <i class="material-icons right">clear</i>
            </button>
        </div><br><br>
        <!-- จบส่วนของเจ้าหน้าที่ -->

    </div>
</body>

</html>