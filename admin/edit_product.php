<link rel="shortcut icon" type="image/x-icon" href="../Logo.ico" />
<?php
    require("../connect.php");
    $get_id_product = $_GET['id_product'];

    $sql_show = $conn->query("SELECT * FROM product_db WHERE ID_Product='$get_id_product' ");
    $row_show = $sql_show->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require("show_head.php"); ?>
</head>
<body>
<?php require ('bar.php'); ?>

    <br><br>
    <div class="container">

        <h2>แก้ไขสินค้า</h2>
        <form action="edit_product_action.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id_product" value="<?php echo$_GET['id_product'];?>">
            <div class="fomr-control row inline">
                <label for="txt_image"><b>รูป </b></label>
                <input type="file" name="txt_image" id="txt_image" class="form-control">
                <img style="width:175px;height:175px;" src="../img/<?php echo$row_show['Picture'];?>" alt="" required>
            </div>
            <div class="fomr-control row inline">
                <label for="txt_image"><b>ประเภทสินค้า </b></label>
                <select name="txt_type" class="form-control" id="">
                    <?php
                        $sql_get_type_ac = $conn->query("SELECT * FROM product_db as pd INNER JOIN type_product as tp ON pd.type_id = tp.type_id WHERE pd.ID_Product='".$_GET['id_product']."' ");
                        $row_get_type_ac=$sql_get_type_ac->fetch_assoc()
                    ?>
                    <option value="<?php echo$row_get_type_ac['type_id']; ?>"><?php echo$row_get_type_ac['name_id']; ?></option>
                    <?php
                        $sql_get_type = $conn->query("SELECT * FROM type_product");
                        while($row_get_type=$sql_get_type->fetch_assoc()){
                    ?>
                    <option value="<?php echo$row_get_type['type_id']; ?>"><?php echo$row_get_type['name_id']; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="fomr-control row inline">
                <label for="txt_name"><b>ชื่อสินค้า </b></label>
                <input type="text" name="txt_name" id="txt_name" class="form-control" value="<?php echo$row_show['Name_Product'];?>"required>
            </div>
            <div class="fomr-control row inline">
                <label for="txt_des"><b>รายละเอียด </b></label>
                <textarea class="form-control" id="txt_des" rows="4" name="txt_des" required><?php echo$row_show['Description'];?></textarea>
            </div>
            <div class="fomr-control row inline">
                <label for="txt_price"><b>ราคา </b></label>
                <input type="number" name="txt_price" id="txt_price" class="form-control" value="<?php echo$row_show['Price'];?>"required>
            </div>
            <div class="fomr-control row inline">
                <label for="txt_stock"><b>จำนวนในสต็อก </b></label>
                <input type="number" name="txt_stock" id="txt_stock" class="form-control" value="<?php echo$row_show['Stocks'];?>" required>
            </div> <br><br>
            <div class="fomr-control row inline">
                <input type="hidden" name="pic_old" value="<?php echo$row_show['Picture'];?>">
                <input type="submit" name="submit" class="btn btn-success" value="แก้ไขสินค้า">
            </div>
        </form>
    </div>

</body>
</html>