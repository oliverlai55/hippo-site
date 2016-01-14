<?php

include('inc/db_connect.php');

$username = $_POST['username'];
$password = $_POST['password'];


$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	
	try{
	DB::insert('users',array(
		'uid' => '',
		'name' => $username,
		'password' => $hashed_password,
		'status' => 1

		));
	}catch(MeekroDBException $e){
		header('Location: /signup.php?error=yes');
		exit;
	}

	$_SESSION['username'] = $username;
	$_SESSION['uid'] = DB::insertId();
	//this is gonna fetch whatever the auto increment is
	//the last auto id that was incremented, that will be used as uid
	header('Location: /?callback=registration');
?>