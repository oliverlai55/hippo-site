<?php

include('inc/db_connect.php');

if($_GET['logout']){

	session_destroy();
	header('Location: index.php');
}

if(isset($_SESSION['username'])){
	$results = DB::query("SELECT * FROM posts
		LEFT JOIN users ON posts.uid = users.uid
		ORDER BY timestamp desc limit 30");
}else{
	print $_SESSION['uid'];
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
				print "<div class='post-container'><div class='user'><a href='/user.php?user=". $result['uid'] ."'>@" . $user[0]['username'] . "</a></div>";
				print "<div class='post-content'>" . $result['content'] . "</div>";
				print "<div class='post-time'>". $result['timestamp'] ."</div>";
				print "<div class='vote-container'><a href='process_vote.php?post_id=".$result['post_id']."&voter_user_id=".$result['voter_user_id']."&vote=up'><span class='glyphicon glyphicon-menu-up up-vote'></span></a>";
				print "<span class='votes'>".$result['post_id']."</span>";
				print "<a href='process_vote.php?post_id=".$result['post_id']."&voter_user_id=".$result['voter_user_id']."&vote=down'><span class='glyphicon glyphicon-menu-down down-vote'></span></a></div>";
				print "</div>";
			}
		}
		?>
		
		<?php include('inc/footer.php');?>
	</div>
</body>
</html>