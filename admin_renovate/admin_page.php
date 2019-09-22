<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Admin Page</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />


    <!-- ส่วนของปฎิทิน -->
    <link href='../fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='../fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='../fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
    <script src='../fullcalendar/packages/core/main.js'></script>
    <script src='../fullcalendar/packages/interaction/main.js'></script>
    <script src='../fullcalendar/packages/daygrid/main.js'></script>
    <script src='../fullcalendar/packages/timegrid/main.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var d = new Date();
            var months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
            var day = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"]
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                defaultDate: d.getFullYear() + '-' + months[d.getMonth()] + '-' + day[d.getDay()],
                navLinks: true,
                businessHours: true,
                editable: true,
            });
            calendar.render();
        });
    </script>
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
    <!-- จบส่วนของปฎิทิน -->
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
                <!-- <li><a href="http://localhost/phpmyadmin/db_structure.php?server=1&db=materialize_car_rent" target="_blank">phpMyAdmin</a></li> -->
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav">
                <br><br>
                <li><a href="admin_add_user.php">เพิ่มข้อมูลผู้ใช้</a></li>
                <li><a href="admin_edit_user.php">แก้ไขข้อมูลผู้ใช้</a></li>
                <li><a href="admin_add_driver.php">เพิ่มข้อมูลคนขับรถ</a></li>
                <li><a href="admin_edit_driver.php">แก้ไขข้อมูลคนขับรถ</a></li>
                <li><a href="admin_check_status.php">ตรวจสถานะคำร้อง</a></li>
                <!-- <li><a href="http://localhost/phpmyadmin/db_structure.php?server=1&db=materialize_car_rent" target="_blank">phpMyAdmin</a></li> -->
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>



    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <h1 style="text-align: center;"></h1>
            <form class="form" action="">
                <div id='calendar'></div><br>
            </form>
        </div>
    </div>



    <footer class="page-footer teal darken-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Our Team Bio</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like
                        it's our full time job. If you have any suggestions please don't be shy to tell us.</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by <a class="brown-text text-lighten-3" href="#">Hyper Tag</a>
            </div>
        </div>
    </footer>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>

</body>

</html>