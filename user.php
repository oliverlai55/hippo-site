<?php
	
	include 'inc/db_connect.php';

	if(isset($_GET['user'])){
		$result = DB::query("SELECT * FROM users WHERE uid=%i", $_GET['user']);
		$posts = DB::query("SELECT * FROM posts WHERE uid=%i ORDER BY posts.timestamp desc limit 30", $_GET['user']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Save Hippos - <?php print $result[0]['username'] ?></title>
	<?php include 'inc/head.php'; ?>

</head>
<body>
	<?php include 'inc/header.php';	?>
	<div class="container">
		<a href="update_image.php"><img class="col-xs-6 col-md-3 col-lg-2 profile_picture" src=<?php print $result[0]['profile_image_url'] ?>></a>
		<div class="username col-xs-12">@<?php print $result[0]['username'] ?></div>
		
		<?php
			foreach($posts as $post){
				$votes = DB::query("SELECT * FROM post_votes WHERE pid=%i",$post['pid']);
				$post_votes = 0;
				if(sizeof($votes) !== 0){
					foreach($votes as $vote){
						$post_votes += $vote['vote'];
					}
				}
				print "<div class='post-container col-xs-12'>";
					print "<div class='user'><a href='/user.php?user=". $_GET['user'] ."'>@" . $result[0]['username'] . "</a></div>";
					print "<div class='post-content'>" . $post['body'] . "</div>";
					print "<div class='post-time'>". $post['timestamp'] ."</div>";
					print "<div class='vote-container'>";
						print "<a href='process_vote.php?pid=".$post['pid']."&uid=".$_SESSION['uid']."&vote=up&view=".$_GET['user']."'>";
							print "<span class='glyphicon glyphicon-menu-up up-vote'></span>";
						print "</a>";
						print "<span class='votes'>".$post_votes."</span>";
					print "<a href='process_vote.php?pid=".$post['pid']."&uid=".$_SESSION['uid']."&vote=down&view=".$_GET['user']."'>";
						print "<span class='glyphicon glyphicon-menu-down down-vote'></span>";
					print "</a></div>";
				print "</div>";
			}

		?>

	</div>

	


	
</body>
</html>