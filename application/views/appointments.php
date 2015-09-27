<!DOCTYPE html>
<html>
<head>
	<title>What's Up</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
	<div id='nav' class='navbar navbar-default'>
		<ul>
			<li class='navbar-left hello-name'><h3>Hello, <?= $user['name'] ?></h3></li>
			<li class='navbar-right logout'><a href='/appointments/logout'>Logout</a></li>
		</ul>
		<div class='clearfix'></div>
	</div>

	<?php 

	$date = getdate(); 
	$date = date('m d Y',$date[0]); 

	?>


	<div id='main' class='container'>
		<div class='row'>
			<div class='col-md-12'>
		<?php if ($this->session->flashdata('errors')) {
			echo "<div id='errors'><fieldset>".$this->session->flashdata('errors')."</fieldset></div>";
		} ?>
		<h3>Here are your appointments for today, <?= $date ?></h3>
		<table id='today' class='table table-striped'>
			<thead>
				<tr>
					<th>Tasks</th>
					<th>Time</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php for ($i = 0; $i < count($appointments); $i++) {
					echo "<tr>";
					$app_datetime = strtotime($appointments[$i]['app_datetime']);
					$app_datetime = date('m d Y', $app_datetime);
					if ($app_datetime === $date) {
						$time = strtotime($appointments[$i]['app_datetime']);
						$time = date('G:i', $time);
						$status = getdate();
						$status = date('G:i',$status[0]);
						if ($status >= $time) {
							$status = 'Done';
						} else {
							$status = 'Pending';
						}
						echo "<td>".$appointments[$i]['tasks']."</td>";
						echo "<td>".$time."</td>";
						echo "<td>".$status."</td>";
						echo "<td><a href='/edit/".$appointments[$i]['app_id']."'>Edit</a> <a href='/delete/".$appointments[$i]['app_id']."' class='pull-right'>Delete</a></td>";
					}
					echo "</tr>";
				} ?>
			</tbody>
		</table>

		<h3 class='otherappt'>Your other appointments:</h3>
		<table id='other' class='table table-striped'>
			<thead>
				<tr>
					<th>Tasks</th>
					<th>Date</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
				<?php for ($j = 0; $j < count($appointments); $j++) {
					echo "<tr>";
					$app_datetime = strtotime($appointments[$j]['app_datetime']);
					$app_datetime = date('l d Y', $app_datetime);
					if ($app_datetime > $date) {
						$app_date = strtotime($appointments[$j]['app_datetime']);
						$app_date = date('F j', $app_date);
						$time = strtotime($appointments[$j]['app_datetime']);
						$time = date('G:i', $time);
						echo "<td>".$appointments[$j]['tasks']."</td>";
						echo "<td>".$app_date."</td>";
						echo "<td>".$time."</td>";
					}
					echo "</tr>";
				} ?>
			</tbody>
		</table>

			<h3>Add Appointment</h3>
			<form action='/add' method='post'>
				<label>Date: </label><input type='date' name='date' />
				<label>Time: </label><input type='time' name='time' />
				<label>Tasks: </label><input type='text' name='tasks' />
				<input type='submit' value='Add' />
			</form>
			</div>
		</div>
	</div>
</body>
</html>
