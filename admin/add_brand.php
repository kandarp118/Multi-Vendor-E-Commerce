<?php
    include("connection.php");

        $b_nm=$_POST['b_nm'];
        $c_id=$_POST['c_id'];
    
        if($b_nm === "" && $c_id === ""){
            echo "Please enter valid category name";
            exit();
        }

        $insert_brand="INSERT INTO brand VALUES('?','$c_id','$b_nm')";
        $insert_brand_result=mysqli_query($c,$insert_brand);
        if ($insert_brand_result) {
            echo "success";
        }
        else {
            echo "Faild to Add Brand";
        }
?>