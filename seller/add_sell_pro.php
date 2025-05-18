<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION['status_seller']))
    {
        unset($_SESSION['status_seller']);
    }

    $pro_author = $_POST['p_author'];
    $pro_nm = $_POST['pro_nm'];
    $pro_quantity = $_POST['pro_qun'];

    $pro_p_price = $_POST['purchase_price'];
    $pro_tax_rate = $_POST['tax_rate'];
    $pro_tax_amount = $_POST['tax_amount'];
    $pro_profit_amount = $_POST['profit_amount'];
    $pro_original_price = $_POST['original_price'];
    $pro_s_price = $_POST['selling_price'];
    
    $pro_desc = $_POST['pro_desc'];
    $pro_b_id = $_POST['pro_ba'];
    $pro_c_id = $_POST['pro_cat'];
    $pro_image_name = $_FILES['file'];

    $pro_img_arr=array();

    foreach($pro_image_name['name'] as $key=>$val)
    {
        $pro_image = basename($_FILES['file']['name'][$key]);   
        if (move_uploaded_file($_FILES['file']['tmp_name'][$key],"../admin/img/pro_img/$pro_image")) {
            $pro_img_arr[] = $pro_image; 
        } else {
            echo "error in upload file";
            exit();
        }
    }
    if ($pro_img_arr != null) {
        $pro_img_nm = implode(",",$pro_img_arr);
        $ins_pro_query = "INSERT INTO product (p_name, p_image, p_qauntity, p_purchase_price, p_tax_rate, p_tax_amount, p_profit_amount, p_original_price, p_selling_price, p_description, b_id, ca_id, p_author) VALUES ('$pro_nm','$pro_img_nm','$pro_quantity','$pro_p_price','$pro_tax_rate','$pro_tax_amount','$pro_profit_amount','$pro_original_price','$pro_s_price','$pro_desc','$pro_b_id','$pro_c_id','$pro_author')";
        $ins_pro_result = mysqli_query($c, $ins_pro_query);
        if ($ins_pro_result) {
            $_SESSION['status_seller'] = "add".$_SESSION['seller']['v_id'];
            echo "success";
        } else {
            echo "Failed to insert product data";
        }
    }
    else{
        echo "image array";
    }
?>