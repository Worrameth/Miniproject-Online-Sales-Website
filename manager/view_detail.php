<html>
<head>
<?php require 'show_head.php'; ?>
<link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
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
                    <a href="edit_product.php?id_product=<?php echo$row_show['ID_Product'];?>" class="btn btn-warning">แก้ไขสินค้า</a>
                    
                    
                </div>
            </div> <!-- /col-8 -->
        
        </div> <!-- /row -->

    </div> <!-- /container -->

</body>
</html>