
<html>
<head>
<?php require 'show_head.php'; 
?>
</head>

<style>
    th{
        text-align: center;
    }
</style>

<body>


<?php
require ("../connect.php"); require ('bar.php');

if(isset($_GET['remove'])){
    foreach($_SESSION["shopping_cart"] as $key => $value){
        if($value['item_id']==$_GET['item_id'] AND $value['iduser_item']==$_SESSION['user']){
            unset($_SESSION['shopping_cart'][$key]);
            // echo"<script>alert('ลบสำเร็จ')</script>";
            echo'<script>window.location="cart.php"</script>';
        }
    }
}


?>



<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <center><h2>รายการชำระเงิน</h2></center> <br>

            <?php 
                if(!empty($_SESSION["shopping_cart"])){
                    $total = 0;
                    ?>
             <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>รูป</th>
                        <th>สินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา (บาท)</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                    foreach($_SESSION["shopping_cart"] as $key => $value){  
                            if($value['iduser_item']==$_SESSION['user']){

                            
                        ?>
                    <tr>
                        <td align="center"><img style="width:50px;height:50px;" src="../img/<?php echo$value['item_picture'];?>" alt=""></td>
                        <td><?php echo$value['item_name'];?></td>
                        <td><?php echo$value['item_amount'];?></td>
                        <td><?php echo number_format($value['item_amount']*$value['item_price']);?></td>

                        <?php $total = $total+($value['item_price']*$value['item_amount']); ?>
                    </tr>
                <?php } }   ?>
                </tbody>
             </table>
                    <br>
            <div style="text-align: right">
                
                <h5>รวมทั้งสิ้น: <b style="color:green"><?php echo number_format($total);?> </b>บาท</h5><br>
            </div>
            <?php }else{ ?>
                   <center><hr><p> ไม่มีสินค้าในตะกร้า</p></center>
                <?php } ?>
        </div>
    </div>

    <div class="row">
    <?php
	
	$user_id = $_SESSION['user'];
	if(isset($_GET['id_user_list'])){$user_id=$_GET['id_user_list'];}
    $result_edit = $conn->query("SELECT * FROM user_db LEFT JOIN gender ON user_db.Gender = gender.Gender_ID LEFT JOIN amphur ON user_db.City = amphur.AMPHUR_ID LEFT JOIN province ON user_db.Province = province.PROVINCE_ID LEFT JOIN district ON user_db.District = district.DISTRICT_CODE WHERE ID_User = '$user_id'");
    $row_edit = $result_edit->fetch_array();
?>
            <div class="col-6">
                <h2>อัพโหลดหลักฐานการชำระเงิน</h2>
                <hr>
                <form action="order_action.php" enctype="multipart/form-data" method="POST">
                    <input type="file" class="form-control" name="txt_image">
                    <span style="color:red;font-size:14px;">*** ต้องเป็นไฟล์ .JPG และ .PNG เท่านั้น</span> <br><br>
                    <p><b>สถานที่จัดส่ง</b></p>
                    <input  type="radio" id="inputAddress"  name="txt_address" value="<?php echo $row_edit['Address']; ?> <?php echo $row_edit['DISTRICT_NAME']; ?> <?php echo $row_edit['AMPHUR_NAME']; ?> <?php echo $row_edit['PROVINCE_NAME']; ?> <?php echo $row_edit['POSTCODE']; ?>" required>   <label for="inputAddress"><?php echo $row_edit['Address']; ?> <?php echo $row_edit['DISTRICT_NAME']; ?> <?php echo $row_edit['AMPHUR_NAME']; ?> <?php echo $row_edit['PROVINCE_NAME']; ?> <?php echo $row_edit['POSTCODE']; ?></label><br><a href="edit_address.php" style='font-size:12px;'>แก้ไข</a><br><br><br>
                    
                    <input type="submit" class="btn btn-success" value="ยืนยัน">
                </form>
            </div>
            <div class="col-6">
                <h2>ข้อมูลการโอนเงิน</h2>
                <hr>
                <p><b>ชื่อผู้รับ: </b>นาย เฉลิมพงศ์ สมศรี</p>
                <p><img src="https://i0.wp.com/www.myshineyhineythailand.com/wp-content/uploads/2019/01/scb-icon.png" style="width:50px;height:50px;">                 <b>ธนาคารไทยพาณิชย์ </b></p>
                <p><b>เลขที่บัญชี: </b>565-5033-199</p>
                <p><b>จำนวนเงินที่ต้องชำระ: </b><?php echo number_format($total);?> บาท</p>
            </div>
    </div>
</div>



<script src="bt/js/jquery-3.4.1.slim.min.js"></script>
<script src="bt/js/bootstrap.min.js"></script>
<script src="bt/js/popper.min.js"></script>
</body>
</html>