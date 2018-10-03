
<?php

    const db_name = "roomallotmentWDL";
    const db_uname = "root";
    const host = "localhost";
    const db_pswd = "";
    const json_file_name = "all_tables_json";
    		    
    $table_names = array("event_details", "user", "room");
    $table_jsons = array();
    
    function get_json_data($qry){
	    $mysqli = new mysqli(host, db_uname, db_pswd, db_name);
	    if ($mysqli->connect_errno) {
        	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	    }
	    $query=sprintf($qry);
	    $result = $mysqli->query($query);
	    if(!$result){
		    echo "ERROR IN QUERY";
	    }
	    $data=array();
	    while($r = mysqli_fetch_assoc($result)){
	        $data[] = $r;
	    }
	    return json_encode($data);
    }
    
    for($i = 0; $i < count($table_names); $i++){
        array_push($table_jsons, get_json_data("select * from $table_names[$i];"));
    }	
    
    $json_dict = array_combine($table_names, $table_jsons);
    $fp = fopen(json_file_name.'.json', 'w');
    fwrite($fp, json_encode($json_dict));
    fclose($fp);
    
    
    // Handling query post request from js : 
    if(isset($_GET["query"])){
        echo get_json_data($_GET["query"]);
    }
?>
