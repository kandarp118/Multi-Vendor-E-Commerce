<?php 
    
    include("connection.php");
    
    $a_email = $_POST['email'];
    $a_pass = $_POST['password'];
        
    $sel_admin_query="SELECT * FROM admin WHERE a_email='$a_email' OR a_username='$a_email' AND a_password='$a_pass'";
    
    $sel_admin_ans=mysqli_query($c,$sel_admin_query); 

    if ($sel_admin_ans) 
    {
        if ($fa=mysqli_fetch_array($sel_admin_ans)) 
        {
            session_start();
            $_SESSION['aunm']=$fa[1];

            if (isset($_SESSION['aunm'])) 
            {
                echo "success";
            } 
            else 
            {
                echo "error in session creation";
            }
            
        } 
        else 
        {
            echo "wrong Email and Password";
        }
        
    } 
    else 
    {
        echo "error in select data";
    } 
?>