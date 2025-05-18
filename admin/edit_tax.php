<?php
    include("connection.php");
        $t_id=$_POST['u_tax_id'];
        $tax_rate=$_POST['u_tax_rate'];
        $upd_tax="UPDATE tax SET tax_rate='$tax_rate' WHERE tax_id='$t_id'";
        $result_tax=mysqli_query($c,$upd_tax);
        if ($result_tax) {
            echo "success";
        }
        else {
            echo "faild";
        }
?>