	<?php require 'app/model/admin-funct.php'; $obj = new AdminFunct;?>
	<?php
		if (isset($_POST['submit-button'])){
			extract($_POST);
			if($obj->addFeeType($budget_name, $total_amount));
		}
		if (isset($_POST['update-button'])){
			extract($_POST);
			if($obj->updateFeeType($budget_id, $budget_name, $total_amount));
		}
		if (isset($_POST['delete-button'])){
			extract($_POST);
			if($obj->deleteFeeType($budget_id, "budget_info"));
		}
	?>
	<div class="contentpage" id="contentpage">
		<div class="row">
			<div class="widget">	
				<div class="header">	
					<div class="cont">	
						<i class="fas fa-money-check"></i>
						<span>Fee Type</span>
					</div>
					<p>School Year: <?php echo date("Y"); ?> - <?php echo date("Y")+1; ?></p>
				</div>
				<div class="widgetContent">
					<div class="cont1">
						<div name="content">
							<button name="opener" class="customButton">Add Fee Type<i class="fas fa-plus fnt"></i></button>
							<div name="dialog" title="Create new Fee type">
								<form action="admin-feetype" id="" method="POST" required autocomplete="off">
									<span>Fee Type:</span>
									<input type="text" name="budget_name" value="" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-& ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="Fee Type" required>
									<span>Total Amount:</span>
									<input type="text" name="total_amount" data-validation="number" data-validation-error-msg="Input numbers only" value="" placeholder="Total Amount" required>
									<button name="submit-button" class="customButton">Save <i class="fas fa-save fnt"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="cont2">
						<table id="noFilterTable" class="display">
							<thead>
								<tr>
									<th>Fee Type</th>
									<th>Total Amount</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
<?php
 foreach($obj->showSingleTable("budget_info") as $value){
 extract($value);
 echo '
 <tr>
 	<td>'.$budget_name.'</td>
 	<td align="right">&#8369;'.number_format($total_amount, 2).'</td>
 	<td class="action">
 		<div name="content">
			<button name="opener">
				<div class="tooltip">
					<i class="fas fa-edit"></i>
					<span class="tooltiptext">edit</span>
				</div>
			</button>
			<div name="dialog" title="Update fee type">
				<form action="admin-feetype" method="POST" required autocomplete="off">
					<input type="hidden" value="'.$budget_id.'" name="budget_id">
					<span>Fee Type:</span>
					<input type="text" name="budget_name" value="'.$budget_name.'" data-validation="length custom required" data-validation-length="max45" data-validation-regexp="^[a-zA-Z\-& ]+$" data-validation-error-msg="Enter less than 45 characters and Alphabets only" placeholder="Fee Type">
					<span>Total Amount:</span>
					<input type="text" name="total_amount" data-validation="number required" data-validation-error-msg="Input numbers only" value="'.$total_amount.'" placeholder="Total Amount">
					<button name="update-button" class="customButton">Update<i class="fas fa-save fnt"></i></button>
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
			<div name="dialog" title="Delete fee type">
				<form action="admin-feetype" method="POST" required>
					<p>Are you sure you want to delete this fee type?</p>
					<input type="hidden" value="'.$budget_id.'" name="budget_id">
					<button name="delete-button" class="customButton">Yes <i class="fas fa-save fnt"></i></button>
				</form>
			</div>  
		</div>
 	</td>
 </tr> ';
}
?>

<tr>
	<td><b>TOTAL AMOUNT:<b></td>
	<td align="right"><font color="green"><b>&#8369;<?php $obj->getTotalTotalAmount(); ?></b></font></td>
	<td></td>
</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>