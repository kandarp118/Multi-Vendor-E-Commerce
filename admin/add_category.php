<?php
    include("connection.php");

        $acnm=$_POST['cat_txt'];

        $ica="INSERT INTO category VALUES('?','$acnm')";
        $icar=mysqli_query($c,$ica);
        if ($icar) {
            echo "success";
        }
        else {
            echo "Faild to Add Category";
        }
    
?>