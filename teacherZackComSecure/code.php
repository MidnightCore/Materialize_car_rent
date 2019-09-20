<?php

if($_POST['encode']) {
    //กด Encode
    $encode = $_POST['encode'] ;
    $file = fopen("file/file.txt",'w') or die ("Unable to open file") ;

    $code = base64_encode($encode) ;
    fwrite($file , $code) ;
}

else {
    //กรอก Decode
    $file = fopen("file/file.txt",'r') or die ("Unable to open file") ;
    $txt = fread($file , filesize("file/file.txt")) ;
    echo base64_decode($txt) ;
    //echo base64_decode($code) ;
}

?>