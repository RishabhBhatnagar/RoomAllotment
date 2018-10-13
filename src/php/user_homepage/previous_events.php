<link rel="stylesheet" type="text/css" href="../../css/admin_page.css">
<?php
    require "../../data/get_data.php";
    require "same_copy_paste.php";
    session_start();

    if(isset($_SESSION["uid"])){
        dynamicQuery("
                select * 
                from event_details e,booking_detail b, user u 
                where e.eid=b.eid and e.uid=u.uid  and status = 'a'
                and b.event_date < CURRENT_DATE() and  u.uid = ".$_SESSION["uid"].";
                "
        );
    }
?>