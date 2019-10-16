<?php 
session_start();
require './../server.php';

if(isset($_SESSION['id'])){
    $name = $_SESSION['name'];
    $rent_form_id = $_POST['id_rent_form'];
    $id = $_SESSION['id'];
    if($_POST['allowed'] == 'อนุญาต'){
        // ตัวแปรอัพเดท
        $search_rank_ap = "SELECT approver.rank AS ap_rank FROM approver, approve_form,driver_rent
        WHERE approve_form.rent_form_id = '$rent_form_id' AND driver_rent.rent_form_id = '$rent_form_id'
        AND approver.rank IN(SELECT rank FROM approve_form,approver WHERE approve_form.approver_id = approver.id AND approve_form.rent_form_id = '$rent_form_id')";
        $result_rank_update = mysqli_query($connect, $search_rank_ap);
        $row_rank_ap = mysqli_fetch_array($result_rank_update);
        // $rank_ap_update = $row_rank_ap['ap_rank']+1;
        if($row_rank_ap['ap_rank'] >= 1 && $row_rank_ap['ap_rank'] < 4){
            $rank_ap_update = $row_rank_ap['ap_rank']+1;
        }else if($row_rank_ap['ap_rank'] == 4){
            $rank_ap_update = '4';
        }
        echo$rank_ap_update;
        /////////////////////////    NOTE  AND   STATUS ////////////////////////////////////////
        ////////////////////////// หา RANK เพื่อสร้าง NOTE  AND   STATUS ///////////////////////////////////////
        $search_rank ="SELECT approver.rank FROM approver WHERE approver.user_id = '$id'";
        $result_rank = mysqli_query($connect, $search_rank);
        $row_rank_ap = mysqli_fetch_array($result_rank);
        $rank_ap = $row_rank_ap['rank'];
        // echo$rank_ap;
        if($rank_ap >= 1 && $rank_ap <= 4){
            $search_id_ap = "SELECT id FROM approver WHERE approver.rank = '$rank_ap_update'";
            $result_id_ap = mysqli_query($connect, $search_id_ap);
            $row_ap_id = mysqli_fetch_array($result_id_ap);
            $ap_id = $row_ap_id['id'];
            if($rank_ap == 1){
                if(isset($_POST['car'])){
                    $car = $_POST['car'];
                    }else{
                        echo "<script>alert('กรุณาเลือกรถให้แบบฟอร์มค่ะ');history.back();</script>";
                        exit();
                    }
                $status = "ได้รับอนุญาตและเลือกรถจาก ".$name;
                $note = "ดำเนินการส่งเรื่องขออุญาติต่อ";
                $update = "UPDATE `approve_form` SET `status` = '$status', `note` = '$note', `approver_id` = '$ap_id' WHERE approve_form.rent_form_id = '$rent_form_id'";
            }else if($rank_ap == 2){
                $status = "ได้รับอนุญาตจาก".$name;
                $note = "ดำเนินการส่งเรื่องขออุญาติต่อ";
                $update = "UPDATE `approve_form` SET `status` = '$status', `note` = '$note', `approver_id` = '$ap_id' WHERE approve_form.rent_form_id = '$rent_form_id'";
            }else if($rank_ap == 3){
                $status = "ได้รับอนุญาตจาก".$name;
                $note = "ดำเนินการส่งเรื่องขออุญาติต่อ";
                $update = "UPDATE `approve_form` SET `status` = '$status', `note` = '$note', `approver_id` = '$ap_id' WHERE approve_form.rent_form_id = '$rent_form_id'";
            }else if($rank_ap == 4){
                $status = "ได้รับอนุญาตจาก".$name;
                $note = "ได้รับอนุญาตให้ไปกิจกรรมที่ท่านขอมาได้";
                $update = "UPDATE `approve_form` SET `status` = '$status', `note` = '$note', `approver_id` = '$ap_id' WHERE approve_form.rent_form_id = '$rent_form_id'";
            }
        }else{

        }
        ////////////////////////////////////////////////////
        
        ///////////////////////////////////////////////////
        
        if(mysqli_query($connect, $update)){
            if($rank_ap >= 1 && $rank_ap <= 4){
                // echo$ap_id;
                if($rank_ap == 1){
                    $search_dri_id = "SELECT driver_id FROM car WHERE license = '$car'";
                    $result_dri_id = mysqli_query($connect, $search_dri_id);
                    $row_dri_id = mysqli_fetch_array($result_dri_id);
                    $driver_id = $row_dri_id['driver_id'];
                    echo$driver_id;
                    $update = "UPDATE driver_rent SET `driver_id` = '$driver_id', `approver_id` = '$ap_id' WHERE rent_form_id = '$rent_form_id'";
                    if(mysqli_query($connect, $update)){
                        header("location:approver_page.php?alert=1");
                        exit();
                    }else{
                        echo "<script>alert('บันทึกแบบฟอร์มไม่ได้ค่ะ กรุณาบันทึกใหม่');history.back();</script>";
                        exit();
                    }
                }else if($rank_ap >= 2 && $rank_ap < 4){
                    $update = "UPDATE driver_rent SET `approver_id` = '$ap_id' WHERE rent_form_id = '$rent_form_id'";
                    if(mysqli_query($connect, $update)){
                        header("location:approver_page.php?alert=1");
                        exit();
                    }else{
                        echo "<script>alert('บันทึกแบบฟอร์มไม่ได้ค่ะ กรุณาบันทึกใหม่');history.back();</script>";
                        exit();
                    }
                }else if($rank_ap == 4){
                    $update = "UPDATE driver_rent SET `approver_id` = NULL WHERE rent_form_id = '$rent_form_id'";
                    if(mysqli_query($connect, $update)){
                        header("location:approver_page.php?alert=1");
                        exit();
                    }else{
                        echo "<script>alert('บันทึกแบบฟอร์มไม่ได้ค่ะ กรุณาบันทึกใหม่');history.back();</script>";
                        exit();
                    }
                }
            }
           
        }else{
            echo "<script>alert('บันทึกแบบฟอร์มไม่ได้ค่ะ กรุณาบันทึกใหม่5555');history.back();</script>";
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