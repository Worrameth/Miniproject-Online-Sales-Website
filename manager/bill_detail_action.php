<?php
require ("../connect.php");

$ID = $_POST['txt_user'];
$status = $_POST['txt_status'];

$sql = $conn->query("UPDATE order_head SET `Status`='$status' WHERE oh_id ='$ID' ");
    
if($sql==true){
    echo "<script>";
    echo "alert(\"แก้ไขสินค้าสำเร็จ! \");";
    echo "window.history.back()";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert(\"แก้ไขสินค้าม่ด้าย! \");";
    echo "window.history.back()";
    echo "</script>";
}
?>