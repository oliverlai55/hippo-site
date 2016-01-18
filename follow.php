<?php include 'inc/db_connect.php';?>

<?php
	
	$results = DB::query(
		"SELECT users.id, users.username,");


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
	    	print '<div class="user">';
	    		// print '<div class="user-name col-md-6 text-left">'.$user['realname'].'</div>';
	    		print '<div class="user-hippo col-md-12 text-left">'.$user['username'].'</div>';
	    		print '<button type="button" class="btn '.$button_class.' col-md-2 text-left follow-button" data-follow="'.$follow.'" uid='.$user['id'].'>'.$button_text.'</button>';
	    	print '</div>';
	    }
	    ?>

		</div>
</body>
</html>