<?php
    include("connection.php");
    if (isset($_POST['save'])) 
    {
        $aid=$_POST['aid'];
        $aunm=$_POST['aunm'];
        $aem=$_POST['aem'];
        $aop=$_POST['aop'];
        $anp=$_POST['anp'];
        $arp=$_POST['arp'];
        $aimg=$_FILES['files']['name'][0];
        $np="img/".$aimg;
        if ($aop!=$anp && $anp!="" && $arp!="") 
        {
            if ($anp==$arp) {
                if ($aimg!="") 
                {
                    $move=move_uploaded_file($_FILES['files']['tmp_name'][0],$np);
                    if ($move) 
                    {
                        $uq1="UPDATE admin SET a_username='$aunm', a_email='$aem', a_password='$anp', a_image='$np' WHERE a_id='$aid'";
                        $uqr1=mysqli_query($c,$uq1);
                        if ($uqr1) {
                            echo "<script> window.location.href='admin-login.php' </script>";
                        } else {
                            echo "error";
                        }
                    }
                    else {
                        echo "error";
                    } 
                } else {
                    $uq2="UPDATE admin SET a_username='$aunm', a_email='$aem', a_password='$anp' WHERE a_id='$aid'";
                    $uqr2=mysqli_query($c,$uq2);
                    if ($uqr2) {
                        echo "<script> window.location.href='admin-login.php' </script>";
                    } else {
                        echo "error";
                    }
                }
            } else {
                echo "error";
            }
        }
        else {
            $uq3="UPDATE admin SET a_username='$aunm', a_email='$aem', a_password='$aop' WHERE a_id='$aid'";       
            $uqr3=mysqli_query($c,$uq3);
            if ($uqr3) {
                echo "<script> window.location.href='admin-login.php' </script>";
            } else {
                // code...
            }
            
        }
    }
    else{
        echo "error";
    }   
?>