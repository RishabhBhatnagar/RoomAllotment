<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/admin_page.css">
</head>
<body>
	<center>
		<?php 
			include '../data/get_data.php';
/*
			define("DB_USER", "root");
			define("DB_PASS", "");
			define("DB_NAME", "roomallotmentWDL");
			define("DB_HOST", "localhost");
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if ($mysqli->connect_errno) {
		    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}

			$query="select * from event_details;";

			$result = $mysqli->query($query);
			if(!$result){
				echo "ERROR IN QUERY";
			}*/

			function dynamicQuery($query,$noOfCards_perLine=3)
			{
				$cards=array();
				$result=get_table_data_query($query); 
				for($i=0;$i<count($result);$i++){
					$row=$result[$i];
					array_push($cards,getCard("CODE-X",$row['title'], $row['room_no'] ,$row['start_date'], $row['event_id']));
				}

				$noOfCards=sizeof($cards);
				print("<table>");
				
				$cardsleft = $noOfCards;
				while ($cardsleft > 0) {
					print("<tr>");
					if($cardsleft > $noOfCards_perLine){
						# SHOW ALL NUMBER OF CARDS.
						for($i = 0; $i<$noOfCards_perLine; $i++){
							print($cards[$i + $noOfCards - $cardsleft]);
							echo '<script>console.log("'.($i + $noOfCards - $cardsleft).'")</script>';
						}
						$cardsleft -= $noOfCards_perLine;
						echo '<script>console.log("next")</script>';
					} else{
						while($cardsleft != 0){
							print($cards[$noOfCards - $cardsleft]);
							echo '<script>console.log("'.($noOfCards - $cardsleft).'")</script>';
							$cardsleft -= 1;
						}
					}
					print("</tr>");
					}
				print("</table>");

			}//dynamicQuery

			function getCard( $commName,$eventName,$roomNo,$startDate,$eventId)
			{
				return 
				sprintf(
					"<td>
						<form action=\"admin_event_details.php\" method=\"post\">
							<div class=indvCards>
								Name Of Commitee: <h3> %s </h3>
								Name of Event: <h3> %s </h3>
								Room No. : <h3> %s </h3>
								Event Start Date: <h3> %s </h3>
								<input type=\"submit\" value=\"Know more..\" >
								<input type=hidden name=event_id value=".$eventId.">
					    	</div> 
						</form>
						
					</td>", 
					$commName,$eventName,$roomNo,$startDate
			    );
			}//getCards

			dynamicQuery("select * from event_details;");

		
		?>
		

		

	


		
	</center>
	
</body>

</html>