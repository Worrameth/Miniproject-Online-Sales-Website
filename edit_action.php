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

$sql = "UPDATE employee SET Password=''
?>