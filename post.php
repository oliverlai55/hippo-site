<?php include 'inc/db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>New Post - Save the Hippos</title>
	<?php include 'inc/head.php'; ?>
</head>
<body>
	<?php include 'inc/header.php'; ?>

	<div class="container">
		<form action="submit_post.php" method = "post">
			<div class="form-group">
				<label style="color:black" for="new-post">POST</label>
				<textarea class="form-control" rows="5" name="newPost" id="new-post" ></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Post">
			</div>
		</form>
	</div>
	
</body>
</html>