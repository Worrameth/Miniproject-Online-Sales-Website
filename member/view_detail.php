<html>
<head>
<?php require 'show_head.php'; ?>
</head>
<body style="background-color: #eee;">


<?php

require ("../connect.php"); 
require ('bar.php'); 




?>

        <?php
            $sql_show = $conn->query("SELECT * FROM product_db WHERE ID_Product='".$_GET['id_product']."' ");
            $row_show=$sql_show->fetch_assoc();
        ?>

    <div class="container">

        <h2 class="mt-5">ชื่อสินค้า:<?php echo$row_show['Name_Product'];?></h2> <br>
        <hr>

        <div class="row">

            <div class="col-4">
                <img src="../img/<?php echo$row_show['Picture'];?>" style="width:250px; height: 250px;" alt=""> <br>    
            </div> <!-- /col-4 -->

           
                <div class="col-8">    
                    <div style="word-wrap: break-word;">
                        <p><h4><b>รายละเอียดสินค้า</b></h4><br><?php echo$row_show['Description'];?> </p> 
                        <p style="text-align:right;"><b>สินค้าคงเหลือ</b> <?php echo$row_show['Stocks']?> รายการ</p> 
                        <p style="text-align:right;"><b>ราคา</b> <?php echo$row_show['Price']?> บาท</p>
                        <hr>
                            <?php 
                                $sql_amount = $conn->query("SELECT MAX(Stocks) as max_stocks FROM product_db WHERE ID_Product = '".$_GET['id_product']."' ");
                                $result_amount = $sql_amount->fetch_assoc();
                            ?>
                        <form action="add_cart.php" method="POST">
                            <input type="hidden" name="picture" value="<?php echo$row_show['Picture']; ?>">    
                            <input type="hidden" name="id_user" value="<?php echo$_SESSION['user']; ?>">
                            <input type="hidden" name="id_product" value="<?php echo$_GET['id_product'];?>">
                            <input type="hidden" name="name_product" value="<?php echo$row_show['Name_Product'];?>">
                            <input type="hidden" name="price" value="<?php echo$row_show['Price'];?>">
                            <input name="amount" type="number" min="1" max="<?php echo$result_amount['max_stocks']; ?>" value="1">
                            <?php 
                                if($result_amount['max_stocks']<=0){ 
                                    echo "<a class='btn btn-secondary disabled' disabled role='button' aria-disabled='true'>เพิ่มลงตะกร้า</a>";
                                }else{
                                    echo "<input type='submit' class='btn btn-success' value='เพิ่มในตะกร้า'>";
                                }
                            ?>
                            
                        </form>

                        
                    </div>
                </div> <!-- /col-8 -->
           
        
        </div> <!-- /row -->

    </div> <!-- /container -->

</body>
</html>