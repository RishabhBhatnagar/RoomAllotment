<head>    
    <link rel="stylesheet" type="text/css" href="../../css/admin_page.css">
</head>
<?php
     require "../../data/get_data.php";
     require "same_copy_paste.php";
     dynamicQuery("
			select * 
			from event_details e,booking_detail b, user u 
			where e.eid=b.eid and e.uid=u.uid  and status='a'
			and status='a'
			;");
?>
