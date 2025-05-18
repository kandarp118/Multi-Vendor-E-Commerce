<?php
    include("connection.php");
    
    $s_title = $_POST['stitle'];
    // $s_link_url = $_POST['slinkurl'];
    $s_desc = $_POST['sdesc'];
    $s_image = $_FILES['file']['name'];
    $s_img_old = $_FILES['file']['tmp_name'];
    $S_img_new = "./img/slider_img/";
    if (move_uploaded_file($s_img_old,$S_img_new.$s_image)) {
        $ins_slider_query = "INSERT INTO slider (s_image,s_title,s_description) VALUES('$s_image','$s_title','$s_desc')";
        $ins_slider_ans = mysqli_query($c,$ins_slider_query);
        if ($ins_slider_ans) {
            echo "success";
        } else {
            echo "error in insert query";
        }
        
    } else {
        echo "error in move file";
    }
    
?>