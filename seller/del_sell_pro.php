<?php
    include 'connection.php';
    session_start();
    if(isset($_SESSION['status_seller']))
    {
        unset($_SESSION['status_seller']);
    }

    $pid = $_POST['p_id'];
    $p_author = $_POST['p_author'];
    if (isset($pid) && isset($p_author))
    {
        $cd = "DELETE FROM product WHERE p_id=$pid AND p_author=$p_author";
        $del_cate_ans = mysqli_query($c,$cd);
        if ($del_cate_ans) {
            $_SESSION['status_seller'] = "del".$_SESSION['seller']['v_id'];
            echo "success";
        } else {
            echo "faild";
        }
    } else {
        echo "error in fetching pid and pauthor";
    }
    
    
?>