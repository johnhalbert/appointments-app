<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
	<div id='nav' class='navbar navbar-default'>
		<ul>
			<li class='navbar-left hello-name'><h3>Hello, <?= $user['name'] ?></h3></li>
			<li class='navbar-right logout'><a href='/appointments/logout'>Logout</a></li>
		</ul>
	</div>

	<?php 

	$date = date('Y-m-d', strtotime($edit['app_datetime']));
	$time = date('G:i:s', strtotime($edit['app_datetime']));

	?>

	<div id='main' class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<form action='/appointment_edit' method='post'>
					<label>Date: </label><input class='form-control' type='date' name='date' value='<?= $date ?>' />
					<label>Time: </label><input class='form-control' type='time' name='time' value='<?= $time ?>' />
					<label>Tasks: </label><input class='form-control' type='text' name='tasks' value='<?= $edit['tasks'] ?>' />
					<input type='hidden' name='app_id' value='<?= $edit['app_id'] ?>' />
					<input class='submit btn btn-primary' type='submit' value='Submit' />
		 		</form>
		 	</div>
	 	</div>
	</div>
</body>
</html>