<?php require ("logo.php"); ?>
<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">69RETROTION</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">หน้าแรก</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="show.php">การสั่งซื้อสินค้าและการจัดส่ง</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="bill_admin.php">ข้อมูลการชำระเงิน</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="product.php">รายชื่อสินค้า</a>
        </li>
        </ul>
        <?php
            if(isset($_SESSION['user']) && isset($_SESSION['password'])){

                
                $show_status = $_SESSION['status'];

                    if($show_status=='admin'){
                        $show_now = "<a href='edit.php' class='btn btn-outline-danger btn-sm '><b>สถานะ:</b> $show_status</a>";
                    }if($show_status=='manager'){
                        $show_now = "<a href='edit.php' class='btn btn-outline-primary btn-sm'><b>สถานะ:</b> $show_status</a>";
                    }if($show_status=='member'){
                        $show_now = "<a href='edit.php' class='btn btn-outline-success btn-sm'><b>สถานะ:</b> $show_status</a>";
                    }

                echo $show_now.'&nbsp;';


                $get_name_bar = $conn->query("SELECT * FROM user_db WHERE ID_User='".$_SESSION['user']."' ");
                $row_get_name_bar = $get_name_bar->fetch_assoc();

                ?>

                <div class="btn-group">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo "<a href='profile.php' style='color:#eee;'>".$row_get_name_bar['Name'].' '.$row_get_name_bar['Last_Name']."</a>"; ?>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">โปรไฟล์</a>
                    <a class="dropdown-item" href="edit.php">แก้ไขโปรไฟล์</a>
                    <a class="dropdown-item" href="../logout.php"><b style="color:red;">ออกจากระบบ</b></a>
                </div>
                </div>
                

               <?php
            }else{
                echo "<a href='login.php' class='btn btn-success'>เข้า</a> ";
            }
        ?>
            
        </form>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>