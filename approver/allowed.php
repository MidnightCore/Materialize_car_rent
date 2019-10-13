<?php 
session_start();
require './../server.php';
if(isset($_SESSION['id'])){
    $name = $_SESSION['name'];
    $rent_form_id = $_POST['id'];
    // echo$rent_form_id;
    if($_POST['allowed'] == 'อนุญาต'){
        $status = "ได้รับอนุญาตและเลือกรถโดย ".$name;
        $note = "ดำเนินการส่งเรื่องขออุญาติต่อ";
        if(isset($_POST['car'])){
        $car = $_POST['car'];
        }else{
            echo "<script>alert('กรุณาเลือกรถให้แบบฟอร์มค่ะ');history.back();</script>";
            exit();
        }
        // ตัวแปรอัพเดท
        $search_rank_ap = "SELECT approver.rank AS ap_rank FROM approver, approve_form,driver_rent
        WHERE approve_form.rent_form_id = '$rent_form_id' AND driver_rent.rent_form_id = '$rent_form_id'
        AND approver.rank IN(SELECT rank FROM approve_form,approver WHERE approve_form.approver_id = approver.id)";
        $result_rank = mysqli_query($connect, $search_rank_ap);
        $row_rank_ap = mysqli_fetch_array($result_rank);
        $rank_ap = $row_rank_ap['ap_rank']+1;
        ////////////////////////////////////////////////////
        $search_id_ap = "SELECT id FROM approver WHERE approver.rank = '$rank_ap'";
        $result_id_ap = mysqli_query($connect, $search_id_ap);
        $row_ap_id = mysqli_fetch_array($result_id_ap);
        $ap_id = $row_ap_id['id'];
        ///////////////////////////////////////////////////
        $update = "UPDATE `approve_form` SET `status` = '$status', `note` = '$note', `approver_id` = '$ap_id' WHERE approve_form.rent_form_id = '$rent_form_id'";
        if(mysqli_query($connect, $update)){
            $search_dri_id = "SELECT driver_id FROM car WHERE license = '$car'";
            $result_dri_id = mysqli_query($connect, $search_dri_id);
            $row_dri_id = mysqli_fetch_array($result_dri_id);
            $driver_id = $row_dri_id['driver_id'];
            // echo$driver_id;
            $update = "UPDATE driver_rent SET `driver_id` = '$driver_id', `approver_id` = '$ap_id' WHERE rent_form_id = '$rent_form_id'";
            if(mysqli_query($connect, $update)){
                echo "<script>alert('บันทึกแบบฟอร์มเรียบร้อยค่ะ');history.back();</script>";
                exit();
            }else{
                echo "<script>alert('บันทึกแบบฟอร์มไม่ได้ค่ะ กรุณาบันทึกใหม่');history.back();</script>";
                exit();
            }
        }else{
            echo "<script>alert('บันทึกแบบฟอร์มไม่ได้ค่ะ กรุณาบันทึกใหม่');history.back();</script>";
            exit();
        }
    }else if($_POST['allowed'] == 'ไม่อนุญาต'){
        $status = "ไม่อนุญาตโดย ".$name;
        $note = "ยกเลิกคำขอจองรถตู้เพราะไม่ได้รับอนุญาต";
        // ตัวแปรอัพเดท
        $update = "UPDATE approve_form SET `status` = '$status', `note` = '$note' WHERE approve_form.rentform_id = '$rent_form_id'";
    }else{
        echo "<script>alert('ไม่ถูกต้องค่ะ');history.back();</script>";
        exit();
    }
    


}else{
    header("location:./../login.php");
    exit();
}
?>