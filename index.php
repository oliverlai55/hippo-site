<?php

include('inc/db_connect.php');

if($_GET['logout']){

	session_destroy();
	header('Location: index.php');
}

if($_SESSION['username']){
	$results = DB::query("SELECT * FROM posts ORDER BY timestamp desc limit 30");
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
					print "<div class='post-container'><div class='user'><a href='/user.php?user=". $result['uid'] ."'>@" . $user[0]['username'] . "</a></div>";
					print "<div class='post-content'>" . $result['body'] . "</div>";
					print "div class='post-time'>". $result['timestamp'] . "</div></div>";
				}
			}
		?>
		
		<?php include('inc/footer.php');?>
	</div>
</body>
</html>