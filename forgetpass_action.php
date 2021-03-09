<?php 
 require ("connect.php");

$email = $_POST['txt_email'];
$password = $_POST['txt_pass'];
$password2 = $_POST['txt_pass2'];

if($password != $password2){
    echo "<script>";
    echo "alert(\"รหัสผ่านไม่ตรงกัน! \");";
    echo "window.history.back()";
    echo "</script>";
}


$check = $conn->query("SELECT Email FROM user_db WHERE Email = '$email' ");
    $check_result = $check->fetch_assoc();
    if($check_result){
        $sql_update = $conn->query("UPDATE user_db SET `Email`='$email',`Password`='$password' WHERE `Email` = '$email'");
        echo "<script>";
        echo "alert(\" เปลี่ยนรหัสผ่านเรียบร้อย \");";
        echo "window.history.back()";
        echo "</script>";
        exit;
    



}else{
    echo "<script>";
        echo "alert(\" ไม่พบข้อมูล \");";
        echo "window.history.back()";
        echo "</script>";
        exit;
}

?>
