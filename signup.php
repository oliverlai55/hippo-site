<?php 
include 'inc/db_connect.php';

if($_SESSION['username']){
	header('Location: index.php');
}

if(isset($_POST['userName'])){
	if($_POST['password'] !== $_POST['password-confirm']){
		$fullName = $_POST['name'];
		$email = $_POST['email'];
		$username = $_POST['userName'];
		$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		//User submitted something
		//check to see if this user is in the DB
		$result = DB::query("SELECT * FROM users WHERE username = '" . $_POST['userName']."' OR email = '" . $email . "'");
		if(!$result){
			$result = DB::query("INSERT INTO users (name,email,username,password) VALUES
			('" . $fullName . "','" . $email . "','" . $username . "','" . $hashed_password . "')" );
			$_SESSION['username'] = $username;
			$_SESSION['uid'] = DB::insertId();
			header('Location: /index.php');
		}else{
			header('Location: /signup.php?register=failure');
		}
	}else{
		header('Location: /signup.php?password=fail');
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>

	<?php
	include('inc/head.php');
	?>
</head>
<body>
	<?php
	include('inc/header.php');
	?>
	
	<div class="container">
		<div class="row">
			<h1 id="signin" class="col-xs-8 col-xs-offset-2">Registration</h1>
		</div>
		<div class="row">
			<?php
			if($_GET['register'] == 'failure'){
				print "<h4 class='red-text'>Your Username or Email already exists in our database</h4>";
			}
			if($_GET['password'] == 'fail'){
				print "<h4 class='red-text'>The passwords you entered do not match.</h4>";
			}
			?>
		</div>
		<form method="post" action="signup.php">
			<div class="row">
				<input class="form-control" type="text" name="name" placeholder="Full Name...">
			</div>
			<div class="row">
				<input class="form-control" type="email" name="email" placeholder="Email Address...">
			</div>
			<div class="row">
				<input class="form-control" type="text" name="userName" placeholder="Username...">
			</div>
			<div class="row">
				<input class="form-control" type="password" name="password" placeholder="Password...">
			</div>
			<div class="row">
				<input class="form-control" type="password" name="password-confirm" placeholder="Confirm Password...">
			</div>
			<div class="row">
				<input class="col-xs-3 col-xs-offset-3 btn btn-success" type="submit" value="Register">
				<a href="/index.php"><input class="col-xs-3 btn btn-danger" type="button" value="Cancel"></a>
			</div>
		</form>
	</div>
</body>
</html>