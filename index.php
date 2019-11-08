<?php  
    require 'server/server.php';
    session_start();
    if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'];
       
        if(isset($_GET['alert'])){
            $alert = $_GET['alert'];
            if($alert == 1){
                echo "<script>alert('เพิ่มข้อมูลเรียบร้อยแล้วค่ะ');</script>";
            }
        }
    }else{
        $user_id = "";
    }
     $sql = "SELECT fname,lname,id FROM user WHERE user.id='$user_id'";
    $result = mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Car Reservation Service</title>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="index.php" class="brand-logo">Home</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="user/calender.php">ตรวจเช็คตารางรถ</a></li>
                <li><a href="user/form_rentform.php">แบบฟอร์มจองรถ</a></li>
                <li><a href="user/history.php">ประวัติการใช้งาน</a></li>
                <li><a href="user/checkstatus.php">ตรวจสอบสถานะคำขอ</a></li>
                <?php if($name = mysqli_fetch_array($result)){
                   echo"<li><a href=#>".$name['fname']." ".$name['lname']."</a></li>";
                }else{ 
                echo"<li><a href=login.php>เข้าสู่ระบบ</a></li>";
                } ?>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <br><br>
                <li><a href="user/calender.php">ตรวจเช็คตารางรถ</a></li>
                <li><a href="user/form_rentform.php">แบบฟอร์มจองรถ</a></li>
                <li><a href="user/history.php">ประวัติการใช้งาน</a></li>
                <li><a href="user/checkstatus.php">ตรวจสอบสถานะคำขอ</a></li>
                <li><a href="login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>


    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center white-text">Car Reservation Service</h1>
                <div class="row center">
                    <h6 class="header col s12 light">สำหรับเจ้าหน้าที่และอาจารย์ มหาวิทยาลัยราชภัฏสวนสุนันทาเท่านั้น
                    </h6>
                </div>
                <div class="row center">
                    <a href="user/form_rentform.php" id="download-button"
                        class="btn-large waves-effect waves-light teal lighten-1 z-depth-4">Get
                        Started</a>
                </div>
                <br><br>
            </div>
        </div>
        <div class="parallax"><img src="img/ssru1.jpg" alt="Unsplashed background img 1"></div>
    </div>


    <div class="container">
        <div class="section">
            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
                        <h5 class="center">สะดวกรวดเร็ว</h5>
                        <p class="light">ด้วยระบบการจองรถที่มีเสถียรภาพ ปลอดภัย
                            และแสนจะสะดวกที่ทำให้คุณใช้งานได้อย่างงายดาย คุณจะพบกับความสะดวกสบายในทุกขั้นตอนการจองรถ
                        </p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="material-icons">group</i></h2>
                        <h5 class="center">ประสบการณ์ที่ดี</h5>

                        <p class="light">ด้วยรถยนต์สภาพดี และคนขับรถมืออาชีพ
                            ที่มีทั้งฝีมือในการขับขี่อย่างปลอดภัยและมารยาทที่ดี ทำให้คุณมั่นใจได้เลยว่าการเดินทางของคุณ
                            จะเป็นประสบการณ์ที่ดี</p>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
                        <h5 class="center">ปลอดภัย</h5>
                        <p class="light">เดินทางอย่างปลอดภัยหายห่วง ด้วยคนขับรถมืออาชีพ
                            ที่มีใบอนุญาติขับขี่รถยนต์อย่างถูกต้องตามกฏหมาย พร้อมด้วยรถที่ผ่านการตรวจสภาพมาเป็นอย่างดี
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light">ให้ทุกการเดินทางของคุณ ปลอดภัย สะดวกสบาย และเป็นประสบการณ์ที่ดี
                    </h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="img/van2.jpg" alt="Unsplashed background img 2"></div>
    </div>


    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 center">
                    <h3><i class="mdi-content-send brown-text"></i></h3>
                    <h4>ขั้นตอนการจอง</h4>
                    <p class="left-align light">
                        เลือก “ตรวจเช็คตารางรถ” จากแถบเมนูเพื่อตรวจสอบวันและเวลาที่ต้องการจองรถ
                        เลือก “แบบฟอร์มจองรถ” จากแถบเมนูและกรอกรายละเอียดให้ครบ แล้วกดยืนยันเพื่อทำการจองรถ
                        รอการอนุมัติ โดยคุณสามารถตรวจเช็คสถานะการอนุมัติของคุณได้ที่ “ตรวจสอบสถานะคำขอ”
                        เมื่อสถานะการจองรถเปลี่ยนเป็น “อนุมัติ” คุณจึงจะสามารถใช้งานรถที่ได้ทำการจองเอาไว้ได้
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light">บริการทุกระดับ ประทับใจ เพราะความปลอดภัยของคุณ "ต้องมาก่อน" </h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="img/van1.jpg" alt="Unsplashed background img 3"></div>
    </div>


    <footer class="page-footer teal">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Our Team Bio</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like
                        it's our full time job. If you have any suggestions please don't be shy to tell us.</p>
                </div>
                <div class="col l3 s12">
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">SSRU Gen-Ed</h5>
                    <ul>
                        <li><a class="white-text" href="#!">เลขที่1 อาคาร34 ชั้น1 ถนนอู่ทองนอก แขวงดุสิต เขตดุสิต กรุงเทพมหานคร 10300</a></li>
                        <li><a class="white-text" href="#!">โทร. 02-160-1265-70</a></li>
                        <li><a class="white-text" href="http://www.gen-ed.ssru.ac.th/home">http://www.gen-ed.ssru.ac.th</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by <a class="brown-text text-lighten-3" href="#">Hyper Tag</a>
            </div>
        </div>
    </footer>

</body>

</html>