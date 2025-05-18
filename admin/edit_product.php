<?php
    include("connection.php");
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);
    // echo "</pre>";
    // exit();
    $pro_id = $_POST['p_id'];
    $pro_nm = $_POST['p_nm'];
    $pro_quantity = $_POST['p_qun'];
    $pro_p_price = $_POST['p_p_prc'];
    $pro_s_price = $_POST['p_s_prc'];
    $pro_desc = $_POST['p_desc'];
    $pro_b_id = $_POST['p_b_id'];
    $pro_ca_id = $_POST['p_ca_id'];
    $pro_image_old = $_FILES['p_img']['tmp_name'];
    $pro_image=$_FILES['p_img']['name'];

    if ($pro_image_old === "") {
        $upd_pro_query = "UPDATE product SET p_name='$pro_nm', p_qauntity='$pro_quantity', p_purchase_price='$pro_p_price', p_selling_price='$pro_s_price', p_description='$pro_desc', b_id='$pro_b_id', ca_id='$pro_ca_id' WHERE p_id='$pro_id'";
    } else {
        $pro_image_new = './img/pro_img/';
        if (move_uploaded_file($pro_image_old, $pro_image_new.$pro_image))  {
            $upd_pro_query = "UPDATE product SET p_name='$pro_nm', p_image='$pro_image', p_qauntity='$pro_quantity', p_purchase_price='$pro_p_price', p_selling_price='$pro_s_price', p_description='$pro_desc', b_id='$pro_b_id', ca_id='$pro_ca_id' WHERE p_id='$pro_id'";
        } else {
            echo "error in upload";
        }        
    }  
    
    $upd_pro_result = mysqli_query($c,$upd_pro_query);

    if ($upd_pro_result) {
        echo "success";
    } else {
        echo "Faid Update Product Data";
    }

?>