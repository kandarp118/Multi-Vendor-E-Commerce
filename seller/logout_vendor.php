<?php
    session_start();
    if (isset($_SESSION['seller'])) {
        unset($_SESSION['seller']);
        // session_destroy();
        echo "  <script type='text/javascript'>
                    window.location.href='index.php';
                </script>"; 
    }
?>