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
<!-- form to post new feild -->
		<form method="post" >
			<label>Select A Character:
				<select name="charj" class="form-control">
					<?php $stmt = $mysqli->prepare("SELECT id, CONCAT(fname,' ',lname)AS fullname FROM charname GROUP BY id"); $stmt->execute(); $stmt->bind_result($id, $fullname); while($stmt->fetch()){echo '<option value="'. $id .'"> ' . $fullname . '</option>\n';} $stmt->close();?>
				</select></label></br>
				<p id="add_field">
					<a href="#" class="btn btn-primary">Add Job <span class="glyphicon glyphicon-plus"></span> </a>
				</p>
					<div id="container"></div>
				<br>
			<input class="btn btn-success right-side save" type="submit" name="sub_val" value="Save All" />
		</form>
<!-- php code to add a new job if( its new ), then add the relationship-->
	<?php
		if (isset($_POST['sub_val'])) {
			if ($_POST['jobb']) {
				$jobb = $_POST['jobb'];
				$charj = $_POST['charj'];
				for ($i = 0; $i < count($jobb); $i++) {
					$idi = $i + 1;
					$jobs = $mysqli->real_escape_string($jobb[$i]);
					if (!empty($jobb[$i])){
						$jquer = "SELECT id FROM profession j WHERE j_name = '$jobs'";
						$result = mysqli_query($mysqli, $jquer);
						if (mysqli_num_rows($result)==0) {
							$added = $mysqli->query("INSERT INTO profession (j_name) VALUES ('$jobs')");
							$jobsucc = "Job #". $idi ." added to database.";
							echo "<script>toastr.success('$jobsucc')</script>";
						}
						
						$result2 = mysqli_query($mysqli,"SELECT cp.id FROM char_prof cp INNER JOIN profession j ON cp.jid = j.id WHERE cp.cid = '$charj' AND j.j_name = '$jobs'");
						if (mysqli_num_rows($result2)==0)
						{
							if($query = $mysqli->query("INSERT INTO char_prof (cid, jid) VALUES ('$charj', (SELECT id FROM profession j WHERE j_name = '$jobs') )")){
								echo "<script>toastr.success('Successful')</script>";
							}
							else
							{
								echo "<script>toastr.error('Fail!')</script>";
							}
						
						}
						else
						{
							$joberror = "Job #". $idi ."is a duplicate field.";
							echo "<script>toastr.error('$joberror')</script>";
						}
					}
					else
					{

						$er = 'Job #'. $idi .' has missing a varible.';
						echo "<script>toastr.error('$er')</script>";
					}
				}
			}
		}
		mysqli_close($mysqli);
	?>

<!-- function to print more feild -->
	<script>
		var counter = 0;
		$(function(){
			$('#add_field').click(function(){
				counter += 1;
				save = $('#container').append('<br><div><label>Job #'+ counter + '<input type = "text" class= "form-control" id="fname_' + counter + '" name="jobb[]' + '"/></label></br></div>');
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