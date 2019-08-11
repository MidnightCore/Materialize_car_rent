<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>แบบฟอร์มจองรถ</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

    <style>
        #but3 {
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="index.html" class="brand-logo">Home</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="calender.php">ตรวจเช็คตารางรถ</a></li>
                <li><a href="rentform.php">แบบฟอร์มจองรถ</a></li>
                <li><a href="history.php">ประวัติการใช้งาน</a></li>
                <li><a href="checkstatus.php">ตรวจสอบสถานะคำขอ</a></li>
                <li><a href="login.php">ออกจากระบบ</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <br><br>
                <li><a href="calender.php">ตรวจเช็คตารางรถ</a></li>
                <li><a href="rentform.php">แบบฟอร์มจองรถ</a></li>
                <li><a href="history.php">ประวัติการใช้งาน</a></li>
                <li><a href="checkstatus.php">ตรวจสอบสถานะคำขอ</a></li>
                <li><a href="login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>


    <form action="#">
        <!-- เริ่มต้นแบบฟอร์ม -->
        <div class="container">

            <!-- หัวกระดาษ -->
            <div class="content border border-secondary mt-3 pb-1 pt-1">
                <div class="m-4"><br>
                    <h4 class="text-center">สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์<br>
                        <h5 class="text-center">แบบฟอร์ม : ขออนุญาติใช้ยานพาหนะในเขตกรุงเทพฯและปริมณฑล</h5>
                    </h4>
                </div>
            </div><br><br><!-- จบหัวกระดาษ -->



            <div class="row">
                <div class="input-field col s6">
                    <!-- ปุ่มกลมๆให้เลือก -->
                    <p> <label>
                            <input name="county" type="radio" value="Bangkok" required />
                            <span>กรุงเทพฯและปริมณฑล </span>
                        </label>
                        <label>
                            <input name="county" type="radio" value="Other" required />
                            <span>ต่างจังหวัด </span>
                        </label>
                    </p>
                </div><!-- จบปุ่มกลมๆให้เลือก -->

                <div class="input-field col s6">
                    <!-- เลือกวันที่กรอก -->
                    <input type="text" class="datepicker" placeholder="วัน/เดือน/ปี (ที่กรอกแบบฟอร์ม)">
                </div>
            </div><!-- จบเลือกวันที่กรอก -->



            <!-- scriptของเลือกวันที่ -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('.datepicker');
                    var instances = M.Datepicker.init(elems, options);
                });
                // Or with jQuery
                $(document).ready(function() {
                    $('.datepicker').datepicker();
                });
            </script><!-- จบscriptของเลือกวันที่ -->



            <div class="row">
                <form class="col s12">
                    <h6><b>เรียน</b> ผู้อำนวยการสำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทอรนิกส์</h6>


                    <!-- ส่วนของกรอกรายละเอียดชื่อ -->
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate">
                            <label for="first_name">ชื่อจริง</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">นามสกุล</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="rank" type="text" class="validate">
                            <label for="rank">ตำแหน่ง (ของผู้กรอกแบบฟอร์ม)</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="zone" type="text" class="validate">
                            <label for="zone">สังกัด (ของผู้กรอกแบบฟอร์ม)</label>
                        </div>
                    </div>
                    <!-- จบส่วนของกรอกรายละเอียดชื่อ -->



                    <!-- ส่วนของสถานที่ -->
                    <p>มีความประสงค์จะขอใช้รถยนต์ของสำนักวิชาการศึกษาทั่วไปฯ เพื่อไปราชการเกี่ยวกับ</p>
                    <input type="text" name="want" class="want">
                    <div class="row">
                        <div class="input-field col s6">
                            <p>สถานที่ไป<input type="text" name="place" class="P_80 mt-2"></p>
                        </div>
                        <div class="input-field col s6">
                            <p class="text-right mt-3">จำนวนคนที่ไป<input type="number" name="people" class="people_num"></p>
                        </div>
                    </div>
                    <!-- จบส่วนของสถานที่ -->



                    <!-- วันที่ในการเดินทางไปกลับ -->
                    <p>โดยมีวันเวลาในการเดินทางดังนี้</p>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" class="datepicker" placeholder="วันที่ไป">
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="timepicker" placeholder="เวลา">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" class="datepicker" placeholder="วันที่กลับ">
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="timepicker" placeholder="เวลา">
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var elems = document.querySelectorAll('.timepicker');
                            var instances = M.Timepicker.init(elems, options);
                        });
                        // Or with jQuery
                        $(document).ready(function() {
                            $('.timepicker').timepicker();
                        });
                    </script>
                    <!-- จบวันที่ในการเดินทางไปกลับ -->



                    <!-- หมายเหตุ -->
                    <div>
                        <p>หมายเหตุ <input type="text" class="reason"></p>
                        <p>กรณีมีปัญหาสามารถติดต่อกลับได้ที่เบอร์โทรนี้<input type="text" class="phone_num"></p>
                    </div><br>
                    <!-- จบหมายเหตุ -->



                    <!-- ลงชื่อคนขออณุญาติ -->
                    <div class="row">
                        <div class="col s6 offset-s6">
                            <!-- ลงชื่อ : -->
                            <div class="input-field inline">
                                <input id="name_ask" type="text" class="validate">
                                <label for="name_ask">ลงชื่อ</label>
                                <span class="helper-text" data-error="wrong" data-success="right">ผู้ขออนุญาติ</span>
                            </div>
                        </div>
                    </div><br><br><br>
                    <!-- จบลงชื่อคนขออณุญาติ -->



                    <!-- ส่วนของเจ้าหน้าที่ -->
                    <h6><b>ส่วนนี้</b> เฉพาะเจ้าหน้าที่</h6>
                    <p>
                        <label>
                            <input name="group1" type="radio" value="agree" required />
                            <span>สามารถให้บริการรถยนต์ได้</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="group1" type="radio" value="not_agree" required />
                            <span>ไม่สามารถให้บริการรถยนต์ได้</span>
                        </label>
                    </p>
                    <div>
                        <p>เนื่องจาก <input type="text" class="reason"></p>
                        <p>โดยมีพนักงานขับรถยนต์ ชื่อ <input type="text" class="phone_num"></p>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="cartype" type="text" class="validate">
                            <label for="cartype">ขับรถ (ประเภทรถ)</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="carnum" type="text" class="validate">
                            <label for="carnum">หมายเลขทะเบียนรถ</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 offset-s6">
                            <div class="input-field inline">
                                <input id="name_agent" type="text" class="validate">
                                <label for="name_agent">ลงชื่อ</label>
                                <span class="helper-text" data-error="wrong" data-success="right">เจ้าหน้าที่ฝ่ายยานพาหนะ</span>
                            </div>
                        </div>
                    </div>
                    <!-- จบส่วนของเจ้าหน้าที่ -->


                </form>
            </div>
        </div>
    </form>

    <div class="center-align">
        <a href="#" id="but3" class="waves-effect waves-light btn">ยืนยัน</a>
        <a href="index.html" id="but3" class="waves-effect waves-light btn">กลับหน้าหลัก</a>
    </div><br><br>
</body>

</html>