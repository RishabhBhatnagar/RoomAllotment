<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/admin_page.css">
</head>
<body>
	<center>
		<?php 

			function getCards( $commName,$commHead)
			{
				return 
				sprintf(
					"<td>
						<div class=indvCards>
							Name Of Commitee
							<h2> %s </h2>
							Head Of Commitee
						    <h2> %s </h2>
					    </div>
					</td>", 
					$commName, $commHead
			    );
			}

			$noOfCards_perLine=3;
			$name="CODE-X";
			$cards=array(getCards("CODE_X","VERRUS"),getCards("CSIX","VERxvxvc"),getCards("IEEE","VEcsdcsdcUS"),getCards("ECELL","VEdS"),
			getCards("CODE_X","VERRUS"),getCards("CSIX","VERxvxvc"),getCards("IEEE","VEcsdcsdcUS"),getCards("ECELL","VEdcsdcRRUS"),
			getCards("CODE_X","VERRUS"),getCards("CSIX","VERxvxvc"),getCards("IEEE","VEcsdcsdcUS"),getCards("ECELL","VEdcsdcRRUS"),
			getCards("CODE_X","VERRUS"),getCards("CSIX","VERxvxvc"),getCards("IEEE","VEcsdcsdcUS"),getCards("ECELL","VEdcsdcRRUS"));

			$noOfCards=sizeof($cards);
			echo '<script>console.log("'.$noOfCards.'")</script>';
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