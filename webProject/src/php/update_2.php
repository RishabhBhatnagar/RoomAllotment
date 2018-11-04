<?php
/**
 * Created by PhpStorm.
 * User: RishabhBhatnagar
 * Date: 13/10/18
 * Time: 9:31 AM
 */
    include "../data/get_data.php";
    include "user_homepage/same_copy_paste.php";
    session_start();

    dynamicQuery($_SESSION["query"]);
    unset($_SESSION["query"]);

    //once query is fired, go back to main page.

    echo "<script>window.location.href = 'user_homepage/pending_events.php';</script>";

?>