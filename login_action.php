<?php require ("logo.php"); ?>
<?php

session_start();
include('connect.php');

$id = $_POST['txt_user'];
$password = $_POST['txt_pass'];

$sql = "SELECT * FROM user_db Where `ID_User`='$id' AND `Password`='$password'  ";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_array();
    $_SESSION['user'] = $row['ID_User'];
    $_SESSION['password'] = $row['Password'];
    $_SESSION['fname'] = $row['Name'];
    $_SESSION['lname'] = $row['Last_Name'];
    $_SESSION['status'] = $row['status'];

    if($_SESSION['status']=='admin'){
        header("Location: admin/index.php");
    }
    else if($_SESSION['status']=='manager'){
        header("Location: manager/index.php");
    }
    else if($_SESSION['status']=='member'){
        header("Location: member/index.php");
    }
    

    
}else{
    echo "<script>";
    echo "alert(\" Username หรือ Password ผิด \");";
    echo "window.location='login.php'";
    echo "</script>";
}

?>