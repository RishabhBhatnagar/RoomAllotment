
<html>
    <?php
        $uname = $_POST["username"];
        $pswd = trim($_POST["password"]);
   
        mysql_connect("localhost","root","") or die (mysql_error());
		$dbname="roomallotmentWDL";
		mysql_select_db($dbname) or die (mysql_error());
				
				$hashed = hash('sha512', $pswd);
				$query = "select * from user";
				$data = mysql_query($query);
				
				
    				while ($info=mysql_fetch_array($data)) {
					if(!strcmp($uname, $info['committee_name']) and !strcmp($hashed, $info['pswd'])){
					    echo "matched";
					}
				}
				print("</table>");
		mysql_close();
		
    ?>
</html>
