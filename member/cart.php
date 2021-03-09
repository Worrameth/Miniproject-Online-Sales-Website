
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
            <center><h2>ตะกร้าสินค้า</h2></center> <br>

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
                        <th>เมนู</th>
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
                        <td align="center"><a href="?remove&item_id=<?php echo$value['item_id'];?>" class="btn btn-danger">ลบ</a></td>

                        <?php $total = $total+($value['item_price']*$value['item_amount']); ?>
                    </tr>
                <?php } }   ?>
                </tbody>
             </table>
                    <br>
                    <a href="show.php"><u>กลับไปหน้าสินค้า</u></a>
            <div style="text-align: right">
                
                <h5>รวมทั้งสิ้น: <b style="color:green"><?php echo number_format($total);?> </b>บาท</h5><br>

                <form action="order.php" method="POST">
                    <input type="hidden" name="id_product[]" value="<?php print_r($sum_id); ?>">
                    <input type="hidden" name="amount[]" value="<?php print_r($sum_amount); ?>">
                    <input type="hidden" name="id_user" value="<?php echo$_SESSION['user'];?>">
                    <input type="submit" class="btn btn-primary" value="ชำระเงิน">
                </form>
            </div>
            <?php }else{ ?>
                   <center><hr><p> ไม่มีสินค้าในตะกร้า</p></center>
                <?php } ?>
        </div>
    </div>
</div>



<script src="bt/js/jquery-3.4.1.slim.min.js"></script>
<script src="bt/js/bootstrap.min.js"></script>
<script src="bt/js/popper.min.js"></script>
</body>
</html>