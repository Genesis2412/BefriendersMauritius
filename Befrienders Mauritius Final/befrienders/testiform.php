<?php
	
	session_start();

	$view="";

	$view=$view.'<h2>'.'ADD TESTIMONIAL'.'</h2>';

	$view=$view.'<div class="container">';
	$view=$view.'<form action="addtesti.php" method="POST">';

	$view=$view.'<div class="row">';
	$view=$view.'<div class="col-25">';
	$view=$view.'<label for="Name">Name</label>';
	$view=$view.'</div>';
	$view=$view.'<div class="col-75">';
	$view=$view.'<input type="text" id="name" name="name" placeholder="Name" required>';
	$view=$view.'</div>';
	$view=$view.'</div>';

	$view=$view.'<div class="row">';
	$view=$view.'<div class="col-25">';
	$view=$view.'<label for="remark">remark</label>';
	$view=$view.'</div>';
	$view=$view.'<div class="col-75">';
	$view=$view.'<input type="text" id="remark" name="remark" placeholder="Remarks" required>';
	$view=$view.'</div>';
	$view=$view.'</div>';

	$view=$view.'<div class="row">';
	$view=$view.'<input type="submit" value="Add Remark">';
	$view=$view.'</div>';

	$view=$view.'<div class="row" id="error_message">';
	$view=$view.'</div>';     

	$view=$view.'</form>';
	$view=$view.'</div>';

	echo $view;
?>









	