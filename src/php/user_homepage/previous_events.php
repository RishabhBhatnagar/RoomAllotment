<?php
    require "../../data/get_data.php";
    require "same_copy_paste.php";
    if(isset($_GET["id"])){
        dynamicQuery("
			select * 
			from event_details e,booking_detail b, user u 
			where e.eid=b.eid and e.uid=u.uid  and status='a'
			and b.event_date < CURRENT_DATE() and  u.uid=".$_GET["id"].";
			"
	    );
    }
?>
