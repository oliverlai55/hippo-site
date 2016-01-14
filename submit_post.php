<?php

	include('inc/db_connect.php');
	try{
		DB::insert('posts', array(

			'uid' => $_SESSION['uid'],
			'content' => $_POST['newPost'],
			'timestamp' => time()

		));
	}catch(MeekroDBException $e){
		header('Location: /submit.php?error=yes');
		exit;
	}

	$_SESSION['username'] = $username;
	$_SESSION['uid'] = DB::insertId();
	header('Location: /?callback=post');
	exit;
?>