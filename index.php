<?php

include('inc/db_connect.php');

if($_GET['logout']){

	session_destroy();
	header('Location: index.php');
}

if($_SESSION)['username']{
	$results = DB::query("SELECT * FROM posts ORDER BY timestamp desc limit 30");
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha256-Av2lUNJFz7FqxLquvIFyxyCQA/VHUFna3onVy+5jUBM= sha512-zyqATyziDoUzMiMR8EAD3c5Ye55I2V3K7GcmJDHbL49cXzFQCEA6flSKqxEzwxXqq73/M4A0jKFFJ/ysEhbExQ==" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="script.js"></script>

</head>
<body>
	<div class="container">
		<?php include('inc/header.php');?>
		<div class="row">
			<div id="title-header" class="col-sm-12">
				<h1>The Hippo Guardian</h1>
			</div>
		</div>
		<div class="row">
			<div id="header" class="col-sm-12">
				<h2>Join the millions fighting for Hippos today!</h2>
			</div>
		</div>
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Full Name</label>
				<div class="controls">
					<input type="text" id="inputEmail" placeholder="Full Name">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
					<input type="text" id="inputEmail" placeholder="Email">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Username</label>
				<div class="controls">
					<input type="text" id="inputEmail" placeholder="Username">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
					<input type="password" id="inputPassword" placeholder="Password">
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox"> Remember me
					</label>
					<button type="submit" class="btn">Sign in</button>
				</div>
			</div>
		</form>
		<?php include('inc/footer.php');?>
	</div>
</body>
</html>