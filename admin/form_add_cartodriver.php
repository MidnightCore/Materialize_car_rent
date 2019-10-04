<?php  
require './../server.php';
session_start();
if(isset($_GET['driver'])){
    $id = base64_decode($_GET['driver']);
}else{
    header("location:login.php");
    exit();    
}
$search ="SELECT fname,lname,id FROM user WHERE user.role = 'driver'AND user.id = '$id'";
$result = mysqli_query($connect,$search);
$row = mysqli_fetch_array($result);

$searchcar = "SELECT license FROM car WHERE driver_id IS NULL";
$resultcar = mysqli_query($connect, $searchcar);

?>

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

    <title>เพิ่มข้อมูลคนขับรถ</title>
</head>

<body>
    <nav class="teal lighten-3" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="admin_page.php" class="brand-logo">Admin Page</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="show_user.php">ข้อมูลUser</a></li>
                <li><a href="show_approver.php">ข้อมูลApprover</a></li>
                <li><a href="show_driver_car.php">ข้อมูลรถและคนขับรถ</a></li>
                <li><a href="request_form.php">ตรวจสถานะคำร้อง</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav"><br><br>
                <li><a href="show_user.php">ข้อมูลUser</a></li>
                <li><a href="show_approver.php">ข้อมูลApprover</a></li>
                <li><a href="show_driver_car.php">ข้อมูลรถและคนขับรถ</a></li>
                <li><a href="request_form.php">ตรวจสถานะคำร้อง</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>


    <!-- <form action="add_driver2.php" id="ee" method="POST"> -->
        <!-- เริ่มต้นแบบฟอร์ม -->
        <div class="container">
            <!-- หัวกระดาษ -->
            <div class="content border border-secondary mt-3 pb-1 pt-1">
                <div class="m-4">
                    <h5 class="text-center">เพิ่มข้อมูลคนขับรถ<br></h5>
                </div>
            </div><!-- จบหัวกระดาษ -->

            <div class="row">
            <div class="input-field col s12">
                            <?php echo"ชื่อ : ".$row['fname']." ".$row['lname'] ?>
                    </div>
            </div>
        </div>
    <!-- </form> -->
    





    <form action="add_cartodriver.php" id="ee" method="POST">
        <!-- เริ่มต้นแบบฟอร์ม -->
        <div class="container">
            <!-- หัวกระดาษ -->
            <div class="input-field col s12">
                        <select name="cartodriver" required>
                        <option disabled selected>เลือกรถ</option>
                            <?php while($rowcar = mysqli_fetch_array($resultcar)) { ?>
                                <option> <?php echo $rowcar['license'] ?> </option>

                            <?php } ?>
                        </select>
                    </div><!-- จบหัวกระดาษ -->
                    </div>
                    <input type="hidden" name="id" value="<?php echo base64_encode($id) ?>">
                </div>
            </div>
        </div>
    </form>
    <div class="center-align">
        <button type="submit" form="ee" class="btn waves-effect waves-light">ยืนยัน
            <i class="material-icons right">done</i>
        </button>
       
    </div><br><br><br>
    <script>
                        
                        $(document).ready(function() {
                            $('select').formSelect();
                        });
                    </script>
</body>

</html>