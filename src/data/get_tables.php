<!DOCTYPE html>
<html>
<body>
		<?php
		    const db_name = "roomallotmentWDL";
		    const db_uname = "root";
		    const db_pswd = "";
		    const host = "localhost";
		    const dir_name = 'table_jsons';
		    
		    $table_names = array("event_details", "user");
		    
		    function get_json_data($table_name){
			    $mysqli = new mysqli(host, db_uname, db_pswd, db_name);
			    if ($mysqli->connect_errno) {
		        	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    }
			    $query=sprintf("select * from %s;", $table_name);
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
		    
            if ( !file_exists(dir_name) ) {
                mkdir (dir_name, 0744);
            }
 
		    for($i = 0; $i < count($table_names); $i++){
		        $fp = fopen(dir_name."/".$table_names[$i].'.json', 'w');
                fwrite($fp, get_json_data($table_names[$i]));
                fclose($fp);
		    }
		    
		    //specially for linux : 
		    echo `sudo chmod 777 -R /opt/lampp/htdocs/`;
		    echo `whoami`;
		    echo `sudo chmod 777 -R ./ `;
		?>
</body>

</html>

