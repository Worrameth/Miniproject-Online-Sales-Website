<html>
<head>
<?php require("show_head.php"); ?>
<link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>
<body>
<?php require ("../connect.php"); require ('bar.php'); ?>

    <div class="top">
    <br>

    </div>
    <h2 style="text-align:center;">ข้อมูลรายชื่อสมาชิก</h2><hr>  
    <div class="box" style="padding-left: 200px;padding-right: 200px;">
        <table class="table table-bordered" id="table_id">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>ID_USER</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th style="width:200px;">Address</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Postcode</th>
                        <th>District</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    
                    </tr>
            </thead>
        <tbody>

            <?php
            require ("../connect.php");
            $result = $conn->query("SELECT * FROM user_db LEFT JOIN gender ON user_db.Gender = gender.Gender_ID LEFT JOIN amphur ON user_db.City = amphur.AMPHUR_ID LEFT JOIN province ON user_db.Province = province.PROVINCE_ID LEFT JOIN district ON user_db.District = district.DISTRICT_CODE");
            while($row = $result->fetch_array()){ ?>
        <tr>    
        <td><?php echo $row["ID_User"]; ?></td>
        <td><?php echo $row["Password"]; ?></td>
        <td><?php echo $row["Name"]; ?></td>
        <td><?php echo $row["Last_Name"]; ?></td>
        <td><?php echo $row["Gender_Full"]; ?></td>
        <td style="width:20%;"><?php echo $row["Address"]; ?></td>
        <td><?php echo $row["AMPHUR_NAME"]; ?></td>
        <td><?php echo $row["PROVINCE_NAME"]; ?></td>
        <td><?php echo $row["Postcode"]; ?></td>
        <td><?php echo $row["DISTRICT_NAME"]; ?></td>
        <td><?php echo $row["status"]; ?></td>
        <td><a href="edit_user.php?id_user_list=<?php echo $row["ID_User"]; ?>">EDIT</a></td>
        <td><a href="remove_emp.php?id_user_list=<?php echo $row["ID_User"]; ?>" onClick="return confirm('ยืนยันการลบ?')">DELETE</a></td>
        
        </tr>
           
        </tbody>
        <?php  } ?>
        </table>
        </div>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>

</body>
</html>