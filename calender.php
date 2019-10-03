<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ตรวจเช็คตารางรถ</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />


    <link href='./fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='./fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='./fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
    <script src='./fullcalendar/packages/core/main.js'></script>
    <script src='./fullcalendar/packages/interaction/main.js'></script>
    <script src='./fullcalendar/packages/daygrid/main.js'></script>
    <script src='./fullcalendar/packages/timegrid/main.js'></script>

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
        /* body {
            margin: 40px 10px; 
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        } */
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

        #but3 {
            /*ตกแต่งปุ่มกด*/
            padding-left: 30px;
            padding-right: 30px;
            margin: 15px;
        }
    </style>
</head>

<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="index.php" class="brand-logo">Home</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="calender.php">ตรวจเช็คตารางรถ</a></li>
                <li><a href="form_rentform.php">แบบฟอร์มจองรถ</a></li>
                <li><a href="history.php">ประวัติการใช้งาน</a></li>
                <li><a href="checkstatus.php">ตรวจสอบสถานะคำขอ</a></li>
                <li><a href="login.php">ออกจากระบบ</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <br><br>
                <li><a href="calender.php">ตรวจเช็คตารางรถ</a></li>
                <li><a href="form_rentform.php">แบบฟอร์มจองรถ</a></li>
                <li><a href="history.php">ประวัติการใช้งาน</a></li>
                <li><a href="checkstatus.php">ตรวจสอบสถานะคำขอ</a></li>
                <li><a href="login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav><br><br>


    <div id='calendar'></div>
    <div class="center-align">
        <a href="index.html" id="but3" class="waves-effect waves-light btn">กลับหน้าหลัก</a>
    </div>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>

</html>