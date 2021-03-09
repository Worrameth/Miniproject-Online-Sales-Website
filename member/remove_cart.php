<?php
require('../connect.php');
$remove = $conn->query("DELETE FROM cart WHERE cart_id='".$_GET['id_cart']."'");
if($remove){
    echo "<script>";
    echo "window.location='cart.php'";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert(\"ลบไม่สำเร็จ! \");";
    echo "window.history.back()";
    echo "</script>";
}
?>