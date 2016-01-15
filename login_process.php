// <?php

// include('inc/db_connect.php');

// $username = $_POST['inputUsername'];
// $password = $_POST['inputPassword'];
// $hased_password = password_hash()

// //Get the hash from the DB
// $results = DB::query("SELECT * FROM users WHERE username=%s", $username); //some command
// foreach($results as $result){
// 	$hash = $result['password'];
// 	$uid = $result['uid'];
// //the password and uid is taken from the field names on the DB
// }

// //Compare the hash to the password using password_verify
// $pass_verify = password_verify($password, $hash);
// if($pass_verify){
// 	//password is good
// 	$_SESSION['username'] = $username;
// 	$_SESSION['uid'] = $uid;
// 	header('Location: /');
// 	exit;
// }else{
// 	header('Location: /login.php?login=fail');
// }

