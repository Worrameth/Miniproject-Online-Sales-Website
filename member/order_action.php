<?php

    require("../connect.php");
    session_start();


    $df = 1;
    $check_head = $conn->query("SELECT MAX(head_num) as max_ord FROM order_head");
    $fetch_head = $check_head->fetch_assoc();
    $num_next = $df+$fetch_head['max_ord'];

    //img ****************************************
    date_default_timezone_set('Asia/Bangkok');
    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    
    $path="../img_bill/";
    $type = strrchr($_FILES['txt_image']['name'],".");
    $newname =$numrand.$date1.$type;
    
    $path_copy=$path.$newname;

    //end img ****************************************

    if($type=='.jpg' or $type=='.png'){
        move_uploaded_file($_FILES['txt_image']['tmp_name'],$path_copy); 
        $insert_head = $conn->query("INSERT INTO order_head (`head_num`,`img`,`address`,`id_member`,`status`) VALUES ('$num_next','$newname','".$_POST['txt_address']."','".$_SESSION['user']."',1 )");
    }else{
        echo "<script>";
        echo "alert(\"เลือกไฟล์รูปภาพไอควาย! \");";
        echo "window.history.back()";
        echo "</script>";
        exit;
    }
    

    

    foreach($_SESSION['shopping_cart'] as $key => $value){
        if($value['iduser_item']==$_SESSION['user']){

            $check_stock = $conn->query("SELECT Stocks FROM product_db WHERE ID_Product='".$value['item_id']."' ");
            $fetch_stock = $check_stock->fetch_assoc();
            $now_stock = $fetch_stock['Stocks'];
            $totalcut = $now_stock-$value['item_amount'];
            
            //ตัด stock
            $cut_stock = $conn->query("UPDATE product_db SET Stocks='$totalcut' WHERE ID_Product='".$value['item_id']."' ");

            if(!$cut_stock){
                echo "<script>";
                echo "alert(\"ตัด Stock ไม่สำเร็จ! \");";
                echo "window.history.back()";
                echo "</script>";
                exit;
            }

            //เพิ่มข้อมูล
            $insert_item = $conn->query("INSERT INTO order_product (`id_product`,`id_user`,`amount`,`or_head`) VALUES ('".$value['item_id']."','".$value['iduser_item']."','".$value['item_amount']."','$num_next' )");
            if(!$insert_item){
                echo "<script>";
                echo "alert(\"เพิ่มข้อมูลลง Order ไม่ได้ \");";
                echo "window.history.back()";
                echo "</script>";
                exit;
            }

            $df_item = $value['item_amount'];
            $check_total_sell = $conn->query("SELECT total_sales FROM product_db WHERE ID_Product  = '".$value['item_id']."' ");
            $fetch_total_sell = $check_total_sell->fetch_assoc();

            $num_total_sell = $df_item+$fetch_total_sell['total_sales'];
            $update_total_sell = $conn->query("UPDATE product_db SET total_sales = '$num_total_sell' WHERE ID_Product  = '".$value['item_id']."' ");
            if(!$update_total_sell){
                echo "<script>";
                echo "alert(\"Update ข้อมูล Total_sales ไม่ได้ \");";
                echo "window.history.back()";
                echo "</script>";
                exit;
            }


        }
    }

    unset($_SESSION['shopping_cart']);
    
    echo "<script>";
    echo "alert(\"ยืนยันการชำระเงินสำเร็จ! \");";
    echo "window.location='bill_status.php'";
    echo "</script>";

?>