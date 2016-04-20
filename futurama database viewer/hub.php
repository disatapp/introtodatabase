<?php
	session_start();
	if(!$_SESSION['user_name']){
		header("location:main.php");
	}
	$username = $_SESSION['user_name'];
	
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'disatapp-db';
	$dbuser = 'disatapp-db';
	$dbpass = 'TQOOIdfsDRGWJkvj';
		
	$connection = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
	$database = mysql_select_db($dbname) or die(mysql_error());
	
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
	<hr>
	<div class="container">	
	<br>
	<?php
	$remove = $_GET['remove'];
	$doc = mysql_query("SELECT * FROM users WHERE username='$username'");
	$find = mysql_fetch_array($doc);
	$user_id = $find['id'];
	?>

	<div class="right-side">  
	<a class="btn-info btn btn-sm"  href="newtask.php"> Add </a>  
	<a class="btn btn-danger btn-sm logout" href="logout.php" > Logout</a> </div>

	<fieldset>
	<legend>User: <?php echo $username; ?></legend>
	</fieldset>
	<br>
	<?php
	if($remove) {
	 
	$success = mysql_query("DELETE FROM todolist WHERE id='$remove'");
	}
	?>
	<br/>
	<div>  <b>To-Do:</b> </div>

	<table class="table talbe-striped">
	<tr>
	<th>Description of task</th>
	<th>Remove</th>
	</tr>
	<?php
	$doc = mysql_query("SELECT * FROM todolist WHERE user_id='$user_id' ORDER BY id DESC");
	while($find = mysql_fetch_array($doc)) 
	{ 
	?>
	<tr>  
	<td> 
	<input id="<?php echo $find['id']; ?>" class="<?php echo $find['id']; ?> form-control" placeholder="<?php echo $find['description']; ?>"></input> 
	</td> 
	<td style="text-align:center;">
	<a class="btn btn-danger remove" href="?remove=<?php echo $find['id']; ?>"> <span class="glyphicon glyphicon-trash"></span></a>
	</td>
	</tr>

	<?php
	}
	?>
	</table>
		<script>
		$('.remove').click(function(){
			toastr.error('Removed','Task');
		});
		</script>
		<hr>
	<div>
		<p>CS:454 final by Pavin Disatapundhu</p>
	</div>
	
	</div>
</body>
</html>