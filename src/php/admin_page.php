<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/admin_page.css">
</head>
<body>
	<center>
		<?php 

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
			}
			$cards=array();




			for($i=0;$i<$result->num_rows;$i++){
				$result->data_seek($i);
				$row=$result->fetch_assoc();
				array_push($cards,getCard("CODE-X",$row['title'] ,$row['descp'] ,$row['room_no'] ,$row['start_date'] ,$row['end_date'] ,$row['type'] ));
			}





			function getCard( $commName,$eventName,$eventDesc,$roomNo,$startDate,$endDate,$eventType)
			{
				return 
				sprintf(
					"<td>
						<div class=indvCards>
							Name Of Commitee: <h2> %s </h2>
							Name of Event: <h2> %s </h2>
							Event Description: <h2> %s </h2>
							Room No. : <h2> %s </h2>
							Event Start Date: <h2> %s </h2>
							Event End Date: <h2> %s </h2>
							Type: <h2> %s </h2>
					    </div>
					</td>", 
					$commName,$eventName,$eventDesc,$roomNo,$startDate,$endDate,$eventType
			    );
			}

			$noOfCards_perLine=3;
			
		

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

		?>
		

		

	


		
	</center>
	
</body>

</html>