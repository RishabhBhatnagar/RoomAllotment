<head>    
    <link rel="stylesheet" type="text/css" href="../../css/admin_page.css">
</head>
<?php
    include "../../data/get_data.php";
    include "same_copy_paste.php";
    
        
    if(isset($_GET["c_name"])){
         $committee_name = $_GET["c_name"];
         $checked = $_GET["checked"];
         if($checked == "true"){
			dynamicQuery("
			select * 
			from event_detail e,booking_detail b, user u 
			where e.eid=b.eid and e.uid=u.uid and u.comm_name = '$committee_name' and status='a';");
                                
         }
    }
    else{
        echo "unset";
    }
?>

