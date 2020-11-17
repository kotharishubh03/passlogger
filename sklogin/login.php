<?php 
require_once "./req/pdo.php";
$salt = 'XyZzy12*_';
session_start();
if (isset($_POST['login_user'])) {
	$usr_email = htmlentities($_POST['usr_email']);
	$password = htmlentities($_POST['password']);
	//echo ($usr_email."   ".$password);
	if (strlen($usr_email) < 1 || strlen($password) < 1) {
		$_SESSION['error']="username and Password are Required";
		header('location: login.php');
		return;
	}else {
		//print_r($_POST);
        $check = hash('md5', $salt.$password);
        echo(hash('md5', $salt.$password));
		$stmt = $pdo->prepare('SELECT usr_id, usr_fname FROM user WHERE usr_email = :em AND password = :pw');
		$stmt->execute(array( ':em' => $usr_email, ':pw' => $check));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if ( $row !== false ) {
			$_SESSION['fname'] = $row['usr_fname'];
			$_SESSION['user_id'] = $row['usr_id'];
			header("Location: pin.php");
			return;
			
		} else {
			$_SESSION["error"] = "Incorrect password Login fail for ".$usr_email;
			
			//error_log("Login fail ".$usr_email." $check");
			header( 'Location: login.php' ) ;
			return;
		}
		
    }
  }  


?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <!--link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">

  <div class="header">
  	<h2>Login</h2>
  </div>

  <form method="post" action="login.php">
  	<?php
		if ( isset($_SESSION['error']) ) {
			echo ("<div class='error'>");
			echo $_SESSION['error']."\n";
			unset($_SESSION['error']);
			echo ("</div>");
		}
	?>
  	<div class="input-group">
  		<label>Username / Email</label>
  		<input type="text" name="usr_email" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Craete an account  <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
