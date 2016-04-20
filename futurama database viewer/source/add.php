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
		<legend>Add Character</legend><br>
	</fieldset>
<!-- form to post new feild -->
		<form method="post" >
				<p id="add_field">
					<a href="#" class="btn btn-primary">Add Field <span class="glyphicon glyphicon-plus"></span></a>
				</p>
				<div id="container"></div>
				<br>
			<input class="btn btn-success right-side save" type="submit" name="save_val" value="Save All" />
		</form>

<!-- php code to add a characters-->
	<?php
		if (isset($_POST['save_val']) && isset($_POST['bfname']) && isset($_POST['blname'])) {
			if ($_POST['bfname'] && $_POST['blname']) {
				$fname = $_POST['bfname'];
				$lname = $_POST['blname'];
				$planet = $_POST['bpname'];
				$species = $_POST['bsname'];
				$age = $_POST['bage'];
				for ($i = 0; $i < count($fname); $i++) {
					$idi = $i + 1;
					$vfname = $mysqli->real_escape_string($fname[$i]);
					$vlname = $mysqli->real_escape_string($lname[$i]);
					$vpname = $mysqli->real_escape_string($planet[$i]);
					$vsname = $mysqli->real_escape_string($species[$i]);
					$vage = $age[$i];
					if (empty($vfname) || empty($vlname)){
						$er = "Character #". $idi ." had a missing varible.";
						echo "<script>toastr.error('$er')</script>";
					}
					else
					{
						$vage = $age[$i];
						if($query = $mysqli->query("INSERT INTO charname (fname, lname, planet, specie, age) VALUES ('$vfname', '$vlname', '$vpname', '$vsname', '$vage')")){
							$suc = "Character #". $idi ." successful added.";
							echo "<script>toastr.success('$suc')</script>";
						}
						
					}
				}
			}
		}
		unset($_POST);
	?>
<!-- JS code to print out form from new user input-->
	<script>
		var counter = 0;
		$(function(){
			$('#add_field').click(function(){
				counter += 1;
				save = $('#container').append('<div>\n<fieldset><h4>Character '+ counter +':</h4></fieldset><label>First Name<input type = "text" class= "form-control" id="fname_' + counter + '" name="bfname[]' + '"/></label>\n<label>Last Name<input type = "text" class= "form-control" id="lname_' + counter + '" name="blname[]' + '"/></label>\n<label>Age<input type = "number" class= "form-control" id="age_' + counter + '" name="bage[]' + '"/></label>\n<label>Homeplanet<select name="bpname[]" class="form-control"><?php $stmt = $mysqli->prepare("SELECT id, pl_name FROM planet GROUP BY id"); $stmt->execute(); $stmt->bind_result($id, $pl_name); while($stmt->fetch()){echo '<option value="'. $id . '"> ' . $pl_name . '</option>\n';} $stmt->close();?></select></label>\n<label>Species<select name="bsname[]" class="form-control"><?php $stmt = $mysqli->prepare("SELECT id, s_name FROM species GROUP BY id"); $stmt->execute(); $stmt->bind_result($id, $s_name); while($stmt->fetch()){echo '<option value="'. $id . '"> ' . $s_name . '</option>\n';} $stmt->close();?></select></label></div>');
			});
		});
	</script>
	<br>
	<br>
	<hr>
	<div class="footer">
	<p>CS:275 final by Pavin Disatapundhu</p>
	</div>

	</div>

</body>
</html>