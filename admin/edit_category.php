<?php
    include("connection.php");
    $cid=$_POST['c_id'];
    $cnm=$_POST['c_nm'];
    $uca="UPDATE category SET ca_name='$cnm' WHERE ca_id='$cid'";
    $ucar=mysqli_query($c,$uca);
    if ($ucar) {
        echo "success";
    }
    else {
        echo "faild";
    }
?>