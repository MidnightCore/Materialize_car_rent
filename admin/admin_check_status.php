<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link rel="stylesheet" href="admin_page.css">

    <title>check_status</title>

    <style>
        body {
            background-color: #3D3D3D;
        }

        #but2 {
            /*ตกแต่งปุ่มกด*/
            padding-left: 30px;
            padding-right: 30px;
            margin: 15px;

        }
    </style>
</head>


<body>

    <header class="header" role="banner">
        <!-- ส่วนของแถบเมนูด้านซ้าย -->
        <h1 class="logo">
            <a href="admin_page.php">หน้าหลัก <span>แอดมิน</span></a>
        </h1>
        <div class="nav-wrap">
            <nav class="main-nav" role="navigation">
                <ul class="unstyled list-hover-slide">
                    <li><a href="admin_add_user.php">เพิ่มข้อมูลผู้ใช้</a></li>
                    <li><a href="admin_add_driver.php">เพิ่มข้อมูลคนขับรถ</a></li>
                    <li><a href="admin_add_car.php">เพิ่มข้อมูลรถ</a></li>
                    <li><a href="admin_check_status.php">ตรวจสถานะคำร้อง</a></li>
                    <li><a href="http://localhost/phpmyadmin/db_structure.php?server=1&db=materialize_car_rent" target="_blank">phpMyAdmin</a></li>
                    <li><a href="../login.php">ออกจากระบบ</a></li>
                </ul>
            </nav>
            <ul class="social-links list-inline unstyled list-hover-slide">
                <li><a href="#">เหง่ง 1</a></li>
                <li><a href="#">เหง่ง 2</a></li>
                <li><a href="#">เหง่ง 3</a></li>
                <li><a href="#">เหง่ง 4</a></li>
            </ul>
        </div>
    </header><!-- จบส่วนของแถบเมนูด้านซ้าย -->


    <div class="container">
        <!--ส่วนของเนื้อหาตรงกลางหน้า-->
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="aaa">
                <div class="box">
                    <div class="float" style="margin-left:300px;">
                        <br>
                        <h1 style="text-align: center;"></h1>
                        <form class="form" action="">
                            <!-- ใส่โค้ดตรงนี้ -->


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--จบส่วนของเนื้อหาตรงกลางหน้า-->

</body>

</html>