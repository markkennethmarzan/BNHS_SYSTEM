	<?php require 'app/model/admin-funct.php'; $obj = new AdminFunct(); ?>
	<?php 
		if(isset($_POST['submit-button'])){
			extract($_POST);
			$obj->addSubject($subj_level,$subj_dept, $subj_name);
		}
		if(isset($_POST['update-button'])){
			extract($_POST);
			$obj->updateSubject($subj_id, $subj_level, $subj_dept, $subj_name);
		}
		if(isset($_POST['delete-button'])){
			extract($_POST);
			$obj->deleteSubject($subj_id);
		}
	?>
	<div class="contentpage" id="contentpage">
		<div class="row">
			<div class="widget">	
				<div class="header">	
					<div class="cont">	
						<i class="fas fa-money-check"></i>
						<span>Subjects</span>
					</div>
					<p>School Year: <?php echo date("Y"); ?> - <?php echo date("Y")+1; ?></p>
				</div>
				<div class="widgetContent">
					<div class="cont1">
						<div name="content">
							<button name="opener" class="customButton">Add subject <i class="fas fa-plus fnt"></i></button>
							<div name="dialog" title="Add Subject">
								<form action="admin-subjects" method="POST" autocomplete="off">
									<span>Subject Level:</span>
									<select name="subj_level" data-validation="required">
										<option selected disabled hidden>Select Subject Level</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
									<span>Subject Department:</span>
									<select name="subj_dept" data-validation="required" required>
										<option selected disabled hidden>Select Department</option>
										<option value="Filipino">Filipino</option>
										<option value="Math">Math</option>
										<option value="MAPEH">MAPEH</option>
										<option value="Science">Science</option>
										<option value="AP">AP</option>
										<option value="Math">Math</option>
										<option value="English">English</option>
										<option value="TLE">TLE</option>
										<option value="Math">Math</option>
									</select>
									<span>Subject Name:</span>
									<input type="text" name="subj_name" data-validation="length custom" data-validation-length="max45" data-validation-regexp="^[a-zA-Z0-9\-& ]+$" data-validation-error-msg="Enter less than 45 characters and Alphaneumerics only" value="" data-validation="required" required placeholder="Subject Name">
									<button name="submit-button" class="customButton">Save <i class="fas fa-save fnt"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="cont2">
						<table id="admin-table" class="stripe row-border order-column" class="display">
							<thead>
								<tr>
									<th class="tleft custPad">Subject Level</th>
									<th class="tleft custPad">Subject Department</th>
									<th class="tleft custPad">Subject Name</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
<?php foreach ($obj->showSingleTable("subject") as $value) {
extract($value);
$department = ['Filipino', 'Math', 'MAPEH', 'Science', 'AP', 'Math', 'English', 'TLE', 'Values'];
$subject_level = ['7', '8', '9', '10'];
echo '
	<tr>
		<td class="tleft custPad">'.$subj_level.'</td>
		<td class="tleft custPad">'.$subj_dept.'</td>
		<td class="tleft custPad">'.$subj_name.'</td>
		<td class="action">
			<div name="content">
				<button name="opener">
					<div class="tooltip">
						<i class="fas fa-edit"></i>
						<span class="tooltiptext">edit</span>
					</div>
				</button>
				<div name="dialog" title="Update subjects data">
					<form action="admin-subjects" method="POST" required autocomplete="off">
						<input type="hidden" name="subj_id" value="'.$subj_id.'" required>
						<span>Subject Level:</span>
						<select name="subj_level" value="" data-validation="required"  required>
						';
						for ($c = 0; $c < sizeof($subject_level); $c++) {
							echo $subj_level === $subject_level[$c] ? '<option value="'.$subject_level[$c].'" selected="selected">'.$subject_level[$c].'</option>' : '<option value="'.$subject_level[$c].'">'.$subject_level[$c].'</option>';	
						}
						echo '	
						</select>
						<span>Subject Department:</span>
						<select name="subj_dept" data-validation="required" required>
						';
						for ($c = 0; $c < sizeof($department); $c++) {
							echo $subj_dept === $department[$c] ? '<option value="'.$department[$c].'" selected="selected">'.$department[$c].'</option>' : '<option value="'.$department[$c].'">'.$department[$c].'</option>';	
						}
						echo '
						</select>
						<span>Subject Name:</span>
						<input type="text" data-validation="length custom" data-validation-length="max45" data-validation-regexp="^[a-zA-Z0-9\-& ]+$" data-validation-error-msg="Enter less than 45 characters and Alphanumerics only" name="subj_name" value="'.$subj_name.'" data-validation="required" required>
						<button name="update-button" class="customButton">Save <i class="fas fa-save fnt"></i></button>
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
				<div name="dialog" title="Delete subject data">
					<form action="admin-subjects" method="POST" required>
						<p>Are you sure you want to delete this subject?</p>
						<input type="hidden" value="'.$subj_id.'" name="subj_id">
						<button name="delete-button" class="customButton">Yes <i class="fas fa-save fnt"></i></button>
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
	</div>
