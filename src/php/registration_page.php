
<html>
    <?php

        $uname = $_POST["username"];
        $pswd = trim($_POST["password"]);

		define("DB_USER", "root");
		define("DB_PASS", "");
		define("DB_NAME", "roomallotmentWDL");
		define("DB_HOST", "localhost");
		
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ($mysqli->connect_errno) {
		    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		
				$hashed = hash('sha512', $pswd);
				$query = "select * from user where committee_name = '$uname' and pswd = '$hashed'; ";
				$result = $mysqli->query($query);
				if(!$result){
					echo "ERROR IN QUERY";
				}

				if($result->num_rows == 0){
					echo "no rows found";
				} else{
					echo "user found";
				}
		$mysqli->close();
    ?>
</html>