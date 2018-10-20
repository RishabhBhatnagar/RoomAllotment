<?php
/**
 * Created by PhpStorm.
 * User: RishabhBhatnagar
 * Date: 18/10/18
 * Time: 9:27 AM
 */
include "../../data/get_data.php";
    session_start();

    function get_list($arr){
        return sprintf("[%s]", implode(",", $arr));
    }
    function get_room_numbers($room_type){
        $table = get_table_data_query(sprintf("select * from room where room_type = '%s'", $room_type));
        $room_numbers = array();
        for($i = 0; $i < count($table); $i++){
            array_push($room_numbers, sprintf("\"%s\"", $table[$i]["room_no"]));
        }
        return get_list($room_numbers);
    }
    function get_room_numbers_status($room_type){
        //these are all the room numbers.
        $table_temp = get_table_data_query(sprintf("select * from room where room_type = '%s'", $room_type));
        $all_room_nos = array();
        for($i = 0; $i < count($table_temp); $i++){
            array_push($all_room_nos, sprintf("\"%s\"", $table_temp[$i]["room_no"]));
        }

        //getting all booked room_numbers.
        $table = get_table_data_query(
            sprintf(
                "SELECT r.room_no, status
                        FROM room r, event_detail e, booking_detail b
                        WHERE e.eid = b.eid and
                        r.room_no = e.room_no and e.room_no = b.room_no and
                        event_date = '%s' AND room_type = '%s';", $_REQUEST["date"], $room_type)
        );

        $status = array();
        for($i = 0; $i < count($all_room_nos); $i++){
            $set = false;
            for($j = 0; $j < count($table); $j++){
                if('"'.$table[$j]["room_no"].'"' == $all_room_nos[$i]){
                    array_push($status, '"'.$table[$j]["status"].'"');
                    $set = true;
                }
            }
            if(!$set){
                array_push($status, '"u"');
            }
        }
        return get_list($status);
    }
    $d1 = "-----";

    function format($c){
        $d2 = "#####";
        $rno = $_SESSION[$c.'_r'];
        $status = $_SESSION[$c.'_s'];
        return $rno.$d2.$status;
    }

    if(isset($_REQUEST["date"])) {
        $_SESSION['c_r'] = get_room_numbers("c");
        $_SESSION['l_r'] = get_room_numbers("l");
        $_SESSION['o_r'] = get_room_numbers("o");

        $_SESSION['c_s'] = get_room_numbers_status("c");
        $_SESSION['l_s'] = get_room_numbers_status("l");
        $_SESSION['o_s'] = get_room_numbers_status("o");

        echo $d1;
        echo format(strtolower($_REQUEST["which_radio"][0]));
    }
?>