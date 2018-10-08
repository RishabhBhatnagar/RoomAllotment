<html>
	<head>
		<style type="text/css">
			table,tr,td,th {
			border: 1px solid black;
			text-align: center;
			width: 800px;
			height: 40px;
		}
		</style>
	</head>
<body>

	<?php
		$id = $_POST['event_id'];
		include '../data/get_data.php';
		$eventDetails=get_table_data_query("
			select u.comm_name, e.title, b.event_date, e.description, e.room_no, b.start_time, b.end_time, e.tags, e.type, b.booking_time, u.fac_head  
			from event_details e,booking_detail b, user u 
			    where e.eid=b.eid and e.uid=u.uid and e.eid=$id;
			"
		)[0];
		
		//print_r($eventDetails);
		$alliasKeys=array(
		    "comm_name"=>"COMMITTEE NAME",
		    "booking_time"=>"BOOKING TIME", 
		    "event_date"=>"EVENT DATE", 
		    "start_time"=>"START TIME", 
		    "end_time"=>"END TIME", 
		    "description"=>"DESCRIPTION", 
		    "title"=>"TITLE / EVENT NAME", 
		    "tags"=>"TAGS", 
		    "type"=>"TYPE", 
		    "room_no"=>"ROOM NO.", 
		    "eid"=>"EVENT ID",
		    "fac_head"=>"FACULTY INCHARGE",
		    "status"=>"STATUS"
		);
	?>

	<?php 
		if (count($eventDetails) > 0){
			echo "
			<form action=\"update.php\" method=post>
			    <table >";
			foreach ($eventDetails as $key => $value) {
				echo "
					<tr>
						<th>".$alliasKeys[$key]."</th>  
						<td>".$value."</td>
					</tr>";
			}
			if(!isset($_POST["no_access"])){
			echo 
			"<tr> 
					<input type=\"hidden\" name=\"hide\" value=".$id.">
					<td><input name=accept type=submit value=ACCEPT></td>
					<td><input name=reject type=submit value=REJECT></td>
				</tr>";
			}
			echo "
				<tr>	
					<td colspan=\"2\"><input type=\"button\" value=\"BACK\" onclick=\"window.history.back()\"></td>
				</tr>
			</table>
			</form>";
		}
	?>
		</table>

	</body>
</html>
