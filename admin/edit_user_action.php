<link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
<?php

require ("../connect.php");

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
$status = $_POST['status'];

if($password != $password2){
    echo "<script>";
    echo "alert(\"รหัสผ่านไม่ตรงกัน! \");";
    echo "window.history.back()";
    echo "</script>";
    exit;
} 
$sql = "UPDATE user_db SET `ID_User`='$ID',
`Password`='$password',
`Name`='$name',
`Last_Name`='$lastname',
`Gender`='$gender',
`Address`='$address',
`City`='$amphur_id',
`District`='$district_id',
`Province`='$provine',
`Postcode`='$zipcode',
`status` = '$status'
 WHERE `ID_User` = '$ID' ";
$result=$conn->query($sql);

if($result){ 
    echo "<script>";
    echo "alert(\"แก้ไขข้อมูลสำเร็จ! \");";
    echo "window.location='employee.php'";
    echo "</script>";

}else{
    echo "<script>";
        echo "alert(\"แก้ไขไม่สำเร็จไอโง่! \");";
        echo "window.history.back()";
        echo "</script>";
}

?>
