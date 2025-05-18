<?php
    include("connection.php");

        $tax_rate=$_POST['tax_rate'];
    
        if($tax_rate === ""){
            echo "Please enter valid TaxRate";
            exit();
        }

        $insert_tax="INSERT INTO tax VALUES('?','$tax_rate')";
        $insert_tax_result=mysqli_query($c,$insert_tax);
        if ($insert_tax_result) {
            echo "success";
        }
        else {
            echo "Faild to Add TaxRate";
        }
?>