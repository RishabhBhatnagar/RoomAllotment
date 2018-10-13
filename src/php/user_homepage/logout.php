<?php
/**
 * Created by PhpStorm.
 * User: RishabhBhatnagar
 * Date: 13/10/18
 * Time: 8:32 AM
 */
    session_start();
    session_unset();

    echo "
        <script>
            window.history.back();  
        </script>
    "
?>