	<?php require 'app/model/admin-funct.php'; $obj = new AdminFunct;?>
	<?php
		
		if(isset($_POST['submit-button'])){
			extract($_POST);
			$obj->insertPTAData($tr_fname, $tr_midname, $tr_lname);
		}
		if(isset($_POST['update-button'])){
			extract($_POST);
			$obj->updatePTAData($guar_id, $tr_fname, $tr_midname, $tr_lname);
		}
		if(isset($_POST['reset-button'])){
			extract($_POST);
			$obj->updateParentAccount2($guar_id, $guar_fname, $guar_midname, $guar_lname, $guar_address, $guar_mobno, $guar_telno);
		}
		if(isset($_POST['delete-button'])){
			extract($_POST);
			$obj->deletePTAData($acc_idx);
		}
		if(isset($_POST['status-button1'])){
			extract($_POST);
			if($obj->updateParentAccountStatus($acc_id, $acc_status));
		}
		if(isset($_POST['status-button'])){
			extract($_POST);
			if($obj->updatePTAAccountStatus($acc_id, $acc_status));
		}
		if(isset($_POST['reset-button1'])){
			extract($_POST);
			if($obj->resetPTAPassword($acc_id));
		}
		if(isset($_POST['reset-button2'])){
			extract($_POST);
			if($obj->resetParentPassword($acc_id));
		}
	?>
	<div class="contentpage">
		<div class="row">
			<div class="widget widgetParent">	
				<div class="header">	
					<div class="cont">	
						<i class="fas fa-money-check"></i>
						<span>PTA Treasurer List</span>
					</div>
					<p>School Year: <?php echo date("Y"); ?> - <?php echo date("Y")+1; ?></p>
				</div>
				<div class="widgetContent ptaContent">
					<div name="content">
						<button name="opener" class="customButton">Add PTA<i class="fas fa-plus fnt"></i></button>
						<div name="dialog" title="Add a new PTA Treasurer">
							<form action="admin-parent" method="POST">
								<span>First name:</span>
								<input type="text" name="tr_fname" value="" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-&ñ. ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="First name" required>
								<span>Middle Name:</span>
								<input type="text" name="tr_midname" value="" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-&ñ. ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="Middle name" required>
								<span>Last name:</span>
								<input type="text" name="tr_lname" value="" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-&ñ. ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="Last name" required>
								<button name="submit-button" class="customButton">Save <i class="fas fa-save fnt"></i></button>
							</form>
						</div>
					</div>
					<table id="ptaTable" class="display" width="100%">
						<thead>
							<tr>
								<th class="tleft custPad">PTA Treasurer</th>
								<th class="tleft custPad">Username</th>
								<th class="tleft custPad">Account Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
<?php 
foreach ($obj->showTreasurerList() as $value) {
extract($value);
/*$studentId = $obj->studentId();
$studentName = $obj->studentName();*/
$status = ['Active','Deactivated'];
echo '
	<tr>
		<td class="tleft custPad">'.$tr_fname.' '.$tr_midname.' '.$tr_lname.'</td>
		<td class="tleft custPad">'.$username.'</td>
		<td class="tleft custPad">'.$acc_status.'</td>
		<td class="action">
			<div name="content">
				<button name="opener">
					<div class="tooltip">
						<i class="fas fa-edit"></i>
						<span class="tooltiptext">edit</span>
					</div>
				</button>
				<div name="dialog" title="Update PTA Treasurer data">
					<form action="admin-parent" method="POST" required>
						<input type="hidden" value="'.$tr_id.'" name="guar_id">
						<span>First name:</span>
						<input type="text" name="tr_fname" value="'.$tr_fname.'" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-&ñ. ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="First name" required>
						<span>Middle Name:</span>
						<input type="text" name="tr_midname" value="'.$tr_midname.'" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-&ñ. ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="Middle name" required>
						<span>Last name:</span>
						<input type="text" name="tr_lname" value="'.$tr_lname.'" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-&ñ. ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="Last name" required>
						<button name="update-button" class="customButton">Update <i class="fas fa-save fnt"></i></button>
					</form>
				</div>  
			</div>
			<div name="content">
				<button name="opener">
					<div class="tooltip">
						<i class="fas fa-trash-alt"></i>
						<span class="tooltiptext">delete</span>
					</div>
				</button>
				<div name="dialog" title="Delete PTA Treasurer account">
					<form action="admin-parent" method="POST">
						<p>Are you sure you want to delete this account?</p>
						<input type="hidden" value="'.$acc_trid.'" name="acc_idx">
						<button name="delete-button" class="customButton">Yes <i class="fas fa-save fnt"></i></button>
					</form>
				</div>  
			</div>
			<div name="content">
				<button name="opener">
					<div class="tooltip">
						<i class="fas fa-exchange-alt"></i>
						<span class="tooltiptext">Status</span>
					</div>
				</button>
				<div name="dialog" title="Change Status">
					<form action="admin-parent" method="POST" required>
						<input type="hidden" value="'.$acc_id.'" name="acc_id">
						<select name="acc_status">
						';
						for ($c = 0; $c < sizeof($status); $c++) {
							echo $acc_status === $status[$c] ? 
							'<option value="'.$status[$c].'" selected="selected">'.$status[$c].'</option>' 
							:
							'<option value="'.$status[$c].'">'.$status[$c].'</option>';	
						}
						echo '
						</select>
						<button name="status-button" class="customButton">Change Status <i class="fas fa-save fnt"></i></button>
					</form>
				</div>
			</div>
			<div name="content">
				<button name="opener">
					<div class="tooltip">
						<i class="fas fa-retweet"></i>
						<span class="tooltiptext">Reset</span>
					</div>
				</button>
				<div name="dialog" title="Reset Password">
					<form action="admin-parent" method="POST" required>
						<input type="hidden" value="'.$acc_id.'" name="acc_id">
						<p>Are you sure you want to reset the password of this account?</p>
						<button name="reset-button1" class="customButton">Reset <i class="fas fa-save fnt"></i></button>
					</form>
				</div>  
			</div>
		</td>
	</tr>
';
}
?>
<!-- <span>Student Name</span>
<select name="stude_id">
';
for ($c = 0; $c < sizeof($studentId); $c++) {
		if($stud_id==$studentId[$c]){
			echo '<option value="'.$studentId[$c].'" selected>';
		}else{
			echo '<option value="'.$studentId[$c].'"">';
		}	
		echo ''.$studentName[$c].'</option>';
	}
echo '
</select>-->				
						</tbody>
					</table> 
				</div>
			</div>
			<div class="widget">	
				<div class="header">	
					<div class="cont">	
						<i class="fas fa-money-check"></i>
						<span>Parent List</span>
					</div>
					<p>School Year: <?php echo date("Y"); ?> - <?php echo date("Y")+1; ?></p>
				</div>
				<div class="widgetContent parentContent">
					<table id="admin-table-withScroll" class="display">
						<thead>
							<tr>
								<th class="tleft">Parent Name</th>
								<th class="tleft">Address</th>
								<th class="tleft">Mobile Number</th>
								<th class="tleft">Telephone Number</th>
								<th class="tleft">Child Name</th>
								<th class="tleft">Username</th>
								<th class="tleft">Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
<?php foreach ($obj->showParentList() as $value) {
extract($value);
$status = ['Active','Deactivated'];
echo '
<tr>
	<td class="tleft custPad2">'.$guar_fname.' '.$guar_midname.' '.$guar_lname.'</td>
	<td class="tleft custPad2">'.$guar_address.'</td>
	<td class="tleft custPad2">'.$guar_mobno.'</td>
	<td class="tleft custPad2">'.$guar_telno.'</td>
	<td class="tleft custPad2">'.$first_name.' '.$last_name.'</td>
	<td class="tleft custPad2">'.$username.'</td>
	<td class="tleft custPad2">'.$acc_status.'</td>
	<td class="action">
		<div name="content">
			<button name="opener">
				<div class="tooltip">
					<i class="fas fa-retweet"></i>
					<span class="tooltiptext">Reset</span>
				</div>
			</button>
			<div name="dialog" title="Reset Parent Account">
				<form action="admin-parent" method="POST" required>
					<input type="hidden" value="'.$guar_id.'" name="guar_id">
					<span>First name:</span>
					<input type="text" name="guar_fname" value="'.$guar_fname.'" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-&ñ. ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="First name" required>
					<span>Middle Name:</span>
					<input type="text" name="guar_midname" value="'.$guar_midname.'" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-&ñ. ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="Middle name" required>
					<span>Last name:</span>
					<input type="text" name="guar_lname" value="'.$guar_lname.'" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-&ñ. ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="Last name" required>
					<span>Address:</span>
					<input type="text" name="guar_address" value="'.$guar_address.'" data-validation="length custom required" data-validation-length="max100" data-validation-regexp="^[a-zA-Z0-9\-&ñ,. ]+$" data-validation-error-msg="Enter less than 100 characters and Alphaneumerics only" placeholder="Last name" required>
					<span>Mobile Number:</span>
					<input type="text" name="guar_mobno" value="'.$guar_mobno.'" data-validation="length custom required" data-validation-length="11-11" data-validation-regexp="^[0-9\-+ ]+$" data-validation-error-msg="Enter 11 digits" placeholder="" minlength="11" maxlength="11">
					<span>Telephone Number:</span>
					<input type="text" name="guar_telno" value="'.$guar_telno.'" data-validation="length custom" data-validation-length="max11" data-validation-regexp="^[0-9\-+ ]+$" data-validation-error-msg="Enter less than 11 digits only" placeholder="" maxlength="11">
					<span>Child name:</span>
					<input type="text" name="guar_fname" value="'.$first_name.' '.$last_name.'" placeholder="First name" required disabled>
					<button name="reset-button" class="customButton">Reset <i class="fas fa-save fnt"></i></button>
				</form>
			</div>  
		</div>
		<div name="content">
			<button name="opener">
				<div class="tooltip">
					<i class="fas fa-exchange-alt"></i>
					<span class="tooltiptext">Status</span>
				</div>
			</button>
			<div name="dialog" title="Change Status">
				<form action="admin-parent" method="POST" required>
					<input type="hidden" value="'.$acc_id.'" name="acc_id">
					<select name="acc_status">
					';
					for ($c = 0; $c < sizeof($status); $c++) {
						echo $acc_status === $status[$c] ? 
						'<option value="'.$status[$c].'" selected="selected">'.$status[$c].'</option>' 
						:
						'<option value="'.$status[$c].'">'.$status[$c].'</option>';	
					}
					echo '
					</select>
					<button name="status-button1" class="customButton">Change Status <i class="fas fa-save fnt"></i></button>
				</form>
			</div>
		</div>
		<div name="content">
			<button name="opener">
				<div class="tooltip">
					<i class="fas fa-retweet"></i>
					<span class="tooltiptext">Reset</span>
				</div>
			</button>
			<div name="dialog" title="Reset Password">
				<form action="admin-parent" method="POST" required>
					<input type="hidden" value="'.$acc_id.'" name="acc_id">
					<p>Are you sure you want to reset the password of this account?</p>
					<button name="reset-button2" class="customButton">Reset <i class="fas fa-save fnt"></i></button>
				</form>
			</div>  
		</div>
	</td>
</tr>
';
}
?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>