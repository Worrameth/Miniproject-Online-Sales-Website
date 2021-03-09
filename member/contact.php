<!DOCTYPE html>
<html lang="en">
<head>
 <?php 
 require ("show_head.php");
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>
<body>
<body>


<?php

require ("../connect.php");
require ('bar.php'); ?>


<?php
	
	$user_id = $_SESSION['user'];
	if(isset($_GET['id_user_list'])){$user_id=$_GET['id_user_list'];}
    $result_edit = $conn->query("SELECT * FROM user_db LEFT JOIN gender ON user_db.Gender = gender.Gender_ID LEFT JOIN amphur ON user_db.City = amphur.AMPHUR_ID LEFT JOIN province ON user_db.Province = province.PROVINCE_ID LEFT JOIN district ON user_db.District = district.DISTRICT_CODE WHERE ID_User = '$user_id'");
    $row_edit = $result_edit->fetch_array();
?>

<div class="d-flex justify-content-center">
  <form class="form-signin w-25 mt-5 pt-5" action="line-notify.php" method="post">
    <h1 class="h1 mb-3 font-weight-normal">แจ้งปัญหา</h1>

    <label for="inputUsername" class="sr-only ">ชื่อผู้ใช้</label>ชื่อผู้ใช้
    <input type="text" id="inputUsername" class="form-control mb-2" placeholder="ชื่อผู้ใช้" name="txt_user" value="<?php echo $row_edit['ID_User']; ?>" readonly >
    <label for="inputFirstname" class="sr-only ">ชื่อ</label>  ชื่อ
    <input type="text" id="inputFirstname" class="form-control mb-2" placeholder="ชื่อ" name="txt_firstname" value="<?php echo $row_edit['Name']; ?>" readonly>
    <label for="inputLastname" class="sr-only ">นามสกุล</label>นามสกุล
	<input type="text" id="inputLastname" class="form-control mb-2" placeholder="นามสกุล" name="txt_lastname" value="<?php echo $row_edit['Last_Name']; ?>" readonly>
	<label for="inputFirstname" class="sr-only ">E-Mail</label>  อีเมล์
    <input type="email" id="inputFirstname" class="form-control mb-2" placeholder="Email"  name="txt_email" value="<?php echo $row_edit['Email']; ?> " readonly>
    <label for="inputFirstname" class="sr-only ">เบอร์ติดต่อ</label> เบอร์โทรศัพท์
    <input type="text"  id="inputFirstname" class="form-control mb-2" placeholder="*เบอร์โทรศัพท์ที่สามารถติดต่อกลับได้"  name="txt_phone" value="" required>
    <label for="txt_des"><b>รายละเอียด </b></label>
    <textarea class="form-control" rows="4" name="txt_des" required></textarea><br>
    <input class='btn btn-success' name="submit" type='submit' value='ส่งคำร้อง'>
    </form>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="bt/js/bootstrap.min.js"></script>
	<script src="bt/js/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	</body>

</html>