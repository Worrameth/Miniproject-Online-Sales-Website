<html>
<head>
<?php require 'show_head.php'; ?>
</head>
<body style="background-color: #eee;">
<?php
    require ("../connect.php"); 
    require ('bar.php'); 
?>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <center><h2>รายการชำระสินค้า</h2></center> <br>

                <?php 
                    $show = $conn->query("SELECT * FROM order_head INNER JOIN bill_status ON order_head.status=bill_status.status_id  WHERE `id_member`  = '".$_SESSION['user']."'   ");
                ?>
                <table class="table table-bordered" id='table_id' style="width:100%;">
                    <thead>
                        <tr>
                            <th></th>
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
                            <td align="center"><img style="width:50px;height:50px;" src="../img_bill/<?php echo$row_show['img'];?>"></td>
                            <td>69RT<?php echo$row_show['head_num'];?></td>
                            <td><?php echo$row_show['date'];?></td>
                            <td><b style=<?php 
                            if($row_show['status']=='1'){echo "'color:#D1BA24'"; }
                            else if($row_show['status']=='2'){echo "'color:#DC8A27'";}
                            else if($row_show['status']=='3'){echo "'color:#3ECB0D'";}
                            else if($row_show['status']=='4'){echo "'color:#F40007 '";}  ?> >
                            <?php echo $row_show['status_name']; ?></b></td>
                            <td><a href="bill_detail.php?head_id=<?php echo$row_show['head_num'];?>" class="btn btn-primary">รายละเอียด</a></td>
                            <!-- <td align="center"><a href="?remove&item_id=<?php echo$row_show['item_id'];?>" class="btn btn-danger">ลบ</a></td> -->
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
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