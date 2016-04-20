<!-- connection -->
<?php
	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","disatapp-db","TQOOIdfsDRGWJkvj","disatapp-db");
	if($mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.micss">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	</head>

  <body>
    <div class="container">
		<a class="btn btn-sm bth-info" href = "main.php">Main</a>
		<a class="btn btn-sm bth-info" href = "add.php">Add Character</a>
		<a class="btn btn-sm bth-info" href = "addJob.php">Add Job</a>
		<a class="btn btn-sm bth-info" href = "homeplanet.php">Edit Homeplanet</a>
	<br>
	<div class = "right-side">
	</div>
	<fieldset>
		<legend>Add Job</legend><br>
	</fieldset>
<!-- form to post update -->
		<form method="post" >
			<label>Select A Character:
				<select name="charj" class="form-control">
					<?php $stmt = $mysqli->prepare("SELECT id, CONCAT(fname,' ',lname)AS fullname FROM charname GROUP BY id"); $stmt->execute(); $stmt->bind_result($id, $fullname); while($stmt->fetch()){echo '<option value="'. $id .'"> ' . $fullname . '</option>\n';} $stmt->close();?>
				</select>
			</label>
			<label>Re-assign Homeplanet:
				<select name="plname" class="form-control">
					<?php $stmt = $mysqli->prepare("SELECT id, pl_name FROM planet GROUP BY id"); $stmt->execute(); $stmt->bind_result($id, $pl_name); while($stmt->fetch()){echo '<option value="'. $id .'"> ' . $pl_name . '</option>\n';} $stmt->close();?>
				</select>
			</label>
			</br>
				<div id="container"></div>
				<br>
			<input class="btn btn-success right-side save" type="submit" name="sub_edit" value="Update" />
		</form>
<!-- php submit the update -->
	<?php
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
	<br>
	<br>
	<hr>
	<div class="footer">
	<p>CS:275 final by Pavin Disatapundhu</p>
	</div>
</div>
</body>
</html>