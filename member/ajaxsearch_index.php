<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <?php  require ('../connect.php');?>
</body>
</html>

<div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
</div>

<div class="row">



          <?php
            $sql_show = $conn->query("SELECT * FROM product_db");
            while($row_show=$sql_show->fetch_assoc()){
          ?>

          

          <div class="col-lg-4 col-md-6 mb-4" id="userTbl">
            <div class="card h-100">
              <a href="view_detail.php?id_product=<?php echo$row_show['ID_Product']; ?>"><img style="width:100%; height:200px" class="card-img-top" src="../img/<?php echo$row_show['Picture']; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="view_detail.php?id_product=<?php echo$row_show['ID_Product']; ?>"><?php echo$row_show['Name_Product']; ?></a>
                </h4>
                <h5>ราคา <?php echo$row_show['Price']; ?> บาท</h5>
              </div>

            </div>
          </div>

            <?php } ?>

        </div>
<script>
$(document).ready(function(){
    $('.search').on('keyup',function(){
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
</script>