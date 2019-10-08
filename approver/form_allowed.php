<?php 
session_start();
require './../server.php';
if(isset($_SESSION['id'])){
    if(isset($_GET)){
        $id_rentform = base64_decode($_GET['d']);
        echo$id_rentform;
    }
}else{
    header("location:./../login.php");
    exit();
}
?>