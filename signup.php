<?php
	include 'inc/db_connect.php';

	if($_SESSION)['username']){
		header('Location: index.php');
	}

	if(isset($_POST['userName'])){
		if($_POST['password'] !== $_POST['password-confirm']){
			header('Location: /signup.php?password=fail');
		}

		$fullName = $_POST['name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
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
	
	}
?>