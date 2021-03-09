<!DOCTYPE html>
<html lang="en">
<head>
<?php require ("logo.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require("show_head.php"); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>
<body>
<?php require ("../connect.php");require ('bar.php'); ?>

<div class="container mt-5">

<form action="add_type_action.php" method="POST">
    <label for="type"><b>ชื่อประเภท :</b></label>
    <input class="form-control" type="text" name="txt_type_name" id="type">
    <input type="submit" value="เพิ่มประเภท" class="btn btn-success mt-2">
</form>

</div>
    
</body>
</html>