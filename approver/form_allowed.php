<?php
require './../server.php';

session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    if (isset($_GET)) {
        $id_rentform = base64_decode($_GET['d']);
        echo $id_rentform;
    }
} else {
    header("location:./../login.php");
    exit();
}

// เลือกแร้งคนตรวจ
$sql = "SELECT approver.rank,fname,lname FROM user,approver WHERE user.role = 'approver' AND approver.user_id = user.id AND user.id = '$id'";
$result = mysqli_query($connect, $sql);
$row_approver = mysqli_fetch_array($result);
$rank_ap = $row_approver['rank'];

// เลือกฟอร์มออมาโชว์
$rent_form = "SELECT user.id, fname, lname, rent_form.phone, date_go, date_back, rank, request, 
department, references_id, rent_form.id, note, people, place, rent_form.phone
AS id_rent, rent_form.count, place, created_at
FROM `rent_form`, `user`,`driver_rent` 
WHERE rent_form.user_id = user.id 
AND driver_rent.rent_form_id = rent_form.id 
AND driver_rent.approver_id 
IN(SELECT id FROM `approver` WHERE rank = '$rank_ap')
ORDER BY rent_form.id ASC";

$result_rent_form = mysqli_query($connect, $rent_form);
$row_rent_form = mysqli_fetch_array($result_rent_form);
// print_r($row_rent_form);

$searchcar = "SELECT license FROM car WHERE driver_id IS NULL";
$resultcar = mysqli_query($connect, $searchcar);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>แสดงการยื่นฟอร์มจองรถ</title>

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
    <form action="rentform.php" id="nukKaew" method="POST">
        <!-- เริ่มต้นแบบฟอร์ม -->
        <div class="container">
            
            <div class="content border border-secondary mt-3 pb-1 pt-1">
                <div class="m-4"><br>
                <h1></h1>
                    <h4 class="text-center">สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์<br>
                        <h5 class="text-center">แบบฟอร์ม : ขออนุญาติใช้ยานพาหนะในเขตกรุงเทพฯและปริมณฑล</h5>
                    </h4>
                </div>
            </div><br>
            


            <div class="row">
                <div class="input-field col s6">
                    <p>ขอบเขตการเดินทาง<input type="text" name="place" class="P_80 mt-2" value="<?php echo $row_rent_form['count'] ?>" required readonly></p>
                </div>
                <div class="input-field col s6">
                    <p>วันที่กรอกแบบฟอร์ม<input type="text" name="place" class="P_80 mt-2" value="<?php echo $row_rent_form['created_at'] ?>" required readonly></p>
                </div>
            </div>



            <div class="row">
                <div class="col s12">
                    <!-- ส่วนของรายละเอียดชื่อ -->
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="first_name" id="first_name" type="text" class="want" value="<?php echo $row_rent_form['fname'] ?>" required readonly>
                            <label for="first_name">ชื่อจริง</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" id="last_name" type="text" class="want" value="<?php echo $row_rent_form['lname'] ?>" required readonly>
                            <label for="last_name">นามสกุล</label>
                        </div>
                    </div>
                    <div class="input-field"></div>
                    <p>อ้างอิง(หัวหน้าที่ดำเนินเรื่องขอใช้รถตู้ ถ้าเบิกเองใส่ชื่อตัวเอง)</p>
                    <input type="text" name="want" class="want" value="<?php echo $row_rent_form['references_id'] ?>" required readonly>
                </div>


                <div class="row">
                    <div class="input-field col s6">
                        <input name="rank" id="rank" type="text" class="want" value="<?php echo $row_rent_form['rank'] ?>" required readonly>
                        <label for="rank">ตำแหน่ง (ของผู้กรอกแบบฟอร์ม)</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="zone" id="zone" type="text" class="want" value="<?php echo $row_rent_form['department'] ?>" required readonly>
                        <label for="zone">สังกัด (ของผู้กรอกแบบฟอร์ม)</label>
                    </div>
                </div>
                <!-- จบส่วนของรายละเอียดชื่อ -->



                <!-- script dropdown -->
                <script>
                    $(document).ready(function() {
                        $('select').formSelect();
                    });
                </script>



                <!-- ส่วนของสถานที่ -->
                <p>มีความประสงค์จะขอใช้รถยนต์ของสำนักวิชาการศึกษาทั่วไปฯ เพื่อไปราชการเกี่ยวกับ</p>
                <input type="text" name="want" class="want" value="<?php echo $row_rent_form['request'] ?>" required readonly>

                <div class="row">
                    <div class="input-field col s6">
                        <p>สถานที่ไป<input type="text" name="place" class="want" value="<?php echo $row_rent_form['place'] ?>" required readonly></p>
                    </div>
                    <div class="input-field col s6">
                        <p>จำนวนคน<input type="text" name="people" class="want" value="<?php echo $row_rent_form['people'] ?>" required readonly></p>
                    </div>
                </div>
                <!-- จบส่วนของสถานที่ -->



                <!-- วันที่ในการเดินทางไปกลับ -->
                <p>วันเวลาในการเดินทาง (ไป และ กลับ)</p>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="date_go" id="date_go" type="datetime" class="want" value="<?php echo $row_rent_form['date_go'] ?>" required readonly>
                    </div>
                    <div class="input-field col s6">
                        <input name="date_back" id="date_back" type="datetime" class="want" value="<?php echo $row_rent_form['date_back'] ?>" required readonly>
                    </div>
                </div>



                <!-- หมายเหตุ -->
                <div>
                    <p>หมายเหตุ<input name="note" id="note" type="text" class="want" value="<?php echo $row_rent_form['note'] ?>" required readonly></p>
                    <p>กรณีมีปัญหาสามารถติดต่อกลับได้ที่เบอร์โทรนี้<input name="phone" id="phone" type="text" class="want" value="<?php echo $row_rent_form['phone'] ?>" required readonly></p>
                </div><br>
                <!-- จบหมายเหตุ -->



                <!-- ลงชื่อคนขออณุญาติ -->
                <div class="row">
                    <div class="col s6 offset-s6">
                        <!-- ลงชื่อ : -->
                        <div class="input-field inline">
                            <input name="license_user" id="name_ask" type="text" class="want" value="<?php echo $row_rent_form['fname'] . " " . $row_rent_form['lname'] ?>" required readonly>
                            <label for="name_ask">ลงชื่อ</label>
                            <span class="helper-text" data-error="wrong" data-success="right">ผู้ขออนุญาติ</span>
                        </div>
                    </div>
                </div><br>
                <!-- จบลงชื่อคนขออณุญาติ -->
            </div>
        </div>
    </form>



    <!-- เลือกรถ -->
    <form action="add_cartodriver.php" method="POST">
        <div class="container">
            <div class="input-field col s12">
                <select name="cartodriver" required>
                    <option disabled selected>เลือกรถ</option>
                    <?php while ($rowcar = mysqli_fetch_array($resultcar)) { ?>
                        <option> <?php echo $rowcar['license'] ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo base64_encode($id) ?>">
    </form><br><br>



    <div class="center-align">
        <button type="submit" form="" id="but3" class="btn orange darken-4-effect light">อนุญาติ
            <i class="material-icons right">done</i>
        </button>
        <a href="approver_page.php" id="but3" class="waves-effect waves-light btn">ย้อนกลับ</a>
    </div><br><br>


</body>

</html>