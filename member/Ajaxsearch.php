<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

 function index()
 {
  $this->load->view('ajaxsearch');
 }

 function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('ajaxsearch_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->ajaxsearch_model->fetch_data($query);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>Customer Name</th>
       <th>Address</th>
       <th>City</th>
       <th>Postal Code</th>
       <th>Country</th>
      </tr>
  ';
  if($data->num_rows() > 0)
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
}else{
	echo 'Data Not Found';
}
?>