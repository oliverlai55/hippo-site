<?php

include('inc/db_connect.php');

if($_GET['logout']){

	session_destroy();
	header('Location: index.php');
}

if(!$_SESSION['username']){
	header('Location: login.php');
}
	
	$results_following = DB::query("SELECT distinct(user_id_to_follow) FROM following following
		WHERE following.user_id=%i" , $_SESSION['user_id']);
		$last = count($results_following);
		if($last > 0){
			$i = 0;
			$following_array = '';
			foreach($results_following as $following){
				$i++;
				$following_array .= $following['user_id_to_follow'];
				if($i != $last){$following_array .= ",";}
			}
			$posts = DB::query("SELECT posts.body, posts.timestamp, users.username, users.uid, posts.pid FROM posts
				LEFT JOIN users on posts.uid = users.uid
				WHERE posts.uid IN ($following_array)
				ORDER BY posts.timestamp desc");
		}else{
			$posts = DB::query(
				"SELECT posts.content, posts.timestamp, users.username FROM posts
					LEFT JOIN users on posts.uid=users.uid
					ORDER BY posts.timestamp desc limit 30");
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
		if((isset($_SESSION['username']))&&(sizeof($posts) > 0)){
			foreach($posts as $post){
				$votes = DB::query("SELECT * FROM post_votes WHERE pid=%i",$post['pid']);
				$post_votes = 0;
				if(sizeof($votes) !== 0){
					foreach($votes as $vote){
						$post_votes += $vote['vote'];
					}
				}

				
				print "<div class='post-container'><div class='user'><a href='/user.php?user=". $post['uid'] ."'>@" . $post['userName'] . "</a></div>";
				print "<div class='post-content'>" . $post['content'] . "</div>";
				print "<div class='post-time'>". $post['timestamp'] ."</div>";
				print "<div class='vote-container'><a href='process_vote.php?pid=".$post['pid']."&uid=".$post['uid']."&vote=up'><span class='glyphicon glyphicon-menu-up up-vote'></span></a>";
				print "<span class='votes'>".$post_votes ."</span>";
				print "<a href='process_vote.php?pid=".$post['id']."&uid=".$post['uid']."&vote=down'><span class='glyphicon glyphicon-menu-down down-vote'></span></a></div>";
				print "</div>";
			}
		}else{
			print '<div class="start-following"> Follow some people <a href="/follow.php">here</a> to see posts</div>';
		}
		?>
		
		<?php include('inc/footer.php');?>
	</div>
</body>
</html>