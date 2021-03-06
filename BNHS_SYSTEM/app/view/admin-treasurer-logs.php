	<?php require 'app/model/admin-funct.php'; $obj = new AdminFunct;?>
	
	<div class="contentpage" id="contentpage">
		<div class="row">
			<div class="widget">	
				<div class="header">	
					<div class="cont">	
						<i class="fas fa-money-check"></i>
						<span>Treasurer History of Logs</span>
					</div>
					<p>School Year: <?php echo date("Y"); ?> - <?php echo date("Y")+1; ?></p>
				</div>
				<div class="widgetContent logsContent">
					<div class="cont1">
						<p>Log Event:</p>
						<select name="log_event" class="log_events">
							<option value="">All</option>
							<option value="Insert">Insert</option>
							<option value="Update">Update</option>
							<option value="Delete">Delete</option>
							<option value="Reset">Reset</option>
						</select>
					</div>
					<div class="cont2">
						<table id="admin-table-logs" class="display">
							<thead>
								<tr>
									<th class="tleft">User Name</th>
									<th class="tleft">Log Event</th>
									<th class="tleft">Log Description</th>
									<th class="tleft">Log Timestamp</th>
								</tr>
							</thead>
							<tbody>

<?php
 foreach($obj->showTreasurerLogs() as $value){
 extract($value);
 echo '
 <tr>
 	<td class="tleft">'.$username.'</td>
 	<td class="tleft">'.$log_event.'</td>
 	<td class="tleft longText">'.$log_desc.'</td>
 	<td class="tleft">'.$logdate.'</td>
 </tr> ';
}
?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>