<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/admin_page.css">
    </head>
    <body>
    <center style="color: #2A6A92; "><h2>Pending Events</h2></center>
        <center>
            <?php
                echo "<center><b>Pending Events</b></center>";
                include '../../data/get_data.php';
                include "same_copy_paste.php";
                session_start();
                $type_of_user = get_table_data_query("select type_of_user from user where uid=".$_SESSION['uid'].";")[0]["type_of_user"];
                if(isset($_SESSION["uid"])){  //this is a redundant check condition.

                    if($type_of_user != 'a') {
                        dynamicQuery(
                            "select * 
                                       from event_details e,booking_detail b, user u 
                                       where e.eid=b.eid and e.uid=u.uid and 
                                       status='p' and u.uid=" . $_SESSION["uid"] . " order by event_date,booking_time;"
                        );
                    } else{
                        dynamicQuery(
                            "select * 
                                       from event_details e,booking_detail b, user u 
                                       where e.eid=b.eid and e.uid=u.uid and 
                                       status='p' order by event_date,booking_time desc;"
                        );
                    }

                } else{
                    toast("user id of committee not set");
                }
            ?>

        </center>
    </body>
</html>
