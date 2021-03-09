<?php require ("logo.php"); ?>
<?php
session_start();
require("../connect.php");


$uplaod = $_FILES['txt_image']['name'];
$name = $_POST['txt_name'];
$des = $_POST['txt_des'];
$price = $_POST['txt_price'];
$stock = $_POST['txt_stock'];
$id_product = $_POST['id_product'];
$name_old = $_POST['pic_old'];
$type = $_POST['txt_type'];
date_default_timezone_set('Asia/Bangkok');
$date1 = date("Ymd_His");
$numrand = (mt_rand());
$type_img = strrchr($_FILES['txt_image']['name'],".");


if($uplaod != ''){
    
    if($type_img=='.jpg' or $type_img=='.png' OR $type_img=='.gif'){

    
    
        $path="../img/";
        
        $newname =$numrand.$date1.$type_img;
    
        $path_copy=$path.$newname;
        $path_link="../img/".$newname;
        move_uploaded_file($_FILES['txt_image']['tmp_name'],$path_copy);  
    }
    else{
        echo "<script>";
        echo "alert(\"เลือกไฟล์รูปภาพไอควาย! \");";
        echo "window.history.back()";
        echo "</script>";
}

    
}else{
        $newname = $name_old;
    }


    $sql = $conn->query("UPDATE product_db SET `Name_Product`='$name', `Picture`='$newname', `Description`='$des', `Price`='$price', `Stocks`='$stock', `type_id`='$type' WHERE ID_Product='$id_product' ");
    
                if($sql==true){
                    echo "<script>";
                    echo "alert(\"แก้ไขสินค้าสำเร็จ! \");";
                    echo "window.location='product.php'";
                    echo "</script>";
                }else{
                    echo "<script>";
                    echo "alert(\"แก้ไขสินค้าม่ด้าย! \");";
                    echo "window.history.back()";
                    echo "</script>";
                }



?>