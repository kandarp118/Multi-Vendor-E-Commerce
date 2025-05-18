<?php
    include("connection.php");
    $s_id = $_POST['s_id'];
    $s_title = $_POST['stitle'];
    $s_link_url = $_POST['slinkurl'];
    $s_desc = $_POST['sdesc'];
    $s_image = $_FILES['file']['name'];
    $s_img_old = $_FILES['file']['tmp_name'];
    $S_img_new = "./img/slider_img/";
    if ($s_img_old === "") {
        $upd_slider_query = "UPDATE slider SET s_title='$s_title', s_description='$s_desc', s_link_url='$s_link_url' WHERE s_id='$s_id'";
    } else {
        $s_img_new = './img/slider_img/';
        if (move_uploaded_file($s_img_old, $s_img_new.$s_image))  {
        $upd_slider_query = "UPDATE slider SET s_image='$s_image',s_title='$s_title', s_description='$s_desc', s_link_url='$s_link_url' WHERE s_id='$s_id'";
        } else {
            echo "error in upload";
        }        
    }  
    
    $upd_slider_ans = mysqli_query($c,$upd_slider_query);

    if ($upd_slider_ans) {
        echo "success";
    } else {
        echo "error in update query";
    }

?>