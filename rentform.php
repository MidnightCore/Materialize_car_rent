<?php
session_start();
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
} else {
    header("location:login.php");
}
require './server.php';

$sql = "SELECT user.fname,user.lname,phone,user.rank,department FROM user WHERE user.id='$user_id'";
$result = mysqli_query($connect, $sql);
$name = mysqli_fetch_array($result);
// print_r($name);
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-j H:i:s");
?>


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

        .sortable-handler {
            touch-action: none;
        }
    </style>
</head>

<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="index.php" class="brand-logo">Home</a>
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



    <form action="rentform_form.php" id="nukKaew" method="POST">
        <!-- เริ่มต้นแบบฟอร์ม -->
        <div class="container">

            <!-- หัวกระดาษ -->
            <div class="content border border-secondary mt-3 pb-1 pt-1">
                <div class="m-4"><br>
                    <h4 class="text-center">สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์<br>
                        <h5 class="text-center">แบบฟอร์ม : ขออนุญาติใช้ยานพาหนะในเขตกรุงเทพฯและปริมณฑล</h5>
                    </h4>
                </div>
            </div><br><br>
            <!-- จบหัวกระดาษ -->



            <div class="row">
                <!-- ปุ่มกลมๆให้เลือก -->
                <div class="input-field col s6">
                    <p> <label>
                            <input name="county" type="radio" value="Bangkok" required />
                            <span>กรุงเทพฯและปริมณฑล </span>
                        </label>
                        <label>
                            <input name="county" type="radio" value="Other" required />
                            <span>ต่างจังหวัด </span>
                        </label>
                    </p>
                </div>
                <!-- จบปุ่มกลมๆให้เลือก -->

                <!-- เลือกวันที่กรอก -->
                <div class="input-field col s6">
                    <input name="date_write" type="text" placeholder="วัน/เดือน/ปี (ที่กรอกแบบฟอร์ม)"
                        value="<?php echo date("l j m Y H:i:s") ?>" readonly>
                </div>
            </div><!-- จบเลือกวันที่กรอก -->
            <div class="row">
                <div class="col s12">
                    <h6><b>เรียน</b> ผู้อำนวยการสำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทอรนิกส์</h6>
                    <!-- ส่วนของกรอกรายละเอียดชื่อ -->
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="first_name" id="first_name" type="text" class="validate"
                                value="<?php echo $name['fname'] ?>" required>
                            <label for="first_name">ชื่อจริง</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" id="last_name" type="text" class="validate"
                                value="<?php echo $name['lname'] ?>" required>
                            <label for="last_name">นามสกุล</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="rank" id="rank" type="text" class="validate"
                                value="<?php echo $name['rank'] ?>" required>
                            <label for="rank">ตำแหน่ง (ของผู้กรอกแบบฟอร์ม)</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="zone" id="zone" type="text" class="validate"
                                value="<?php echo $name['department'] ?>" required>
                            <label for="zone">สังกัด (ของผู้กรอกแบบฟอร์ม)</label>
                        </div>
                    </div>
                    <!-- จบส่วนของกรอกรายละเอียดชื่อ -->



                    <!-- script dropdown -->
                    <script>
                        // document.addEventListener('DOMContentLoaded', function () {
                        //     var elems = document.querySelectorAll('select');
                        //     var options = document.querySelectorAll('option');
                        //     var instances = M.FormSelect.init(elems, options);
                        // });
                        // Or with jQuery
                        $(document).ready(function () {
                            $('select').formSelect();
                        });
                    </script>



                    <!-- ส่วนของสถานที่ -->
                    <p>มีความประสงค์จะขอใช้รถยนต์ของสำนักวิชาการศึกษาทั่วไปฯ เพื่อไปราชการเกี่ยวกับ</p>
                    <input type="text" name="want" class="want" required>
                    <div class="row">
                        <div class="input-field col s6">
                            <p>สถานที่ไป<input type="text" name="place" class="P_80 mt-2" required></p>
                        </div>
                        <div class="input-field col s6"><br><br>
                            <select type="text" name="people" class="people_num" required>
                                <option value="" disabled selected>จำนวนคนที่ไป</option>
                                <option value="0-3">0-3</option>
                                <option value="4-6">4-6</option>
                                <option value="7-9">7-9</option>
                                <option value="10-13">10-13</option>
                            </select>
                            <label>เลือกจำนวน</label>
                        </div>
                        <!-- <div class="input-field col s6">
                            <p class="text-right mt-3">จำนวนคนที่ไป<input type="number" name="people" class="people_num" required></p>
                        </div> -->
                    </div>
                    <!-- จบส่วนของสถานที่ -->



                    <!-- วันที่ในการเดินทางไปกลับ -->
                    <p>โดยมีวันเวลาในการเดินทางดังนี้</p>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="date_go" type="text" class="datepicker" placeholder="วันที่ไป" id="date_goo"
                                required>
                        </div>
                        <div class="input-field col s6">
                            <input name="time_go" type="text" class="timepicker" placeholder="เวลา" id="time_goo"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="date_back" type="text" class="datepicker" placeholder="วันที่กลับ" id="dateback" required >
                        </div>
                        <div class="input-field col s6">
                            <input name="time_back" type="text" class="timepicker" placeholder="เวลา" id="timeback" required >
                        </div>
                    </div>

                    <script>
                        $(document).ready(function () {
                            console.log('i ');
                            $('#dateback').hide();
                            $('#timeback').hide();
                        });
                        function checktime(){
                            var datego = $('#date_goo').val();
                            var timego = $('#time_goo').val();
                            var dateback = $('#dateback').val();
                            var timeback = $('#timeback').val();

                            var datetimego = datego + " " + timego+":00";
                            var datetimeback = dateback + " " + timeback+":00";
                            var datesum = DateTimeDiff(datetimego,datetimeback);
                            if(datesum <= 0.0415){
                                alert("ต้องใช้รถอย่างน้อย 1 ชั่วโมงค่ะ");
                            }else{

                            }
                        }
                        $("#dateback").change(function () {
                            console.log('i++ :', i++);
                            if(i == j || i > 1){
                                checktime();
                            }                       
                        });
                        $("#timeback").change(function () {
                            console.log('j++ :', j++);
                            if(i == j || j > 1){
                                checktime();
                            }
                        });  
                        
                        function DateTimeDiff(strDateTime1, strDateTime2) {
                            return (Date.parse(strDateTime2) - Date.parse(strDateTime1)) / (1000 * 60 * 60 *24); // 1 Hour =  60*60

                        }

                        var i = 0;
                        var j = 0;
                        $("#date_goo").change(function () {
                            console.log('i++ :', i++);
                            if(i == j || i > 1){
                                date();
                            }                       
                        });
                        $("#time_goo").change(function () {
                            console.log('j++ :', j++);
                            if(i == j || j > 1){
                                date();
                            }
                        });  
                        function date() {
                            var date = $('#date_goo').val();
                            var time = $('#time_goo').val();  
                            var datetime = date + " " + time + ":00";
                            var today = "<?php echo $today ?>";
                            if (date == "" || time == "") {
                                alert("ท่านลืมกรอกวันหรือเวลาค่ะ");
                            } else {
                                var datesum = DateTimeDiff(today, datetime);
                                if (datesum < 2) {
                                    alert("กรุณาทำการจองก่อนล่วงหน้า 2 วันค่ะ");   
                                    $('#dateback').hide();
                                    $('#timeback').hide();
                                }else{
                                    $('#dateback').show();
                                    $('#timeback').show();
                                }
                            }
                        }
                    </script>
                    <!-- scriptเลือกวันที่ -->
                    <script>
                        $(document).ready(function () {
                            $('.datepicker').datepicker();
                        });
                        $(document).ready(function () {
                            $('.timepicker').timepicker();
                        });
                    </script>
                    <!-- หมายเหตุ -->
                    <div onclick="date()">
                        <p>หมายเหตุ <input type="text" class="reason" name="note"></p>
                        <p>อ้างอิง <input type="text" class="" name=""></p>
                        <p>กรณีมีปัญหาสามารถติดต่อกลับได้ที่เบอร์โทรนี้<input name="phone_num" type="text"
                                class="phone_num" value="<?php echo $name['phone'] ?>" required></p>
                    </div><br>
                    <!-- จบหมายเหตุ -->
                    <!-- ลงชื่อคนขออณุญาติ -->
                    <div class="row">
                        <div class="col s6 offset-s6">
                            <!-- ลงชื่อ : -->
                            <div class="input-field inline">
                                <input name="license_user" id="name_ask" type="text" class="validate"
                                    value="<?php echo $name['fname'] . " " . $name['lname'] ?>" required>
                                <label for="name_ask">ลงชื่อ</label>
                                <span class="helper-text" data-error="wrong" data-success="right">ผู้ขออนุญาติ</span>
                            </div>
                        </div>
                    </div><br><br><br>
                    <!-- จบลงชื่อคนขออณุญาติ -->
                </div>
            </div>
        </div>
    </form>
    <div class="center-align">
        <button type="submit" form="nukKaew" class="btn pulse waves-effect waves-light">ยืนยัน
            <i class="material-icons right">done</i>
        </button>
        <a href="index.html" id="but3" class="waves-effect waves-light btn">กลับหน้าหลัก</a>
    </div><br><br>

</body>

</html>
