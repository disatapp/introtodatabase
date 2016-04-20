<?php
	session_start();
	if(!isset($_SESSION['user_name'])){
	header("location:main.php");
	}
	$username = $_SESSION['user_name'];
	
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'disatapp-db';
	$dbuser = 'disatapp-db';
	$dbpass = 'TQOOIdfsDRGWJkvj';
		
	$con = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
	$db = mysql_select_db($dbname) or die(mysql_error());
	$doc = mysql_query("SELECT * FROM UserName WHERE userName='$username'");
	$m_value = mysql_fetch_array($doc);
	$user_id = $m_value['id'];
?>
<!DOCTYPE HTML>
<html lang="en">
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
  <div class="success_msg" style="display:none"> Saved! </div>
  	<hr>
    <div class="container">
	<br>
	<div class = "right-side">
		<a class="btn btn-sm btn-info" href="hub.php" >View List</a>
		<a class="btn btn-sm btn-danger logout" href="logout.php" >Logout</a>
	</div>
 
	<fieldset>
		<legend>User: <?php echo $username;?> </legend>
		<br>
	</fieldset>

	
    <?php
		if (isset($_POST['save_val'])) {
			if ($_POST['box']) {
				foreach ( $_POST['box'] as $key=>$value ) {
				$values = mysql_real_escape_string($value);
				$query = mysql_query("INSERT INTO todolist (user_id, description, check_value) VALUES ('$user_id', '$values', 'false')");
			}
		}
		mysql_close();
		}
	?>

		<form method="post" >
				<p id="add_field">
				<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-plus"> </span> </a>
				</p>
				<div id="container"></div>
				<br>
			<input class="btn btn-success right-side save" type="submit" name="save_val" value="Save" />
		</form>
	

	<script>
		$('.save').click(function()
		{
			toastr.success('New task added');
		})

		var counter = 0;
		$(function(){
			$('#add_field').click(function(){
				counter += 1;
				$('#container').append(
				'<strong> Order # ' + counter + '</strong><br>' 
				+ '<textarea class="form-control" id="field_' + counter + '" name="box[]' + '"></textarea><br />' );	 
			});
		});
	</script>
	<br>
	<br>
	<hr>

	<div class="footer">
	<p>CS:454 final by Pavin Disatapundhu</p>
	</div>

	</div>


</body>
</html>