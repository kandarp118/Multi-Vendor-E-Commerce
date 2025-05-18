<?php
    include 'connection.php';
    $tax_id = $_POST['tax_id'];
    $del_tax = "DELETE FROM tax WHERE tax_id=$tax_id";

    if (mysqli_query($c,$del_tax)) {
        echo "1";
    } else {
        echo "0";
    }
?>