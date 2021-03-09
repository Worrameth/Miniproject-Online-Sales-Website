<html>
<head>
<?php require 'show_head.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<style>
      #eye {
        margin-top:-35px;
        margin-left: 93%;
      }
      </style>
</head>
<body>


<?php require ('bar.php'); ?>



<div class="d-flex justify-content-center">
  <form class="form-signin w-25 mt-5 pt-5" action="register_action.php" method="post">
    <h1 class="h1 mb-3 font-weight-normal">สมัครสมาชิก</h1>
    <label for="inputUsername" class="sr-only ">ชื่อผู้ใช้</label>
    <input type="text" id="inputUsername" class="form-control mb-2" placeholder="ชื่อผู้ใช้" name="txt_user" required autofocus>
    <label for="inputPassword" class="sr-only">รหัสผ่าน</label>
	<input type="password" id="inputPassword" class="form-control mb-2" placeholder="รหัสผ่าน" name="txt_pass" required>
      <i class="show-pass fa fa-eye fa-lg" id="eye"></i>
    <label for="inputPassword" class="sr-only">ยืนยันรหัสผ่าน</label>
    <input type="password" id="inputPassword2" class="form-control mb-2" placeholder="ยืนยันรหัสผ่าน" name="txt_pass2" required>
	<i class="show-pass fa fa-eye fa-lg" id="eye"></i>
    <label for="inputFirstname" class="sr-only ">ชื่อ</label>  
	<input type="text" id="inputFirstname" class="form-control mb-2" placeholder="ชื่อ" name="txt_firstname" required>
	<label for="inputLastname" class="sr-only ">นามสกุล</label>
	<input type="text" id="inputLastname" class="form-control mb-2" placeholder="นามสกุล" name="txt_lastname" required>
	<label for="inputFirstname" class="sr-only ">E-Mail</label>  
    <input type="email" id="inputFirstname" class="form-control mb-2" placeholder="Email" name="txt_email" required>
    <select class="browser-default custom-select mb-2" name="txt_gender">
    <option value="">เพศ</option>
    <option value="1">ชาย</option>
    <option value="2">หญิง</option></select>


    <label for="inputAddress" class="sr-only ">ที่อยู่</label>
    <input type="text" id="inputAddress" class="form-control mb-2" placeholder="ที่อยู่" name="txt_address" required>  
   
  	<select class="browser-default custom-select mb-2" id="province" name="txt_province">
    <option id="province_list">จังหวัด</option>

 	 </select>
  <!-- แสดงตัวเลือก อำเภอ -->
	<select class="browser-default custom-select mb-2" id="amphur" name="txt_amphur">
		<option id="amphur_list">อำเภอ</option>
	</select>
	<!-- แสดงตัวเลือก ตำบล -->
	<select class="browser-default custom-select mb-2" id="district" name="txt_district">
		<option>ตำบล</option>
	</select>

    <input type="text" id="inputZip" class="form-control mb-2" placeholder="รหัสไปรษณีย์" name="txt_zip" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">สมัครสมาชิก</button><br>
  </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="bt/js/bootstrap.min.js"></script>
<script src="bt/js/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
</body>

<script>
			
			$(function(){
				
				//เรียกใช้งาน Select2
				$(".select2-single").select2();
				
				//ดึงข้อมูล province จากไฟล์ get_data.php
				$.ajax({
					url:"getdata.php",
					dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
					data:{show_province:'show_province'}, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
					success:function(data){
						
						//วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
						$.each(data, function( index, value ) {
							//แทรก Elements ใน id province  ด้วยคำสั่ง append
							  $("#province").append("<option value='"+ value.id +"'> " + value.name + "</option>");
						});
					}
				});
				
				
				//แสดงข้อมูล อำเภอ  โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่ #province
				$("#province").change(function(){

					//กำหนดให้ ตัวแปร province มีค่าเท่ากับ ค่าของ #province ที่กำลังถูกเลือกในขณะนั้น
					var province_id = $(this).val();
					
					$.ajax({
						url:"getdata.php",
						dataType: "json",//กำหนดให้มีรูปแบบเป็น Json
						data:{province_id:province_id},//ส่งค่าตัวแปร province_id เพื่อดึงข้อมูล อำเภอ ที่มี province_id เท่ากับค่าที่ส่งไป
						success:function(data){
							
							//กำหนดให้ข้อมูลใน #amphur เป็นค่าว่าง
							$("#amphur").text("");
							
							//วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
							$.each(data, function( index, value ) {
								
								//แทรก Elements ข้อมูลที่ได้  ใน id amphur  ด้วยคำสั่ง append
								  $("#amphur").append("<option value='"+ value.id +"'> " + value.name + "</option>");
							});
						}
					});

				});
				
				//แสดงข้อมูลตำบล โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #amphur
				$("#amphur").change(function(){
					
					//กำหนดให้ ตัวแปร amphur_id มีค่าเท่ากับ ค่าของ  #amphur ที่กำลังถูกเลือกในขณะนั้น
					var amphur_id = $(this).val();
					
					$.ajax({
						url:"getdata.php",
						dataType: "json",//กำหนดให้มีรูปแบบเป็น Json
						data:{amphur_id:amphur_id},//ส่งค่าตัวแปร amphur_id เพื่อดึงข้อมูล ตำบล ที่มี amphur_id เท่ากับค่าที่ส่งไป
						success:function(data){
							
							  //กำหนดให้ข้อมูลใน #district เป็นค่าว่าง
							  $("#district").text("");
							  
							//วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
							$.each(data, function( index, value ) {
								
							  //แทรก Elements ข้อมูลที่ได้  ใน id district  ด้วยคำสั่ง append
							  $("#district").append("<option value='" + value.id + "'> " + value.name + "</option>");
							  
							});
						}
					});
					
				});
				
				//คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #district 
				$("#district").change(function(){
					
					//นำข้อมูลรายการ จังหวัด ที่เลือก มาใส่ไว้ในตัวแปร province
					var province = $("#province option:selected").text();
					
					//นำข้อมูลรายการ อำเภอ ที่เลือก มาใส่ไว้ในตัวแปร amphur
					var amphur = $("#amphur option:selected").text();
					
					//นำข้อมูลรายการ ตำบล ที่เลือก มาใส่ไว้ในตัวแปร district
					var district = $("#district option:selected").text();
					
					
				});
				
				
			});
			
	</script>
<script>
 var passField = $('input[type=password]');
  $('.show-pass').hover(function() {
      passField.attr('type', 'text');
  }, function() {
    passField.attr('type', 'password');
  })
</script>
</html>