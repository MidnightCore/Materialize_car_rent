<?php
require './../server.php';
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header("location:./../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">

  <link href='../fullcalendar/packages/core/main.css' rel='stylesheet' />
  <link href='../fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
  <link href='../fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
  <script src='../fullcalendar/packages/core/main.js'></script>
  <script src='../fullcalendar/packages/interaction/main.js'></script>
  <script src='../fullcalendar/packages/daygrid/main.js'></script>
  <script src='../fullcalendar/packages/timegrid/main.js'></script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>calen</title>

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
    body {
      margin: 40px 10px;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

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

</body>

</html>