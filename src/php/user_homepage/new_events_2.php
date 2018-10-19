<?php
/**
 * Created by PhpStorm.
 * User: RishabhBhatnagar
 * Date: 13/10/18
 * Time: 5:05 PM
 */
    include "../../data/get_data.php";
    require 'same_copy_paste.php';
    session_start();

    $use_me = array();

    $ne_title = trim($_REQUEST["ne_title"]);
    $ne_comm_name = trim($_REQUEST["ne_comm_name"]);
    $ne_date = implode('-', array_reverse(explode('/', trim($_REQUEST["ne_date"]))));
    toast($ne_date);
    $ne_desc = trim($_REQUEST["ne_desc"]);
    $ne_room_no = trim($_REQUEST["ne_room_no"]);
    $ne_start_time = trim($_REQUEST["ne_start_time"].':00');
    $ne_end_time = trim($_REQUEST["ne_end_time"].':00');
    $ne_tags = trim($_REQUEST["ne_tags"]);
    $ne_type = trim($_REQUEST["ne_type"]);


    //echo $_REQUEST['conflict_possible'];

    //event_details
    get_table_data_query("insert into event_details values (NULL, '$ne_title', '$ne_desc', '$ne_tags', '$ne_type', 'p', ".$_SESSION['uid'].", '$ne_room_no')");

    $a = get_table_data_query("select eid from event_details where title = '$ne_title' and description = '$ne_desc';");
    //booking_details
    get_table_data_query("insert into booking_detail values (".$a[0]['eid'].", '$ne_room_no', '$ne_start_time', '$ne_end_time', '$ne_date', LOCALTIMESTAMP)");

    show_snackbar("REQUEST IS SENT!!!");
    echo "
    <script>
        window.history.back();
    </script>";
?>