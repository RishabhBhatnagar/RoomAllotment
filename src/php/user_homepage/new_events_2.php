<?php
/**
 * Created by PhpStorm.
 * User: RishabhBhatnagar
 * Date: 13/10/18
 * Time: 5:05 PM
 */
    include "../../data/get_data.php";
    require "same_copy_paste.php";
    session_start();
    echo $_POST["ne_date"];
    echo $_POST['conflict_possible'];
    //print_r(dynamicQuery("insert into event_details v"))
?>