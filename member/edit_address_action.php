<link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
<?php

require ("../connect.php");

$ID = $_POST['txt_user'];
$address = $_POST['txt_address'];
$amphur_id = $_POST['txt_amphur'];
$district_id = $_POST['txt_district'];
$provine = $_POST['txt_province'];
$zipcode = $_POST['txt_zip'];



$sql = "UPDATE user_db SET `ID_User`='$ID',
`Address`='$address',
`City`='$amphur_id',
`District`='$district_id',
`Province`='$provine',
`Postcode`='$zipcode'
 WHERE `ID_User` = '$ID' ";


$result=$conn->query($sql);
if($result){ 
    echo "<script>";
    echo "alert(\"แก้ไขข้อมูลสำเร็จ! \");";
    echo "window.location='order.php'";
    echo "</script>";

}else{
    echo "Fail. ";
}

?>

