<?php
session_start();
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
} else {
    header("location:../login.php");
    exit();
}
require '../server/server.php';
$sql = "SELECT user.fname,user.lname,phone,user.rank,department FROM user WHERE user.id='$user_id'";
$result = mysqli_query($connect, $sql);
$name = mysqli_fetch_array($result);
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-j H:i:s");

$references_id = "SELECT fname,lname,id FROM user WHERE role = 'user' ORDER BY fname ASC";
$result_references = mysqli_query($connect, $references_id);
?>

<!-- Create PDF -->
<?php
function fetch_data()
{
    $output = '';
    require "server/server.php";
    $query = "SELECT * FROM user ORDER BY first_name ASC";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
            <tr>
            <td>' . $row["want"] . '</td>
            <td>' . $row["place"] . '</td>
            <td>' . $row["county"] . '</td>
            <td>' . $row["people"] . '</td>
            <td>' . $row["date_go"] . '</td>
            <td>' . $row["time_go"] . '</td>
            <td>' . $row["date_back"] . '</td>
            <td>' . $row["time_back"] . '</td>
            </tr>
        ';
    }
    return $output;
}
if (isset($_POST["create_pdf"])) {
    require_once('../tcpdf/tcpdf.php');
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("สรุปรายละเอียดการจองรถ");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 12);
    $obj_pdf->AddPage();
    $content = '';
    $content .= '  
    <h3 align="center">Summary of car booking details</h3><br /><br />  
    <table border="1" cellspacing="0" cellpadding="5">  
         <tr>  
            <th width="15%">First Name</th>
            <th width="15%">Last Name</th>
            <th width="15%">ID</th>
            <th width="15%">Password</th>
            <th width="15%">Phone Num</th>
            <th width="15%">Email</th>
            <th width="15%">Role</th>
         </tr>  
    ';
    $content .= fetch_data();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('ResultRentCarOrder.pdf', 'I');
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>แบบฟอร์มจองรถ</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>

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



    <form action="rentform.php" id="nukKaew" method="POST">
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
                    <input name="date_write" type="text" placeholder="วัน/เดือน/ปี (ที่กรอกแบบฟอร์ม)" value="<?php echo date("l j m Y H:i:s") ?>" readonly>
                </div>
            </div><!-- จบเลือกวันที่กรอก -->



            <div class="row">
                <div class="col s12">
                    <h6><b>เรียน</b> ผู้อำนวยการสำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทอรนิกส์</h6>
                    <!-- ส่วนของกรอกรายละเอียดชื่อ -->
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="first_name" id="first_name" type="text" class="validate" value="<?php echo $name['fname'] ?>" required readonly>
                            <label for="first_name">ชื่อจริง</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" id="last_name" type="text" class="validate" value="<?php echo $name['lname'] ?>" required readonly>
                            <label for="last_name">นามสกุล</label>
                        </div>
                    </div>
                    <!-- <p>อ้างอิง(หัวหน้าที่ดำเนินเรื่องขอใช้รถตู้ ถ้าเบิกเองใส่ชื่อตัวเอง)<input type="text" class="" name="references_id" required></p> -->
                    <div class="input-field"><br><br>
                        <label>อ้างอิง(หัวหน้าที่ดำเนินเรื่องขอใช้รถตู้ ถ้าเบิกเองใส่ชื่อตัวเอง)<b style="color:red">**</b></label>
                        <select type="text" name="references_id" class="people_num" required>
                            <option value="" disabled selected>อ้างอิง(หัวหน้าที่ดำเนินเรื่องขอใช้รถตู้ ถ้าเบิกเองใส่ชื่อตัวเอง)</option>
                            <?php while ($row_rfr = mysqli_fetch_array($result_references)) { ?>
                                <option value="<?php echo $row_rfr['fname'] . " " . $row_rfr['lname'] ?>"><?php echo $row_rfr['fname'] . " " . $row_rfr['lname'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="rank" id="rank" type="text" class="validate" value="<?php echo $name['rank'] ?>" required readonly>
                            <label for="rank">ตำแหน่ง (ของผู้กรอกแบบฟอร์ม)</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="zone" id="zone" type="text" class="validate" value="<?php echo $name['department'] ?>" required readonly>
                            <label for="zone">สังกัด (ของผู้กรอกแบบฟอร์ม)</label>
                        </div>
                    </div>
                    <!-- จบส่วนของกรอกรายละเอียดชื่อ -->



                    <!-- script dropdown -->
                    <script>
                        $(document).ready(function() {
                            $('select').formSelect();
                        });
                    </script>



                    <!-- ส่วนของสถานที่ -->
                    <p>มีความประสงค์จะขอใช้รถยนต์ของสำนักวิชาการศึกษาทั่วไปฯ เพื่อไปราชการเกี่ยวกับ<b style="color:red">**</b></p>
                    <input type="text" name="want" class="want" required>
                    <div class="row">
                        <div class="input-field col s6">
                            <p>สถานที่ไป<b style="color:red">**</b><input type="text" name="place" class="P_80 mt-2" required></p>
                        </div>
                        <div class="input-field col s6"><br><br>
                            <label>เลือกจำนวน<b style="color:red">**</b></label>
                            <select type="text" name="people" class="people_num" required>
                                <option value="" disabled selected></option>
                                <option value="0-3">0-3</option>
                                <option value="4-6">4-6</option>
                                <option value="7-9">7-9</option>
                                <option value="10-13">10-13</option>
                            </select>
                        </div>
                        <!-- <div class="input-field col s6">
                            <p class="text-right mt-3">จำนวนคนที่ไป<input type="number" name="people" class="people_num" required></p>
                        </div> -->
                    </div>
                    <!-- จบส่วนของสถานที่ -->



                    <!-- วันที่ในการเดินทางไปกลับ -->
                    <p>โดยมีวันเวลาในการเดินทางดังนี้<b style="color:red">**</b></p>
                    <h5 id="pp">
                        </h4>
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="date_go" type="text" class="datepicker" placeholder="วันที่ไป" id="date_goo" required readonly>
                            </div>
                            <div class="input-field col s6">
                                <input name="time_go" type="text" class="timepicker" placeholder="เวลา" id="time_goo" required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="date_back" type="text" class="datepicker" placeholder="วันที่กลับ" id="dateback" required readonly>
                            </div>
                            <div class="input-field col s6">
                                <input name="time_back" type="text" class="timepicker" placeholder="เวลา" id="timeback" required readonly>
                            </div>
                        </div>



                        <script>
                            $(document).ready(function() {
                                // console.log('i ');
                                $('#pp').text("กรุณากรอกวันเวลาที่จะไป");
                                $('#dateback').hide();
                                $('#timeback').hide();
                            });

                            function checktime() {
                                var datego = $('#date_goo').val();
                                var timego = $('#time_goo').val();
                                var dateback = $('#dateback').val();
                                var timeback = $('#timeback').val();

                                var datetimego = datego + " " + timego + ":00";
                                var datetimeback = dateback + " " + timeback + ":00";
                                var datesum = DateTimeDiff(datetimego, datetimeback);
                                if (datesum <= 0.0415) {
                                    alert("ต้องใช้รถอย่างน้อย 1 ชั่วโมงค่ะ");
                                    $('#timeback').val("");
                                } else {

                                }
                            }
                            $("#dateback").change(function() {
                                // console.log('i++ :', i++);
                                if (i == j || i > 1) {
                                    checktime();
                                }
                            });
                            $("#timeback").change(function() {
                                // console.log('j++ :', j++);
                                if (i == j || j > 1) {
                                    checktime();
                                }
                            });

                            function DateTimeDiff(strDateTime1, strDateTime2) {
                                return (Date.parse(strDateTime2) - Date.parse(strDateTime1)) / (1000 * 60 * 60 * 24); // 1 Hour =  60*60

                            }

                            var i = 0;
                            var j = 0;
                            $("#date_goo").change(function() {
                                // console.log('i++ :', i++);
                                if (i == j || i > 1) {
                                    date();
                                }
                            });
                            $("#time_goo").change(function() {
                                // console.log('j++ :', j++);
                                if (i == j || j > 1) {
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
                                    } else {
                                        $('#dateback').show();
                                        $('#timeback').show();
                                        $('#pp').text("");
                                    }
                                }
                            }
                        </script>



                        <!-- scriptเลือกวันที่ -->
                        <script>
                            $(document).ready(function() {
                                $('.datepicker').datepicker();
                            });
                            $(document).ready(function() {
                                $('.timepicker').timepicker();
                            });
                        </script>



                        <!-- หมายเหตุ -->
                        <div>
                            <p>หมายเหตุ <input type="text" class="reason" name="note"></p>
                            <p>กรณีมีปัญหาสามารถติดต่อกลับได้ที่เบอร์โทรนี้<input name="phone_num" type="text" class="phone_num" value="<?php echo $name['phone'] ?>" required></p>
                        </div><br>
                        <!-- จบหมายเหตุ -->



                        <!-- ลงชื่อคนขออณุญาติ -->
                        <div class="row">
                            <div class="col s6 offset-s6">
                                <!-- ลงชื่อ : -->
                                <div class="input-field inline">
                                    <input name="license_user" id="name_ask" type="text" class="validate" value="<?php echo $name['fname'] . " " . $name['lname'] ?>" required readonly>
                                    <label for="name_ask">ลงชื่อ</label>
                                    <span class="helper-text" data-error="wrong" data-success="right">ผู้ขออนุญาติ</span>
                                </div>
                            </div>
                        </div>
                        <!-- จบลงชื่อคนขออณุญาติ -->
                </div>
            </div>
        </div>
    </form>


    <div class="center-align">
        <!-- <form method="POST" target="_blank">
            <input id="but3" type="submit" name="create_pdf" class="waves-effect  red lighten-1 btn" value="บันทึกเป็น PDF">
        </form><br> -->
        <button type="submit" form="nukKaew" class="btn pulse waves-effect waves-light">ยืนยัน
            <i class="material-icons right">done</i>
        </button>
        <a href="../index.php" id="but3" class="waves-effect waves-light btn">กลับหน้าหลัก</a>
    </div><br><br>

</body>

</html>