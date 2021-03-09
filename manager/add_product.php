<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("logo.php"); ?>
<?php require ("show_head.php"); ?>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
    tinymce.init({
        selector: '#mytextarea'
    });
    </script>

</head>
<body>
<?php require ('../connect.php');require ('bar.php'); ?>

    <br><br>
    <div class="container">

        <h2>เพิ่มสินค้า</h2>
        <form action="add_product_action.php" enctype="multipart/form-data" method="POST">
            <div class="fomr-control row inline">
                <label for="txt_image"><b>รูป </b></label>
                <input type="file" name="txt_image" id="txt_image" class="form-control" required>
            </div>
            <div class="fomr-control row inline">
                <label for="txt_image"><b>ประเภทสินค้า </b></label>
                <select name="txt_type" class="form-control" id="">
                    <option value=""> - เลือก -</option>
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
                <input type="text" name="txt_name" id="txt_name" class="form-control" required>
            </div>
            <div class="fomr-control row inline">
                <label for="txt_des"><b>รายละเอียด </b></label>
                <textarea class="form-control" rows="4" name="txt_des" required></textarea>
            </div>
            <div class="fomr-control row inline">
                <label for="txt_price"><b>ราคา </b></label>
                <input type="number" name="txt_price" id="txt_price" class="form-control" required>
            </div>
            <div class="fomr-control row inline">
                <label for="txt_stock"><b>จำนวนในสต็อก </b></label>
                <input type="number" name="txt_stock" id="txt_stock" class="form-control" required>
            </div> <br><br>
            <div class="fomr-control row inline">
                <input type="submit" name="submit" class="btn btn-success" value="เพิ่มสินค้า">
            </div>
        </form>
    </div>

</body>
</html>