<?php
    include("connection.php");
    $s_id = $_POST['s_id'];
    $del_slider_query = "DELETE FROM slider WHERE s_id='$s_id'";
    $del_slider_ans = mysqli_query($c,$del_slider_query);
    if ($del_slider_ans) {
        echo "success";
    } else {
        echo "error in insert query";
    }
    
?>