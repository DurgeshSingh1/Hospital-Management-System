<?php

include '../config.php';

if (isset($_POST['submit'])) {
	
	$str = $_POST['med'];
	$aptId = (int)$_POST['aptId'];
	$added = false;
	
	if (!empty($str) && !empty($aptId)) {
		$stmt = "INSERT INTO prescription(apt_id, med) VALUES('$aptId', '$str')";

		if ($conn->query($stmt) === TRUE) {
			$added = true;
		} else {
			echo "Error :-> ".$conn->error;
			$added = false;
		}
	} 
}

?>
<div class="msg mt-3 mb-5">
	<?php
		if ($added === true) {
	?>
			<div class="alert alert-success">
			  	<strong>Prescription Added!</strong><a href="./doctorAllAppointments.php" class="alert-link"> Go to Appointments</a>
			</div>
	<?php
		} else {
	?>
			<div class="alert alert-danger">
			  	<strong>Something went wrong!</strong>
			</div>
	<?php
		}
	?>
</div>