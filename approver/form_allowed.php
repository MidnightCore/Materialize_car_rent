<?php
require '../server/server.php';
session_start();
$palm = 0;
if (isset($_GET['alert'])) {
    $palm = $_GET['alert'];
}
if ($palm == 1) {
    echo "<script>alert('บันทึกแบบฟอร์มเรียบร้อยค่ะ');history.back();</script>";
}
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    if (isset($_GET)) {
        $id_rentform = base64_decode($_GET['d']);
    }
}else{
    header("location:../login.php");
    exit();
}

// เลือกแร้งคนตรวจ
$sql = "SELECT approver.rank,fname,lname FROM user,approver WHERE user.role = 'approver' AND approver.user_id = user.id AND user.id = '$id'";
$result = mysqli_query($connect, $sql);
$row_approver = mysqli_fetch_array($result);
$rank_ap = $row_approver['rank'];
if($rank_ap >= 1 && $rank_ap < 5){
    $search_name_driver = "SELECT fname, lname FROM user,driver_rent,driver
    WHERE driver_rent.driver_id = driver.id AND driver.user_id = user.id AND driver_rent.rent_form_id = '$id_rentform'";
    $result_name_driver = mysqli_query($connect, $search_name_driver);
    $row_name_driver = mysqli_fetch_array($result_name_driver);
    $name_driver = $row_name_driver['fname']." ".$row_name_driver['lname'];
    ////////////////////////////////////////////////////////////////////
    $search_name_ap1 = "SELECT fname, lname FROM user,approver WHERE user.id = approver.user_id AND approver.rank = '1'";
    $result_name_ap1 = mysqli_query($connect, $search_name_ap1);
    $row_name_ap1 = mysqli_fetch_array($result_name_ap1);
    $name_ap1 = $row_name_ap1['fname']." ".$row_name_ap1['lname'];
    //////////////////////////////////////////////////////////////////
    if($rank_ap == 3){
        $search_name_ap = "SELECT fname, lname FROM user,approver WHERE user.id = approver.user_id AND approver.rank = '2'";
        $result_name_ap = mysqli_query($connect, $search_name_ap);
        $row_name_ap = mysqli_fetch_array($result_name_ap);
        $name_ap = $row_name_ap['fname']." ".$row_name_ap['lname'];
    }else if($rank_ap == 4){
        $search_name_ap = "SELECT fname, lname FROM user,approver WHERE user.id = approver.user_id AND approver.rank = '3'";
        $result_name_ap = mysqli_query($connect, $search_name_ap);
        $row_name_ap = mysqli_fetch_array($result_name_ap);
        $name_ap = $row_name_ap['fname']." ".$row_name_ap['lname'];
    }
}else{
    // header("location:login.php?alert=2");
    exit();
}
// เลือกฟอร์มออมาโชว์
$rent_form = "SELECT user.id, fname, lname, rent_form.phone, date_go, date_back, rank, request, 
department, references_id, rent_form.id, note, people, place, rent_form.phone
AS id_rent, rent_form.count, place, created_at
FROM `rent_form`, `user`,`driver_rent` 
WHERE rent_form.user_id = user.id 
AND driver_rent.rent_form_id = rent_form.id 
AND driver_rent.approver_id 
IN(SELECT id FROM `approver` WHERE rank = '$rank_ap')
AND driver_rent.rent_form_id = '$id_rentform'
ORDER BY rent_form.id ASC";

$result_rent_form = mysqli_query($connect, $rent_form);
$row_rent_form = mysqli_fetch_array($result_rent_form);
// print_r($row_rent_form);

$searchcar = "SELECT license FROM car WHERE driver_id IS NOT NULL";
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
    <!-- <form action="rentform.php" id="nukKaew" method="POST"> -->
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
                    <p>ขอบเขตการเดินทาง<input type="text" class="mt-2" value="<?php echo $row_rent_form['count'] ?>" required readonly></p>
                </div>
                <div class="input-field col s6">
                    <p>วันที่กรอกแบบฟอร์ม<input type="text" class="mt-2" value="<?php echo $row_rent_form['created_at'] ?>" required readonly></p>
                </div>
            </div>



            <div class="row">
                <div class="col s12">
                    <!-- ส่วนของรายละเอียดชื่อ -->
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" class="want" value="<?php echo $row_rent_form['fname'] ?>" required readonly>
                            <label for="first_name">ชื่อจริง</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="want" value="<?php echo $row_rent_form['lname'] ?>" required readonly>
                            <label for="last_name">นามสกุล</label>
                        </div>
                    </div>
                    <div class="input-field"></div>
                    <p>อ้างอิง(หัวหน้าที่ดำเนินเรื่องขอใช้รถตู้ ถ้าเบิกเองใส่ชื่อตัวเอง)</p>
                    <input type="text" class="want" value="<?php echo $row_rent_form['references_id'] ?>" required readonly>
                </div>


                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" class="want" value="<?php echo $row_rent_form['rank'] ?>" required readonly>
                        <label for="rank">ตำแหน่ง (ของผู้กรอกแบบฟอร์ม)</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="want" value="<?php echo $row_rent_form['department'] ?>" required readonly>
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
                <input type="text" class="want" value="<?php echo $row_rent_form['request'] ?>" required readonly>

                <div class="row">
                    <div class="input-field col s6">
                        <p>สถานที่ไป<input type="text" class="want" value="<?php echo $row_rent_form['place'] ?>" required readonly></p>
                    </div>
                    <div class="input-field col s6">
                        <p>จำนวนคน<input type="text" class="want" value="<?php echo $row_rent_form['people'] ?>" required readonly></p>
                    </div>
                </div>
                <!-- จบส่วนของสถานที่ -->



                <!-- วันที่ในการเดินทางไปกลับ -->
                <p>วันเวลาในการเดินทาง (ไป และ กลับ)</p>
                <div class="row">
                    <div class="input-field col s6">
                        <input  type="datetime" class="want" value="<?php echo $row_rent_form['date_go'] ?>" required readonly>
                    </div>
                    <div class="input-field col s6">
                        <input  type="datetime" class="want" value="<?php echo $row_rent_form['date_back'] ?>" required readonly>
                    </div>
                </div>



                <!-- หมายเหตุ -->
                <div>
                    <p>หมายเหตุ<input type="text" class="want" value="<?php echo $row_rent_form['note'] ?>" required readonly></p>
                    <p>กรณีมีปัญหาสามารถติดต่อกลับได้ที่เบอร์โทรนี้<input type="text" class="want" value="<?php echo $row_rent_form['phone'] ?>" required readonly></p>
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
                </div>
                <!-- จบลงชื่อคนขออณุญาติ -->
            </div>
        </div>
    <!-- </form> -->



    <!-- เลือกรถ -->
    <form action="allowed.php" method="POST">
    <?php if($rank_ap == '1'){?>
                <div class="container">
                    <div class="input-field col s12">
                        <select name="car" required>
                            <option disabled selected>เลือกรถ</option>
                            <?php while ($rowcar = mysqli_fetch_array($resultcar)) { ?>
                                <option> <?php echo $rowcar['license'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
    <?php }else if($rank_ap > 1 && $rank_ap < 5){ ?>
        <!-- <form action="allowed.php" method="post"> -->
            <div class="container">
                <div class="row">
                    <div class="col s6">
                        <p>คนขับรถ</p>
                        <input type="text" class="want" value="<?php echo $name_driver ?>" required readonly><br><br><br>
                    </div>
                    <div class="col s6">
                        <p>เจ้าหน้าที่เลือกรถ</p>
                        <input type="text" class="want" value="<?php echo $name_ap1 ?>" required readonly><br><br><br>
                    </div>
                </div>
                
                <?php if($rank_ap > 2){?>
                    <div class="row"><div class="col s6"></div>
                    <div class="col s6">
                        <p>เจ้าหน้าที่ ที่อนุญาตให้ไปล่าสุด</p>
                        <input type="text" class="want" value="<?php echo $name_ap ?>" required readonly><br><br><br>
                    </div>
                </div>
                <?php } ?>
   <?php } ?>
                <div class="center-align">
                    <input type="submit" id="but3" class="btn orange darken-4-effect light" value="อนุญาต" name="allowed">
                    <input type="submit" id="but4" class="btn red darken-4-effect light" value="ไม่อนุญาต" name="allowed" onclick="return confirm('คุณไม่อนุญาตแบบฟอร์มนี้?')"><br><br>
                </div>
            </div>
            <input type="hidden" name="id_rent_form" value="<?php echo $id_rentform ?>">
        </form>
</body>
</html>