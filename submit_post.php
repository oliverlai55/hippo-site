<?php

	include('inc/db_connect.php');
	try{
		DB::insert('posts', array(
			'id' => '',
			'user_id' => $_SESSION['uid'],
			'body' => $_POST['newPost'],
			'timestamp' => time()

		));
	}catch(MeekroDBException $e){
		header('Location: /submit.php?error=yes')
		exit;
	}

	$_SESSION['username'] = $username;
	$_SESSION['uid'] = DB::insertId();
?>