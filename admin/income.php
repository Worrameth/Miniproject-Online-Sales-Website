<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require ('show_head.php');?>
    <link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>
<body>
    <?php 
    require ('../connect.php');
    require ('bar.php');
    $sql_total=$conn->query("SELECT SUM(product_db.Price) FROM order_head INNER JOIN order_product ON order_head.head_num=order_product.or_head INNER JOIN product_db ON order_product.id_product=product_db.ID_Product WHERE order_head.status=2");
    $total = $sql_total->fetch_assoc();
    $sql_count=$conn->query("SELECT COUNT(product_db.Price) FROM order_head INNER JOIN order_product ON order_head.head_num=order_product.or_head INNER JOIN product_db ON order_product.id_product=product_db.ID_Product WHERE order_head.status=2");
    $count = $sql_count->fetch_assoc();
    ?><br><br>
    
   
    <div class="container" style="float:center; ">
    <h2 style="text-align:center;">ข้อมูลการขาย</h2><hr><br>
    <table id="table_id">
            <thead>
                <tr>
                    <th>รูปสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>วันเวลาที่สั่งซื้อ</th>
                    <th>ราคาต่อชิ้น</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql_all= $conn->query("SELECT * FROM order_head INNER JOIN order_product ON order_head.head_num=order_product.or_head INNER JOIN product_db ON order_product.id_product=product_db.ID_Product WHERE order_head.status=2");
                                       
                    while($row_show=$sql_all->fetch_assoc()){?>
                <tr>
                    <td><img src="../img/<?php echo$row_show['Picture'];?>" style="width:75px;height:75px;"></td>                   
                    <td><?php echo$row_show['Name_Product'];?></td>
                    <td><?php echo$row_show['date'];?></td>
                    <td><?php echo number_format($row_show['Price']);?></td>
                    <td><?php echo$row_show['amount'];?></td>
                    <td><?php echo number_format($row_show['Price']*$row_show['amount']);?></td>
                </tr>
                 <?php } ?>
            </tbody>
        </table>
        <hr>
    <center>
    <h4>รายได้ทั้งหมด: <?php echo number_format($total['SUM(product_db.Price)']);?> บาท จำนวนที่ขายได้: <?php echo number_format ($count['COUNT(product_db.Price)']);?> </h4>
    </center>
    <hr>
    
    </div><br><br>
</body>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
</html>