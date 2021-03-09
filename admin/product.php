<!DOCTYPE html>
<html lang="en">
<head>
<?php require("show_head.php"); ?>
<?php require ("logo.php"); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>
<body>
<?php require ("../connect.php");require ('bar.php'); ?>

    <br>
    <div class="container">
        <a href="add_product.php" class="btn btn-primary">เพิ่มสินค้า</a>
        <a href="add_type.php" class="btn btn-info">เพิ่มประเภทสินค้า</a>
        <br><br>
        <table id="table_id">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>ID</th>
                    <th>ชื่อ</th>
                    <th>รายละเอียด</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>แก้ไขสินค้า</th>
                    <th>ลบสินค้า</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require("../connect.php");
                    $result_show = $conn->query("SELECT * FROM product_db");
                    while($row_show=$result_show->fetch_assoc()){
                ?>
                <tr>
                    <td><img src="../img/<?php echo$row_show['Picture'];?>" style="width:75px;height:75px;"></td>
                    <td><?php echo$row_show['ID_Product'];?></td>
                    <td><?php echo$row_show['Name_Product'];?></td>
                    <?php
                        $des_sub = substr($row_show['Description'],0,55);
                    ?>
                    <td><?php echo$des_sub;?></td>
                    <td><?php echo$row_show['Price'];?></td>
                    <td><?php echo$row_show['Stocks'];?></td>
                    <th><a href="edit_product.php?id_product=<?php echo$row_show['ID_Product'];?>">EDIT</a></th>
                    <th><a href="remove_product.php?id_product=<?php echo$row_show['ID_Product'];?>" onClick="return confirm('ยืนยันการลบ?')">DELETE</a></th>
                    
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>

</body>
</html>