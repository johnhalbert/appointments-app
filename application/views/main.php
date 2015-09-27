<!DOCTYPE html>
<html>
<head>
	<title>Login/Registration</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
	<div id='main' class='container'>
		<div class='row'>
		<?php if ($this->session->flashdata('errors')) { echo "<div id='errors' class='alert alert-danger'>".$this->session->flashdata('errors')."</div>"; } ?>
		<div class='col-md-6 half'>
		<form action='/register' method='post'>
			<fieldset>
				<legend>Register</legend>
				<label>Name: </label><input class='form-control' type='text' name='name' />
				<label>Email: </label><input class='form-control' type='text' name='email' />
				<label>Password: </label><input class='form-control' type='password' name='password' />
				<label>Confirm PW: </label><input class='form-control' type='password' name='confirm_pw' />
				<label>Date of Birth: </label><input class='form-control' type='date' name='dob' />
				<input class='submit btn btn-primary' type='submit' value='Register' />
			</fieldset>
		</form>
	</div>
	<div class='col-md-6 half'>
		<form action='/login' method='post'>
			<fieldset>
				<legend>Login</legend>
				<label>Email: </label><input class='form-control' type='text' name='email' />
				<label>Password: </label><input class='form-control' type='password' name='password' />
				<input class='submit btn btn-primary' type='submit' value='Login' />
			</fieldset>
		</form>
	</div>
	</div>
	</div>
</body>	
</html>