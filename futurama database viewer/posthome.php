<?php
	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","disatapp-db","TQOOIdfsDRGWJkvj","disatapp-db");
	if($mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		
	if (isset($_POST['sub_edit'])) {
		if ($_POST['plname']) {
			$pl = $_POST['plname'];
			$ch = $_POST['charj'];
				if ($update=$mysqli->query("UPDATE charname SET planet = '$pl' WHERE id = '$ch'")){
					echo "<script>toastr.success('Updated')</script>";
				}
			}
		}
	mysqli_close($mysqli);
?>