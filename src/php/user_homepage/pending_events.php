<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/admin_page.css">
    </head>
    <body>
        <center>
            <?php
                include '../../data/get_data.php';
                include "same_copy_paste.php";
                session_start();
                if(isset($_SESSION["uid"])){  //this is a redundant check condition.
                    dynamicQuery("select * from event_details e,booking_detail b, user u where e.eid=b.eid and e.uid=u.uid and status='p' and u.uid=".$_SESSION["uid"].";");
                } else{
                    toast("user id of committee not set");
                }
            ?>

        </center>
    </body>
</html>
