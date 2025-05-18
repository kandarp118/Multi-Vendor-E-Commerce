<?php
    include 'connection.php';
    $b_id = $_POST['b_id'];
    $bd = "DELETE FROM brand WHERE b_id=$b_id";

    if (mysqli_query($c,$bd)) {
        echo "1";
    } else {
        echo "0";
    }
?>