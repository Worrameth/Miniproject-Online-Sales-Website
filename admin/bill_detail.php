<html>
<head>
<?php require 'show_head.php'; ?>
</head>

<style>


#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
 
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 400px;
  max-width: 500px;
  
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#customers td, #customers th {
  
  padding: 8px;
}



#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<body style="background-color: #eee;">
<?php
    require ("../connect.php"); 
    require ('bar.php'); 
?>
<?php 
                    $show = $conn->query("SELECT * FROM order_product INNER JOIN order_head ON order_product.or_head=order_head.head_num INNER JOIN bill_status ON order_head.status=bill_status.status_id  WHERE `or_head` = '".$_GET['head_id']."' ");
                    $row_show = $show->fetch_assoc();
                ?>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
            
                <center><h2>รายการสั่งซื้อ</h2><br>
                <b>เลขที่ใบเสร็จ</b> 69RT<?php echo $row_show['head_num']; ?>          <b>ชื่อผู้สั่ง</b> <?php echo $row_show['id_member']; ?>          <b>วันเวลาที่สั่ง</b> <?php echo $row_show['date']; ?> 
                <hr>
                
              <span>                                   
              <div style="width: 70%;;padding:  background:#FFFF" >
              
              <table id='customers' style="width:100%">
              <thead >
              <tr>
              <td></td>
              <td></td>
              <td></p></td>
              </tr>
              </thead>
              <tbody>
              <?php
                $show_list = $conn->query("SELECT * FROM order_head as oh INNER JOIN order_product as op ON oh.head_num=op.or_head INNER JOIN product_db as pdb ON op.id_product=pdb.ID_Product INNER JOIN user_db as udb ON oh.id_member=udb.ID_User WHERE oh.head_num='".$_GET['head_id']."' ");
                $total_list = 0;

                while($row_show_list = $show_list->fetch_assoc()){
              ?>
              <tr>
              <td><?php echo$row_show_list['Name_Product'];?></td>
              <td>x <?php echo$row_show_list['amount'];?></td>
              <td><?php echo ($row_show_list['Price']*$row_show_list['amount']);?></td>
              </tr>
                <?php
                  $total_list += ($row_show_list['Price']*$row_show_list['amount']);
                    } 
                    
                    ?>
                <td></td>
                <td align="right"><b>รวม</b></td>
                <td><?php echo$total_list;?> บาท</td>
                
              </tbody>
              </table><br><hr>

              <?php
	
	$user_id = $_SESSION['user'];
	if(isset($_GET['id_user_list'])){$user_id=$_GET['id_user_list'];}
    $result_edit = $conn->query("SELECT * FROM user_db LEFT JOIN gender ON user_db.Gender = gender.Gender_ID LEFT JOIN amphur ON user_db.City = amphur.AMPHUR_ID LEFT JOIN province ON user_db.Province = province.PROVINCE_ID LEFT JOIN district ON user_db.District = district.DISTRICT_CODE WHERE ID_User = '$user_id'");
    $row_edit = $result_edit->fetch_array();
?>

              <p style="text-align:left;"><h3>ข้อมูลการจัดส่ง</h3></p>
              <p style="text-align:left;"><b>ชื่อ</b> <?php echo $row_edit['Name']; ?> <?php echo $row_edit['Last_Name']; ?></p>
              <p style="text-align:left;"><b>ที่อยู่</b> <?php echo $row_show['address']; ?> </p>
                            <p style="text-align:left;"><td><b>รูปใบเสร็จ</b></td> <br>
                            <td>
                                <img id="myImg" style="width:100px;height:100px;" src="../img_bill/<?php echo$row_show['img'];?>">
                                <!-- The Modal -->
                                <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>
                            </td></p><br><hr><br>
              <h3 style="text-align:right;">สถานะสินค้า: <u style=<?php 
              if($row_show['status']=='1'){echo "'color:#D1BF24'"; }
              else if($row_show['status']=='2'){echo "'color:#DC8F27'";}
              else if($row_show['status']=='3'){echo "'color:#3ECB0D'";}
              else if($row_show['status']=='4'){echo "'color:#F40007 '";}  ?> >
              <?php echo $row_show['status_name']; ?></u></h3>
                    
                    <form action="bill_detail_action.php" method="POST">
                    <input  style="opacity: 0;" type="text" name="txt_user" value="<?php echo $row_show['oh_id']; ?>" checked="checked">  
                     <select  name="txt_status" class="form-control" id="" style="width:200px;  float:right;">
                    <option  value="<?php echo$row_show['status']; ?>"><?php echo$row_show['status_name']; ?></option><br>
                        <?php
                      $sql_get_status = $conn->query("SELECT * FROM bill_status");
                      while($row_get_status=$sql_get_status->fetch_assoc()){
                    ?>
                    <option value="<?php echo$row_get_status['status_id']; ?>"><?php echo$row_get_status['status_name']; ?></option>
                        <?php } ?>
                </select><br><br>
                <button class="btn btn-lg btn-warning btn-block" type="submit" onClick="return confirm('ยืนยันการแก้ไช?')" style="width:150px; float:right; font-size:14px;">ยืนยันการแก้ไข</button>
                </form>
              <table>
              <thead>
              <tr>
              <td></td>
              </tr>
              </thead>
              </table>
              </div>

                
                </center>
            </div>
        </div>
    </div>

</body>
</html>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
<script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>