<?php
    session_start();
    if (isset($_SESSION['aunm'])) {
        unset($_SESSION);
        session_destroy();
        echo "  <script type='text/javascript'>
                    window.location='admin-login.php';
                </script>"; 
    }
?>