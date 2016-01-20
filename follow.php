<?php 
	include 'inc/db_connect.php';

	//All users
	$results = DB::query("SELECT * FROM users WHERE uid !=".$_SESSION['uid']);

	$results_following = DB::query("SELECT distinct(user_id_to_follow) FROM following following
		WHERE following.user_id=%i" , $_SESSION['uid']);
	foreach($results_following as $user){
		$users[] = $user;
	}

	$last = count($results_following);

	$following_array = [];
	if($last > 0){
		foreach($results_following as $following){
			$following_array[] = $following['user_id_to_follow'];
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include('inc/head.php') ?>
</head>
<body>
	<?php include('inc/header.php') ?>

	<div class="container">
		<?php foreach($results as $user){

	    	if(in_array($user['id'],$following_array)){
	    		$button_text = 'Unfollow';
	    		$follow = "unfollow";
	    		$button_class = 'btn-default';
	    	}else{
	    		$button_text = 'Follow';
	    		$follow = "followed";
	    		$button_class = 'btn-primary';

	    	}
	    	print '<div class="row">';
	    		print '<div class="user col-xs-2 col-xs-offset-3 text-left"><a href="/user.php?user='. $user['uid'] .'">@'.$user['username'].'</a></div>';
	    		print '<button type="button" class="btn '.$button_class.' col-xs-3 col-xs-offset-1 text-left follow-button" data-follow="'.$follow.'" uid='.$user['uid'].'>'.$button_text.'</button>';
	    	print '</div>';
	    }
	    ?>

		</div>
</body>
</html>