<?php

$username = $_POST['username'];
$password = $_post['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	DB::insert('users',array(
		'uid' => '',
		'name' => $username,
		'password' => $hashed_password,
		'status' => 1

		));

?>