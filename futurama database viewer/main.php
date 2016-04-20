<!-- Connection-->

<?php
	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","disatapp-db","TQOOIdfsDRGWJkvj","disatapp-db");
	if($mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
?>

<!DOCTYPE html>
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
	<fieldset>
		<h1 class="pageHeader">Futurama Database</h1>
	</fieldset>
	<br>
	<br>
<!-- Table to disply data-->
	<table class="table table-hover">
		<tr>
			<td>Name</td>
			<td>Age</td>
			<td>Species</td>
			<td>Homeplanet</td>
			<td>First Episode</td>
			<td>Profession</td>
			<td></td>
		</tr> 		
<!-- php code that will retreive data from the table and display it-->
		<?php
			if(!($stmt = $mysqli->prepare("SELECT ch.id, CONCAT(ch.fname,' ',ch.lname)AS fullname, ch.age, s.s_name, p.pl_name, e.e_name, GROUP_CONCAT(DISTINCT pr.j_name ORDER BY pr.id SEPARATOR ', ')AS profession 
												FROM charname ch 
												INNER JOIN species s ON ch.specie = s.id
												INNER JOIN planet p ON ch.planet = p.id
												LEFT JOIN episode e ON ch.f_episode = e.id
												LEFT JOIN char_prof cp ON ch.id = cp.cid
												LEFT JOIN profession pr ON cp.jid = pr.id
												GROUP BY ch.id"))){
				echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
			}

			if(!$stmt->execute()){
				echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$stmt->bind_result($id, $fullname, $age, $s_name, $pl_name, $e_name,$profession)){
				echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while($stmt->fetch()){
				echo "<tr>\n<td>\n" . $fullname . "\n</td>\n<td>\n" . $age . "\n</td>\n<td>\n". $s_name . "\n</td>\n<td>\n" . $pl_name . "\n</td>\n<td>\n". $e_name . "\n</td>\n<td>\n" . $profession . "\n</td>\n<td>\n<a href='delete.php?id=". $id ."' class='deleteRow btn btn-danger remove'>\n<span class=' glyphicon glyphicon-trash'>\n</span>\n</a>\n</td>\n</tr>";
			}
			$stmt->close();
		?>
	</table>
	<!-- JS code to delete user row-->
	<script type="text/javascript">
	$('a.deleteRow').click(function() { 
    	var para = $(this); 
		$.ajax({ 
			type: 'get', 
			url: para.attr('href'),  
			success: function(results){ 
			    para.closest('tr').fadeOut('slow'); 
			}
		}) 
    return false; 
	});

	</script>
	<hr>
	<div class="footer">
	<p>CS:275 final by Pavin Disatapundhu</p>
	</div>

</div>
</body>
</html>