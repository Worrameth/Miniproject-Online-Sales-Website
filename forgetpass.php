<!DOCTYPE html>
<html lang="en">
<head>

 <?php 
 require ("show_head.php");
 require ("bar.php");?>
 <?php require ("logo.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
<form class="form-signin w-25 mt-5 pt-5" action="forgetpass_action.php" method="post">
  <h1 class="h1 mb-3 font-weight-normal ">ลืมรหัสผ่าน</h1>
  <label for="inputEmail" class="sr-only ">Email</label>
  <input type="text" id="inputUsername" class="form-control mb-2" placeholder="Email" name="txt_email" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control mb-2" placeholder="รหัสผ่านใหม่" name="txt_pass" required>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control mb-2" placeholder="รหัสผ่านใหม่" name="txt_pass2" required>
  <input class="btn btn-lg btn-primary btn-block" type="submit" value="เปลี่ยนรหัสผ่าน">
  <br>
    <a href="register.php">สมัครสมาชิก</a>|<a href="forgetpass.php">ลืมรหัสผ่าน</a>
</form>
</center>
</body>
</html>