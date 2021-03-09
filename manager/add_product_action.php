<link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
<?php
session_start();
require("../connect.php");


$name = $_POST['txt_name'];
$des = $_POST['txt_des'];
$price = $_POST['txt_price'];
$stock = $_POST['txt_stock'];
$type = $_POST['txt_type'];

date_default_timezone_set('Asia/Bangkok');
$date1 = date("Ymd_His");
$numrand = (mt_rand());




    $path="../img/";
    $type = strrchr($_FILES['txt_image']['name'],".");
    $newname =$numrand.$date1.$type;

    $path_copy=$path.$newname;
    $path_link="../img/".$newname;

    
    
if($type=='.jpg' or $type=='.png' OR $type=='.gif'){

    move_uploaded_file($_FILES['txt_image']['tmp_name'],$path_copy);  

    $check = $conn->query("SELECT Name_Product FROM product_db WHERE Name_Product = '$name' ");
    $check_result = $check->fetch_assoc();
    if($check_result){
        echo "<script>";
        echo "alert(\" มี สินค้า นี้อยู่ในระบบแล้ว กลับไปเปลี่ยน สินค้า ใหม่ด้วยนะคะ อีดอก! \");";
        echo "window.history.back()";
        echo "</script>";
        exit;}



    
     $sql = "INSERT INTO product_db (`ID_Product`,`Name_Product`,`Picture`,`Description`,`Price`,`Stocks`,`type_id`) VALUES (null,'$name','$newname','$des','$price','$stock','".$_POST['txt_type']."') ";
    $result = $conn->query($sql);
    if($result==true){
        echo "<script>";
        echo "alert(\"เพิ่มสินค้าสำเร็จ! \");";
        echo "window.location='product.php'";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"เพิ่มสินค้าม่ด้าย! \");";
        echo "window.history.back()";
        echo "</script>";
    }

}else{
    echo "<script>";
    echo "alert(\"เลือกไฟล์รูปภาพไอควาย! \");";
    echo "window.history.back()";
    echo "</script>";
}


?>