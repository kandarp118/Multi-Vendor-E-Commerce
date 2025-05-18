<?php
    include 'connection.php';
    $cid = $_POST['c_id'];
    $cd = "DELETE FROM category WHERE ca_id=$cid";
    $del_cate_Ex = mysqli_query($c,$cd);
    if ($del_cate_Ex) {
        echo "success";
    } else {
        echo "faild";
    }
?>