<style type="text/css">
	table,tr,td,th {
		border: 1px solid black;
		text-align: center;
		width: 800px;
		height: 40px;
	}

</style>
<?php
	$id = $_POST['event_id'];
	include '../data/get_data.php';
	$eventDetails=get_table_data_query("select * from event_details where event_id=$id")[0];
	//print_r($eventDetails);
	$alliasKeys=array("booking_time"=>"BOOKING TIME", "start_date"=>"START DATE", "end_date"=>"END DATE", "start_time"=>"START TIME", "end_time"=>"END TIME", "descp"=>"DESCRIPTION", "title"=>"TITLE / EVENT NAME", "tags"=>"TAGS", "type"=>"TYPE", "room_no"=>"ROOM NO.", "event_id"=>"EVENT ID");
?>
<?php if (count($eventDetails) > 0): ?>
	<table >
		<?php 
		foreach ($eventDetails as $key => $value) {
			//TO NOT SHOW COMPLETION STATUS
			if ($key == 'is_completed' or $key =='end_date') {
				continue;
			}
			?>
			<tr>
				<th><?= $alliasKeys[$key] ?></th>  
				<!-- $alliasKeys[$key] -->
				<td><?= $value?></td>
			</tr>
			<?php
	    }
		?>
		<tr> 
			<td><input type="button" value="ACCEPT" onclick="
			<?php
				get_table_data_query("select * from event_details where event_id=$id");
			?>


			"></td>
			<td><input type="button" value="REJECT"></td>
		</tr>
		<tr>	
			<td colspan="2"><input type="button" value="BACK" onclick="window.location.href='admin_page.php'"></td>
		</tr>

	</table>
<?php endif; ?>

			
