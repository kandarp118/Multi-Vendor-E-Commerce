<?php
    session_start();
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        // session_destroy();
        echo "  <script type='text/javascript'>
                    window.location='index.php';
                </script>"; 
    }
?>