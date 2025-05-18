<?php
    include("connection.php");
        $bid=$_POST['u_b_id'];
        $bnm=$_POST['u_b_nm'];
        $bca=$_POST['u_c_id'];
        $uba="UPDATE brand SET b_name='$bnm' , ca_id='$bca' WHERE b_id='$bid'";
        $ubar=mysqli_query($c,$uba);
        if ($ubar) {
            echo "success";
        }
        else {
            echo "faild";
        }
?>