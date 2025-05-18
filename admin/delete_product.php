<?php
    include 'connection.php';
    session_start();
    $p_id = $_POST['p_id'];
    $v_id = $_POST['v_id'];
    if (isset($p_id) && isset($v_id)) 
    {
        if(isset($_SESSION['status_admin']))
        {
            unset($_SESSION['status_admin']);
        }
        $cd = "DELETE FROM product WHERE p_id=$p_id AND p_author=$v_id";
        $del_cate_ans = mysqli_query($c,$cd);
        if ($del_cate_ans) {
            $_SESSION['status_admin'] = "delete".$_SESSION['seller']['v_id'];
            echo "success";
        } else {
            echo "faild";
        }    
    } else {
        echo "error in fetching pid";
    }
    
    
?>