<?php
//fetch.php
if(isset($_POST["query"]))
{
require ('../connect.php');
 $request = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM product_db
  WHERE Name_Product LIKE '%".$request."%' 

 ";
 $result = mysqli_query($conn, $query);
 $data =array();

if(mysqli_num_rows($result) > 0)
 {
    while($row = mysqli_fetch_array($result))
	{?>
		 <div class="col-lg-4 col-md-6 mb-4" id="myTable">
            <div class="card h-100">
              <a href="view_detail.php?id_product=<?php echo$row['ID_Product']; ?>"><img style="width:100%; height:200px" class="card-img-top" src="../img/<?php echo$row['Picture']; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="view_detail.php?id_product=<?php echo$row['ID_Product']; ?>"><?php echo$row['Name_Product']; ?></a>
                </h4>
                <h5>ราคา <?php echo$row['Price']; ?> บาท</h5>
              </div>

            </div>
          </div>

            <?php } 
 }else
{
 $data = 'No Data Found';


}


 if(isset($_POST['typehead_search']))
 {
 
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>