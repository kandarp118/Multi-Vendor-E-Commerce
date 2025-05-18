<?php
    include("connection.php");

    $p_author = $_POST['p_author'];
    $pro_id = $_POST['p_id'];
    $pro_nm = $_POST['p_name'];
    $pro_quantity = $_POST['p_qun'];

    $pro_p_price = $_POST['purchase_price'];
    $pro_tax_rate = $_POST['tax_rate'];
    $pro_tax_amount = $_POST['tax_amount'];
    $pro_profit_amount = $_POST['profit_amount'];
    $pro_original_price = $_POST['original_price'];
    $pro_s_price = $_POST['selling_price'];

    $pro_desc = $_POST['p_desc'];
    $pro_b_id = $_POST['p_ba'];
    $pro_ca_id = $_POST['p_cat'];
    $pro_image_old = $_FILES['file']['tmp_name'];

    $pro_image=$_FILES['file']['name'];

    if ($pro_image_old === "") {
        $upd_pro_query = "UPDATE product SET p_name='$pro_nm', p_qauntity='$pro_quantity', p_purchase_price='$pro_p_price', P_tax_rate='$pro_tax_rate', p_tax_amount='$pro_tax_amount', p_profit_amount='$pro_profit_amount',p_original_price='$pro_original_price',p_selling_price='$pro_s_price', p_description='$pro_desc', b_id='$pro_b_id', ca_id='$pro_ca_id' WHERE p_id='$pro_id' AND p_author='$p_author'";
    } else {
        $pro_image_new = 'C:/xampp/htdocs/Akommerce/admin/img/pro_img/';
        if (move_uploaded_file($pro_image_old, $pro_image_new.$pro_image))  {
            $upd_pro_query = "UPDATE product SET p_name='$pro_nm', p_image='$pro_image', p_qauntity='$pro_quantity', p_purchase_price='$pro_p_price',P_tax_rate='$pro_tax_rate', p_tax_amount='$pro_tax_amount', p_profit_amount='$pro_profit_amount',p_original_price='$pro_original_price', p_selling_price='$pro_s_price', p_description='$pro_desc', b_id='$pro_b_id', ca_id='$pro_ca_id' WHERE p_id='$pro_id' AND p_author='$p_author'";
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