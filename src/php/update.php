<?php 
    include "../data/get_data.php";
    $query = "";
    if(isset($_POST["accept"])){
    	$query = "update event_detail set status='a' where eid=".$_POST["hide"].";";
    }
    if(isset($_POST["reject"])){
    	$query = "update event_detail set status='r' where eid=".$_POST["hide"].";";
    }
    session_start();
    $_SESSION["query"] = $query;
    echo "<a method=post href='update_2.php' id='execute_query'></a>";

    echo "
    <script>
        t = confirm(\"Do you want to continue??\");
        if(t){
            //if confirmed, send a call update_2.php to fire the query.
            document.getElementById('execute_query').click();
    }
        else{
        	//window.history.back();   // this is not working due to security issues of firefox.
        	window.location.href='user_homepage/pending_events.php';
        }
    </script>
    ";

 ?>
