<?php

	include('inc/db_connect.php');

	// print "<h1>Home Page</h1>";

	$results = DB::query("SELECT * FROM users");
	foreach($results as $result){
		// print_r($result);
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

</head>
<body>
	<div class="container">
		<div class="row col-sm-12">
			<div class="btn btn-primary col-sm-1">Home</div>
			<div class="col-sm-5"></div>
			<div class="col-sm-4"></div>
			<div class="btn btn-primary col-sm-1">Signup</div>
			<div class="btn btn-primary col-sm-1">Log In</div>
		</div>
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
		<div id="input-box" class="row col-sm-offset-4 col-sm-8">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Full Name" aria-describedby="basic-addon2">
			</div>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon2">
			</div>
			<div class="input-group">
			<input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon2">
			</div>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon2">
			</div>
		</div>
	</div>
</body>
</html>