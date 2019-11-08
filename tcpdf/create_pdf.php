<?php
function fetch_data()
{
    $output = '';
    require "../server/server.php";
    $query = "SELECT * FROM rent_form ORDER BY id DESC";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
            <tr>
            <td>' . $row["date_go"] . '</td>
            <td>' . $row["date_back"] . '</td>
            <td>' . $row["request"] . '</td>
            <td>' . $row["place"] . '</td>
            </tr>
        ';
    }
    return $output;
}

if (isset($_POST["create_pdf"])) {
    require_once('tcpdf.php');
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
    <h3 align="center">Rent Car Order Result</h3><br /><br />  
    <table border="1" cellspacing="0" cellpadding="5">  
         <tr>  
            <th width="25%">Date Go</th>
            <th width="25%">Date Back</th>
            <th width="25%">Objective</th>
            <th width="25%">Destination</th>
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
    <title>สรุปรายละเอียดการจองรถ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>


<body>
    <div class="container" style="width:700px;">
        <h3 style="align:center">สรุปรายละเอียดการจองรถ</h3>
        <h6 style="align:center">*โปรดบันทึกไว้เป็นหลักฐาน</h6>
        <br>
        <div class="responsive-table">
            <table class="table-bordered">
                <tr>
                    <th width="15%">วันเวลาที่ไป</th>
                    <th width="15%">วันเวลาที่กลับ</th>
                    <th width="15%">เหตุผลที่ไป</th>
                    <th width="15%">จุดหมายปลายทาง</th>

                </tr>
                <?php
                echo fetch_data();
                ?>
            </table>
            <br>

            <!-- target="_blank" คือทำให้กดแล้วมันเปิดในแท๊บใหม่ ไม่ใช่เปิดทับแท๊บเดิม -->
            <form method="POST" style="text-align:center" target="_blank">
                <input type="submit" name="create_pdf" class="waves-effect waves-light btn" value="Create PDF">
            </form>
            <br><br>
        </div>
    </div>
</body>

</html>