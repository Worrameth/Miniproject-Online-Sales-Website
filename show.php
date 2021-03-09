<html>
<head>
<?php require 'show_head.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body>


<?php 
require ('connect.php');
require ('bar.php'); ?>

<!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">69Retrotion</h1>
        <div class="search">
            
              <input type="text" class="form-control" placeholder="ค้นหา"  id="myInput">
        </div><br>

        <div class="list-group">
        <a href="show.php" class="list-group-item">► ALL</a>
          <?php
            $sql_type = $conn->query("SELECT * FROM type_product");
            while($row_type=$sql_type->fetch_assoc()){
          ?>
          <a href="type.php?type_id=<?php echo$row_type['type_id']; ?>" class="list-group-item">► <?php echo$row_type['name_id']; ?></a>
            <?php } ?>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9 mt-4">



        <div class="row" id='myDIV'>



          <?php
            $sql_show = $conn->query("SELECT * FROM product_db");
            while($row_show=$sql_show->fetch_assoc()){
          ?>

          

          <div class="col-lg-4 col-md-6 mb-4" id="userTbl">
            <div class="card h-100">
              <a href="view_detail.php?id_product=<?php echo$row_show['ID_Product']; ?>"><img style="width:100%; height:200px" class="card-img-top" src="img/<?php echo$row_show['Picture']; ?>" alt=""></a>
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
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

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

<!-- <script>
$(document).ready(function(){
    $('#search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl div').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV  div*").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>