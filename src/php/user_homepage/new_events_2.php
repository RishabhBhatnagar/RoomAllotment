<?php
/**
 * Created by PhpStorm.
 * User: RishabhBhatnagar
 * Date: 13/10/18
 * Time: 5:05 PM
 */
    include "../../data/get_data.php";
    session_start();
    echo $_POST["ne_tags"];
    //print_r(dynamicQuery("insert into event_details v"))
?>