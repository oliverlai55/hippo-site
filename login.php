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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	
</body>
</html>