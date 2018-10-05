<style type="text/css">
	table,tr,td,th {
		border: 1px solid black;
		text-align: center;
	}

</style>
<?php
	$id = $_POST['event_id'];
	include '../data/get_data.php';
	$eventDetails=get_table_data_query("select * from event_details where event_id=$id")[0];
	//print_r($eventDetails);
	$alliasKeys=array();
?>
<?php if (count($eventDetails) > 0): ?>
	<table >
		<?php 
		foreach ($eventDetails as $key => $value) {
			//TO NOT SHOW COMPLETION STATUS
			if ($key == 'is_completed') {
				continue;
			}
			?>
			<tr>
				<th><?= $key ?></th>  
				<!-- $alliasKeys[$key] -->
				<td><?= $value?></td>
			</tr>
			<?php
	    }
		?>
		<tr> 
			<td><input type="button" value="ACCEPT" onclick="
			<?php
				get_table_data_query("select * from event_details where event_id=$id")
			?>


			"></td>
			<td><input type="button" value="REJECT"></td>
		</tr>
		<tr>	
			<td colspan="2"><input type="button" value="BACK" onclick="window.location.href='admin_page.php'"></td>
		</tr>

	</table>
<?php endif; ?>

			
