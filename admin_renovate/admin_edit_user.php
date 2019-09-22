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

    <title>แก้ไขข้อมูลผู้ใช้</title>
</head>

<body>
    <nav class="teal lighten-3" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="admin_page.php" class="brand-logo">Dashboard</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="admin_add_user.php">เพิ่มข้อมูลผู้ใช้</a></li>
                <li><a href="admin_edit_user.php">แก้ไขข้อมูลผู้ใช้</a></li>
                <li><a href="admin_add_driver.php">เพิ่มข้อมูลคนขับรถ</a></li>
                <li><a href="admin_edit_driver.php">แก้ไขข้อมูลคนขับรถ</a></li>
                <li><a href="admin_check_status.php">ตรวจสถานะคำร้อง</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav">
                <br><br>
                <li><a href="admin_add_user.php">เพิ่มข้อมูลผู้ใช้</a></li>
                <li><a href="admin_edit_user.php">แก้ไขข้อมูลผู้ใช้</a></li>
                <li><a href="admin_add_driver.php">เพิ่มข้อมูลคนขับรถ</a></li>
                <li><a href="admin_edit_driver.php">แก้ไขข้อมูลคนขับรถ</a></li>
                <li><a href="admin_check_status.php">ตรวจสถานะคำร้อง</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>


    <form action="admin_add_user2.php" id="ee" method="POST">
        <!-- เริ่มต้นแบบฟอร์ม -->
        <div class="container">
            <!-- หัวกระดาษ -->
            <div class="content border border-secondary mt-3 pb-1 pt-1">
                <div class="m-4">
                    <h5 class="text-center">เพิ่มข้อมูลผู้ใช้<br></h5>
                </div>
            </div><!-- จบหัวกระดาษ -->

            <div class="row">
                <div class="col s12">
                    <h6><b>กรุณา</b> กรอกข้อมูลทั้งหมดตามความเป็นจริง</h6>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="first_name" id="first_name" type="text" class="validate">
                            <label for="first_name">ชื่อจริง</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" id="last_name" type="text" class="validate">
                            <label for="last_name">นามสกุล</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="user_id" id="user_id" type="text" class="validate">
                            <label for="rank">ชื่อผู้ใช้</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="user_password" id="user_password" type="text" class="validate">
                            <label for="zone">รหัสผ่าน</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="Phone_num" id="Phone_num" type="text" class="validate">
                            <label for="Phone_num">เบอร์โทรศัพท์</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="user_email" id="user_email" type="text" class="validate">
                            <label for="user_email">อีเมลล์</label>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <select name="Role">
                            <option disabled selected>เลือกสถานะผู้ใช้</option>
                            <option>user</option>
                            <option>admin</option>
                        </select>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var elems = document.querySelectorAll('select');
                            var instances = M.FormSelect.init(elems, options);
                        });
                        // Or with jQuery
                        $(document).ready(function() {
                            $('select').formSelect();
                        });
                    </script>

                </div>
            </div>
        </div>
    </form>
    <div class="center-align">
        <button type="submit" form="ee" class="btn pulse  amber darken-4-effect  amber darken-4-light">แก้ไข
            <i class="material-icons right">border_color</i>
        </button>
    </div>

</body>

</html>