<?php 
require './../server.php';

session_start();
if(isset($_SESSION['id'])){
    if(isset($_GET)){
        $id_rentform = base64_decode($_GET['d']);
        echo$id_rentform;
    }
}else{
    header("location:./../login.php");
    exit();
}
// เลือกแร้งคนตรวจ
$sql = "SELECT approver.rank,fname,lname FROM user,approver WHERE user.role = 'approver' AND approver.user_id = user.id AND user.id = '$id'";
$result = mysqli_query($connect, $sql);
$row_approver = mysqli_fetch_array($result);
$rank_ap = $row_approver['rank'];
// เลือกฟอร์มออมาโชว์
$rent_form = "SELECT user.id, fname, lname, rent_form.phone, date_go, date_back, references_id, rent_form.id AS id_rent
FROM `rent_form`, `user`,`driver_rent` 
WHERE rent_form.user_id = user.id AND driver_rent.rent_form_id = rent_form.id AND driver_rent.approver_id IN(SELECT id FROM `approver` WHERE rank = '$rank_ap')
ORDER BY rent_form.id ASC";
$result_rent_form = mysqli_query($connect, $rent_form);

?>