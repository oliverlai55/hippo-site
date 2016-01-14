<?php
	include 'inc/db_connect.php';

	if(isset($_POST['userName'])){
		$username = $_POST['userName'];
		$password = $_POST['password'];

		//Now that the user submitted something, check to see
		//if its in DB
		$results = DB::query("SELECT * FROM users
			WHERE username=%s OR email = %s",$username, $username);

		if(sizeof($results) == 1){
			$hash = $results[0]['password'];
			$uid = $results[0]['uid'];
		}

		$pass_verify = password_verify($password, $hash);

		if($pass_verify){
			$_SESSION['username'] = $username;
			$_SESSION['uid'] = $uid;
			header('Location: index.php');
			exit;
		}else{
			header('Location: login.php?login=failure');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<?php
include('inc/head.php');
?>

</head>
<body>

<div class="container">
	<div class="row">
		<h2 id="login">Login</h2>
	</div>
	<div class="row">
	<?php
		if($_GET['login'] == 'failure'){
			print "<h4>Your login information does not match any record in our system. Please try again.</h4>";
		}
	?>
	</div>
	<form method="post" action="login.php">
		<div class="row">
			<input class="form-control" type="text" name="userName" placeholder="Username">
		</div>
		<div class="row">
			<input class="form-control" type="password" name="password" placeholder="Password">
			<a href="/index.php"><input class="btn btn-primary" type="button" value="Cancel"></a>
		</div>
	</form>
</div>
	
</body>
</html>