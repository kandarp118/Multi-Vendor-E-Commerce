<?php
    include("connection.php");
    $pro_author = $_POST['p_author'];
    $pro_nm = $_POST['pro_nm'];
    $pro_quantity = $_POST['pro_quantity'];
    $pro_p_price = $_POST['pro_p_price'];
    $pro_s_price = $_POST['pro_s_price'];
    $pro_desc = $_POST['pro_desc'];
    $pro_b_id = $_POST['pro_b_id'];
    $pro_c_id = $_POST['pro_c_id'];
    $pro_image_old = $_FILES['file']['tmp_name'];
    $pro_image = $_FILES['file']['name'];
    $pro_image_new = "./img/pro_img/";

    if (move_uploaded_file($pro_image_old, $pro_image_new . $pro_image)) {
        $ins_pro_query = "INSERT INTO product (p_name, p_image, p_qauntity, p_purchase_price, p_selling_price, p_description, b_id, ca_id, p_author) VALUES ('$pro_nm','$pro_image','$pro_quantity','$pro_p_price','$pro_s_price','$pro_desc','$pro_b_id','$pro_c_id','$pro_author')";
        $ins_pro_result = mysqli_query($c, $ins_pro_query);
        if ($ins_pro_result) {
            echo "success";
        } else {
            echo "Failed to insert product data";
        }
    } else {
        echo "Failed to upload file";
    }
?>