<html>
<head>
<?php require 'show_head.php'; ?>
<link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
</head>
<body>


<?php
require ("../connect.php"); require ('bar.php'); ?>

<!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- /.col-lg-3 -->

      <div class="col-lg-12">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel" style="width:100%;">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="../banner1.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="../banner2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="../banner3.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
<div><h2>สินค้าใหม่ <a style="float:right; font-size:20px;"href="show.php"><u>สินค้าทั้งหมด</u></a></h2><br></div>
        <div class="row">
          


        <?php
            $sql_show = $conn->query("SELECT * FROM product_db ORDER BY ID_Product DESC Limit 3");
            while($row_show=$sql_show->fetch_assoc()){
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
              <a href="view_detail.php?id_product=<?php echo$row_show['ID_Product']; ?>"><img style="width:100%; height:200px" class="card-img-top" src="../img/<?php echo$row_show['Picture']; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="view_detail.php?id_product=<?php echo$row_show['ID_Product']; ?>"><?php echo$row_show['Name_Product']; ?></a>
                </h4>
                <h5>ราคา <?php echo$row_show['Price']; ?> บาท</h5>
                <?php if($row_show['Stocks']<=0){
                  echo "<h5 style=color:red>สินค้าหมด</h5>";}?>
              </div>

            </div>
          </div>
            <?php } ?>


            </div>
          </div>

        </div>
        
        <!-- /.row -->
        <div><h2>สินค้าขายดี <a style="float:right; font-size:20px;"href="show.php"><u>สินค้าทั้งหมด</u></a></h2><br></div>
        <div class="row">
          


        <?php
            $sql_show = $conn->query("SELECT * FROM product_db ORDER BY total_sales DESC Limit 3");
            while($row_show=$sql_show->fetch_assoc()){
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
              <a href="view_detail.php?id_product=<?php echo$row_show['ID_Product']; ?>"><img style="width:100%; height:200px" class="card-img-top" src="../img/<?php echo$row_show['Picture']; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="view_detail.php?id_product=<?php echo$row_show['ID_Product']; ?>"><?php echo$row_show['Name_Product']; ?></a>
                </h4>
                <h5>ราคา <?php echo$row_show['Price']; ?> บาท</h5>
                <?php if($row_show['Stocks']<=0){
                  echo "<h5 style=color:red>สินค้าหมด</h5>";}?>
              </div>

            </div>
          </div>
            <?php } ?>


            </div>
          </div>

        </div>
        

      </div>
      <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; 69Retrotion 2020 <a href="adminlogin.php">Admin</a></p>
    </div>
    <!-- /.container -->
  </footer>



<script src="bt/js/jquery-3.4.1.slim.min.js"></script>
<script src="bt/js/bootstrap.min.js"></script>
<script src="bt/js/popper.min.js"></script>
</body>
</html>