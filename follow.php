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
		<div class="row">
			<?php
				foreach($result as $user){
					print '<div class="row">';
						print '<div class="user">'.$user['username'].'</div>';
						print '<div class="follow-user"><button type="button" class="btn btn-primary" uid='.$user['id'].'>;
					print '</div>';
				}
			?>
		</div>
	</div>
</body>
</html>