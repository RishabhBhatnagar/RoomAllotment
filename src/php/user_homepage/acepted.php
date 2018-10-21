<head>    
    <link rel="stylesheet" type="text/css" href="../../css/admin_page.css">
</head>
<center style="color: #2A6A92; font-family: 'Lobster', cursive;"><h2>Accepted Events</h2></center>
<?php
     require "../../data/get_data.php";
     require "same_copy_paste.php";
     dynamicQuery("
			select * 
			from event_detail e,booking_detail b, user u 
			where e.eid=b.eid and e.uid=u.uid  and status='a';"
     );
?>