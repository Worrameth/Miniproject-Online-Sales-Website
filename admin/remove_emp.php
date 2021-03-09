<link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
<?php

    require("../connect.php");
    $id_user_list = $_GET['id_user_list'];

    $sql = $conn->query("DELETE FROM user_db WHERE ID_User='$id_user_list' ");

    if($sql==true){
        echo "<script>";
        echo "alert(\"ลบสำเร็จ! \");";
        echo "window.location='employee.php'";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"ลบม่สำเร็จ! \");";
        echo "window.history.back()";
        echo "</script>";
    }

?>