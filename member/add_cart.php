<?php

require('../connect.php');
session_start();

if(isset($_SESSION["shopping_cart"])){
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_POST["id_product"], $item_array_id)){
        $count = count($_SESSION["shopping_cart"]);
        $item_array = array(
            'item_id' => $_POST['id_product'],
            'item_name' => $_POST['name_product'],
            'item_price' => $_POST['price'],
            'item_amount' => $_POST['amount'],
            'item_picture' => $_POST['picture'],
            'iduser_item' => $_SESSION['user']
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
            echo "<script>";
            echo "window.location='cart.php'";
            echo "</script>";
    }else{
        echo"<script>alert('สินค้าซ้ำกัน')</script>";
        echo'<script>window.location="show.php"</script>';
    }

}else{
    $item_array = array(
        'item_id' => $_POST['id_product'],
        'item_name' => $_POST['name_product'],
        'item_price' => $_POST['price'],
        'item_amount' => $_POST['amount'],
        'item_picture' => $_POST['picture'],
        'iduser_item' => $_SESSION['user']
    );
    $_SESSION["shopping_cart"][0] = $item_array;
    echo "<script>";
    echo "window.location='cart.php'";
    echo "</script>";
}





?>