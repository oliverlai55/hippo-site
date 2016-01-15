<?php
	include 'inc/db_connect.php';

	if($_GET['vote'] == 'up'){
		$vote = 1;
	}else{
		$vote = -1;
	}

	DB::insert('post_votes', array(
		'post_id' => $_GET['post_id'],
		'voter_user_id' => $_GET['voter_user_id'],
		'vote' => $vote
		));
	header('Location: index.php');
?>