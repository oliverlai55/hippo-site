<?php

	include 'inc/db_connect.php';

	if($_SESSION['uid']){
		if(isset($_POST['image_url'])){
			try{
				DB::query("UPDATE users SET profile_image_url='". $_POST['image_url']."' WHERE uid='".$_SESSION['uid']."'");
			}catch(MeekroDBException $e){
            	header('Location: /update_image.php?error=yes');
            	exit;
        	}
			header('Location: user.php?user='.$_SESSION['uid']);
		}
	}else{
		header('Location: login.php');
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'inc/head.php'; ?>
</head>
<body>
	<?php include 'inc/header.php'; ?>
	<div class="container">
		<div class="row">
			<form method="post" action="update_image.php">
			<?php if($_GET['error'] == 'yes'){
						print '<div class="red-text">There was an error updating your image url. Please try again</div>';
			}
			?>
				<div class="row">
					<input class="form-control" type="text" name="image_url" placeholder="Put New Profile Image URL Here...">
				</div>
				<div class="row">
					<input type="submit" value="Update" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</body>
</html>