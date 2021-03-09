<html>
<head>
<?php require 'show_head.php'; ?>
<?php require ("logo.php"); ?>

</head>
<body>


<?php require ('bar.php'); ?>

<center>
<form class="form-signin w-25 mt-5 pt-5" action="login_action.php" method="post">
  <h1 class="h1 mb-3 font-weight-normal ">เข้าสู่ระบบ</h1>
  <label for="inputEmail" class="sr-only ">Username</label>
  <input type="text" id="inputUsername" class="form-control mb-2" placeholder="Username" name="txt_user" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" name="txt_pass" required>
  
     
  <button class="btn btn-lg btn-primary btn-block" type="submit">เข้าสู่ระบบ</button>
  <br>
    <a href="register.php">สมัครสมาชิก</a>|<a href="forgetpass.php">ลืมรหัสผ่าน</a>
</form>
</center>



<script src="bt/js/jquery-3.4.1.slim.min.js"></script>
<script src="bt/js/bootstrap.min.js"></script>
<script src="bt/js/popper.min.js"></script>
</body>

</html>