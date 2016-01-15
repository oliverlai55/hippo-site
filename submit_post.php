<?php

	include('inc/db_connect.php');
	try{
		DB::insert('posts', array(

			'uid' => $_SESSION['uid'],
			'content' => $_POST['newPost']

		));
	}catch(MeekroDBException $e){
		header('Location: /submit.php?error=yes');
		exit;
	}

	header('Location: /?callback=post');
	exit;
?>