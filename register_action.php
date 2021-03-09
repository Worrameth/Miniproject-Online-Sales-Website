<?php require ("logo.php"); ?>
<?php
require ("connect.php");

$ID = $_POST['txt_user'];
$password = $_POST['txt_pass'];
$password2 = $_POST['txt_pass2'];
$name = $_POST['txt_firstname'];
$lastname = $_POST['txt_lastname'];
$gender = $_POST['txt_gender'];
$address = $_POST['txt_address'];
$amphur_id = $_POST['txt_amphur'];
$district_id = $_POST['txt_district'];
$provine = $_POST['txt_province'];
$zipcode = $_POST['txt_zip'];
$email = $_POST['txt_email'];

$check = $conn->query("SELECT ID_User FROM user_db WHERE ID_User = '$ID' ");
$check_result = $check->fetch_assoc();

$c_e = "SELECT Email FROM user_db WHERE Email = '$email' ";
$check_email = $conn->query($c_e);
$check_result_email = $check_email->fetch_assoc();

if($password != $password2){
    echo "<script>";
    echo "alert(\"รหัสผ่านไม่ตรงกัน! \");";
    echo "window.history.back()";
    echo "</script>";
} 

    
else if($check_result){
        echo "<script>";
        echo "alert(\" มี ID นี้อยู่ในระบบแล้ว กลับไปเปลี่ยน ID ใหม่ด้วยนะคะ อีดอก! \");";
        echo "window.history.back()";
        echo "</script>";
        exit;
    }
else if($check_result_email){
        echo "<script>";
        echo "alert(\" มี Email นี้อยู่ในระบบแล้ว กลับไปเปลี่ยน Email ใหม่ด้วยนะคะ อีดอก! \");";
        echo "window.history.back()";
        echo "</script>";
        exit;
    }

else{


    $sql="INSERT INTO `user_db` (`ID_User`,`Password`,`Name`,`Last_Name`,`Email`,`Gender`,`Address`,`City`,`Province`,`Postcode`,`district`)
    VALUES ('$ID','$password','$name','$lastname','$email','$gender','$address','$amphur_id','$provine','$zipcode','$district_id');";
    $result = $conn->query($sql);

    if($result){ 
        echo "<script>";
        echo "alert(\"สมัครสำเร็จ! \");";
        echo "window.location='login.php'";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"สมัครไม่สำเร็จไอโง่! \");";
        echo "window.history.back()";
        echo "</script>";
    }

}
?>