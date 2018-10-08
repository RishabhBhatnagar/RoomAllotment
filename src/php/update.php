<?php 
    include "../data/get_data.php";
    $query = "";
    if(isset($_POST["accept"])){
    	$query = "update event_details set status='a' where eid=".$_POST["hide"].";";
    }
    if(isset($_POST["reject"])){
    	$query = "update event_details set status='r' where eid=".$_POST["hide"].";";
    }
    
    echo "
    <script>
        t = confirm(\"Do you want to continue??\");
        if(t){
            ".get_table_data_query($query)."
        window.location.href='admin_page.php';
    }
        else{
        	window.location.href='admin_page.php';
        }
    </script>
    ";

 ?>