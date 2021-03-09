<?php

require ("../connect.php");

$type_name = $_POST['txt_type_name'];



$check = $conn->query("SELECT name_id FROM type_product WHERE name_id = '$type_name' ");
$check_result = $check->fetch_assoc();


if($check_result){
        echo "<script>";
        echo "alert(\" มี ประเภทสินค้า นี้อยู่ในระบบแล้ว กลับไปเปลี่ยน ประเภทสินค้า ใหม่ด้วยนะคะ อีดอก! \");";
        echo "window.history.back()";
        echo "</script>";
        exit;
}

$sql = $conn->query("INSERT INTO type_product (name_id) VALUE ('$type_name') "); 

if($sql==true){
    echo "<script>";
    echo "alert(\"เพิ่มประเภทสำเร็จ! \");";
    echo "window.location='product.php'";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert(\"เพิ่มประเภทม่ด้าย! \");";
    echo "window.history.back()";
    echo "</script>";
}
?>