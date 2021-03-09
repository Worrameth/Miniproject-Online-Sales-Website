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
        <a class="nav-link" href="login.php">รายการชำระเงิน</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">ติดต่อเรา</a>
        </li>
        </ul>
        <?php

            $active = isset($_GET['active']) ? $_GET['active'] : "0";

            if(isset($_SESSION['user']) && isset($_SESSION['password'])){

                
                $show_status = $_SESSION['status'];

                    if($show_status=='admin'){
                        $show_now = "<a href='#' class='btn btn-danger btn-outline btn-sm '><b>สถานะ:</b> $show_status</a>";
                    }if($show_status=='manager'){
                        $show_now = "<a href='#' class='btn btn-primary btn-outline btn-sm'><b>สถานะ:</b> $show_status</a>";
                    }if($show_status=='member'){
                        $show_now = "<a href='#' class='btn btn-success btn-outline btn-sm'><b>สถานะ:</b> $show_status</a>";
                    }

                echo $show_now.'&nbsp;';


                $bar_sohw_fname = $_SESSION['fname'];
                $bar_sohw_lname = $_SESSION['lname'];
                if($show_status=='admin')
                echo "<a href='admin/edit.php' style='color:#eee;'> $bar_sohw_fname  $bar_sohw_lname &nbsp;</a>";

                echo "<a href='logout.php' class='btn btn-danger'>Logout</a> ";

               

            }elseif($active=='1'){
            }else{
                echo "<a href='login.php?active=1' class='btn btn-success'>Login</a> ";
            }
        ?>
            
        </form>
    </div>
</nav>