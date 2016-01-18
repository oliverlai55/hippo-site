<?php

include('inc/db_connect.php');

if($_GET['logout']){

	session_destroy();
	header('Location: index.php');
}

if(!isset($_SESSION['username'])){
	$results = DB::query("SELECT * FROM posts
		LEFT JOIN users ON posts.uid = users.uid
		ORDER BY posts.timestamp desc limit 30");
}else{
	$results_following = DB::query("SELECT distinct(user_id_to_follow) FROM following following
		WHERE following.user_id = %i" , $_SESSION['uid']);

	$last = count($results_following);

	if($last > 0){
		$i = 0;
		$following_array = '';
		foreach($results_following as $following){
			$i++;
			$following_array .= $following['user_id_to_follow'];
			if($i != $last){$following_array .= ",";} 
		}

		$posts = DB::query("SELECT * FROM posts
			LEFT JOIN users on posts.uid=user.id
			WHERE uid IN ($following_array)");
	}else{
		$posts = DB::query(
			"SELECT posts.content, posts.timestamp, users.username FROM posts
				LEFT JOIN users on posts.uid=users.id
				ORDER BY posts.timestamp desc limit 30");

	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Save the Hippos</title>
	<?php
	include 'inc/head.php';
	?>
</head>
<body>
	<div class="container">
		<?php include('inc/header.php');?>
		<div class="row">
			<div id="title-header" class="col-sm-12">
				<h1>The Hippo Guardian</h1>
			</div>
		</div>
		<?php
		if(isset($_SESSION['username'])){
			foreach($results as $result){
				$user = DB::query("SELECT * FROM users WHERE uid=%i",$result['uid']);
				print "<div class='post-container'><div class='user'><a href='/user.php?user=". $result['uid'] ."'>@" . $user[0]['userName'] . "</a></div>";
				print "<div class='post-content'>" . $result['content'] . "</div>";
				print "<div class='post-time'>". $result['timestamp'] ."</div>";
				print "<div class='vote-container'><a href='process_vote.php?pid=".$result['id']."&uid=".$result['uid']."&vote=up'><span class='glyphicon glyphicon-menu-up up-vote'></span></a>";
				print "<span class='votes'>".$result['pid']."</span>";
				print "<a href='process_vote.php?pid=".$result['id']."&uid=".$result['uid']."&vote=down'><span class='glyphicon glyphicon-menu-down down-vote'></span></a></div>";
				print "</div>";
			}
		}
		?>
		
		<?php include('inc/footer.php');?>
	</div>
</body>
</html>