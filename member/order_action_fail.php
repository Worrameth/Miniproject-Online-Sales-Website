<?php
require ('../connect.php');

session_start();




//img ****************************************
date_default_timezone_set('Asia/Bangkok');
$date1 = date("Ymd_His");
$numrand = (mt_rand());

$path="../img_bill/";
$type = strrchr($_FILES['txt_image']['name'],".");
$newname =$numrand.$date1.$type;

$path_copy=$path.$newname;

//end img ****************************************

if($type=='.jpg' or $type=='.png'){
    move_uploaded_file($_FILES['txt_image']['tmp_name'],$path_copy); 
    $insert_head = $conn->query("UPDATE order_head SET img='$newname',status=1 WHERE head_num='".$_POST['head_id']."' ");
    echo "<script>";
    echo "alert(\"ยืนยันการแก้ไข! \");";
    echo "window.location='bill_status.php'";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert(\"เลือกไฟล์รูปภาพไอควาย! \");";
    echo "window.history.back()";
    echo "</script>";
    exit;
}
?>