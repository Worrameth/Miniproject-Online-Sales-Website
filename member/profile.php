<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require 'show_head.php'; ?>
</head>
<body>


<?php

require ("../connect.php"); 
require ('bar.php'); 

?>

<div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card mt-3 mb-3 mx-2">
                            <div class="card-header text-light bg-dark">
                            <i class="fa fa-user fa-lg" aria-hidden="true"></i> โปรไฟล์
                            </div>
                            <div class="card-body">
                            <table class="table table-borderless">
                                <tbody>
                                <?php 
                                    	//$user_id = $_SESSION['user'];
                                        //if(isset($_GET['id_user_list'])){$user_id=$_GET['id_user_list'];}
                                       // $result_edit = $conn->query("SELECT * FROM user_db LEFT JOIN gender ON user_db.Gender = gender.Gender_ID LEFT JOIN amphur ON user_db.City = amphur.AMPHUR_ID LEFT JOIN province ON user_db.Province = province.PROVINCE_ID LEFT JOIN district ON user_db.District = district.DISTRICT_CODE WHERE ID_User = '$user_id'");
                                       // $row_edit = $result_edit->fetch_array();
                                    //$sql = "SELECT * FROM user_db WHERE ID_User ='".$_SESSION['user']."' ";
                                    //$result = $conn->query($sql);
                                    //$row = $result->fetch_assoc();
                                    $sql="SELECT * FROM user_db LEFT JOIN gender ON user_db.Gender = gender.Gender_ID LEFT JOIN amphur ON user_db.City = amphur.AMPHUR_ID 
                                    LEFT JOIN province ON user_db.Province = province.PROVINCE_ID 
                                    LEFT JOIN district ON user_db.District = district.DISTRICT_CODE WHERE ID_User ='".$_SESSION['user']."' ";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                ?>
                                    <tr>
                                        <th scope="row" class="text-md-right" style="width:30%">สถานะ:</th>
                                        <td><span class="badge badge-success"><?php echo $row["status"]; ?></span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-md-right" style="width:30%">ชื่อ-สกุล:</th>
                                        <td><?php echo $row["Name"]. " ".$row["Last_Name"]; ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-md-right" style="width:30%">เพศ:</th>
                                        <td><?php echo $row["Gender_Full"]; ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-md-right" style="width:30%">ที่อยู่:</th>
                                        <td><?php echo $row["Address"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-md-right" style="width:30%">จังหวัด:</th>
                                        <td><?php echo $row["PROVINCE_NAME"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-md-right" style="width:30%">อำเภอ:</th>
                                        <td><?php echo $row["AMPHUR_NAME"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-md-right" style="width:30%">ตำบล:</th>
                                        <td><?php echo $row["DISTRICT_NAME"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-md-right" style="width:30%">รหัสไปรษณีย์:</th>
                                        <td><?php echo $row["POSTCODE"]; ?></td>
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                            </div> <!-- card body -->
                            <div class="card-footer">
                                <a href="edit.php"><button type="button" class="btn btn-warning"> <i class="fa fa-pencil" aria-hidden="true"></i> แก้ไขโปรไฟล์</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include('js.php');  ?>
    
</body>
</html>
