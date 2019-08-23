<?php
function fetch_data()
{
    $output = '';
    require "server.php";
    // $connect = mysqli_connect("localhost", "root", "", "materialize_car_rent") or die ("ไม่สามารถติดต่อฐานข้อมูลได้");
    $query = "SELECT * FROM user ORDER BY first_name ASC";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) 
    {
        $output .= '
            <tr>
            <td>' . $row["first_name"] . '</td>
            <td>' . $row["last_name"] . '</td>
            <td>' . $row["user_id"] . '</td>
            <td>' . $row["user_password"] . '</td>
            <td>' . $row["Phone_num"] . '</td>
            <td>' . $row["user_email"] . '</td>
            <td>' . $row["Role"] . '</td>
            </tr>
        ';
    }
    return $output;
}

if (isset($_POST["create_pdf"])) {
    require_once('tcpdf/tcpdf.php');
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
    $obj_pdf->Output('sample.pdf', 'I');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <title>Create_PDF</title>
</head>

<body>
    <br><br>
    <div class="container" style="width:700px;">
        <h3 style="align:center">Export HTML Table data to PDF</h3>
        <br>
        <div class="responsive-table">
            <table class="table-bordered">
                <tr>
                    <th width="15%">first_name</th>
                    <th width="15%">last_name</th>
                    <th width="15%">user_id</th>
                    <th width="15%">user_password</th>
                    <th width="15%">Phone_num</th>
                    <th width="15%">user_email</th>
                    <th width="15%">Role</th>
                </tr>
                <?php
                echo fetch_data();
                ?>
            </table>
            <br>
            <form method="POST" style="text-align:center">
                <input type="submit" name="create_pdf" class="waves-effect waves-light btn" value="Create PDF">
            </form>
            <br><br>
        </div>
    </div>
</body>

</html>