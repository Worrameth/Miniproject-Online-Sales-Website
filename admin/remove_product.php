<link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
<?php

    require("../connect.php");
    $id_product = $_GET['id_product'];

    $sql = $conn->query("DELETE FROM product_db WHERE ID_Product='$id_product' ");

    if($sql==true){
        echo "<script>";
        echo "alert(\"ลบสำเร็จ! \");";
        echo "window.location='product.php'";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"ลบม่สำเร็จ! \");";
        echo "window.history.back()";
        echo "</script>";
    }

?>