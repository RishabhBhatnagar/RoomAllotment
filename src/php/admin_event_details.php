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
	$eventDetails=get_table_data_query("
		select u.comm_name, e.title, b.event_date, e.description, e.room_no, b.start_time, b.end_time, e.tags, e.type, b.booking_time, u.fac_head  
		from event_details e,booking_detail b, user u 
		where e.eid=b.eid and e.uid=u.uid and e.eid=$id;
		"
	)[0];
	
	//print_r($eventDetails);
	$alliasKeys=array("comm_name"=>"COMMITTEE NAME","booking_time"=>"BOOKING TIME", "event_date"=>"EVENT DATE", "start_time"=>"START TIME", "end_time"=>"END TIME", "description"=>"DESCRIPTION", "title"=>"TITLE / EVENT NAME", "tags"=>"TAGS", "type"=>"TYPE", "room_no"=>"ROOM NO.", "eid"=>"EVENT ID","fac_head"=>"FACULTY INCHARGE");
?>
<?php if (count($eventDetails) > 0): ?>
	<table >
		<?php 
		foreach ($eventDetails as $key => $value) {
			
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

			
