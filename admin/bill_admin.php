<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require("show_head.php"); ?>
    <link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>
<body>
    <?php require ('../connect.php') ?>
    <?php require ('bar.php') ?>
    <br>
    <div class="container">
        
            
                <center><h2>ข้อมูลการชำระเงิน</h2></center> <br>

                <?php 
                    $show = $conn->query("SELECT * FROM order_head INNER JOIN bill_status ON order_head.status=bill_status.status_id ORDER BY head_num DESC");
                ?>
                <table id="table_id">
                    <thead>
                        <tr>
                            
                            <th>ชื่อผู้สั่งสินค้า</th>
                            <th>เลขที่ออดอร์</th>
                            <th>เวลาสั่งสินค้า</th>
                            <th>สถานะสินค้า</th>
                            <th>เมนู</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                        while($row_show = $show->fetch_assoc()){
                            
                    ?>
                        <tr>
                            
                            <td><?php echo$row_show['id_member'];?></td>
                            <td>69RT<?php echo$row_show['head_num'];?></td>
                            <td><?php echo$row_show['date'];?></td>
                            <td><b style=<?php 
                            if($row_show['status']=='1'){echo "'color:#D1BA24'"; }
                            else if($row_show['status']=='2'){echo "'color:#DC8A27'";}
                            else if($row_show['status']=='3'){echo "'color:#3ECB0D'";}
                            else if($row_show['status']=='4'){echo "'color:#F40007 '";}  ?> >
                            <?php echo $row_show['status_name']; ?></b>
                            </td>
                            <td><a href="bill_detail.php?head_id=<?php echo$row_show['head_num'];?>" class="btn btn-primary">รายละเอียด</a></td>
                            <!-- <td align="center"><a href="?remove&item_id=<?php echo$row_show['item_id'];?>" class="btn btn-danger">ลบ</a></td> -->
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            
        
    </div>
</body>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
</html>