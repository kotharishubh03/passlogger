<?php 
require_once "./req/pdo.php";
$salt = 'XyZzy12*_';
session_start();
if (isset($_POST['reg_user'])) {
    $email = htmlentities($_POST['email']);
    $pass1 = htmlentities($_POST['password_1']);
    $pass2 = htmlentities($_POST['password_2']);
    $pin = htmlentities($_POST['pin']);
    //print_r($username.$email.$pass1.$pass2);
    if (strlen($pin) < 1 || strlen($pass1) < 1 || strlen($email) < 1 || strlen($pass2) < 1) {
        $_SESSION['error']="All Fields are Required";
		header('location: register.php');
		return;
    } else {
        if ($pass1 != $pass2) {
            $_SESSION['error']="Password 1 and 2 dont match";
            header('location: register.php'); 
            return;
        }
        if (! is_numeric($pin)) {
            $_SESSION['error']="Pin must be numeric";
            header('location: register.php'); 
            return;
        }
        $checkpw = hash('md5', $salt.$pass1);
        $checkpin = hash('md5', $salt.$pin);
        //echo(hash('md5', $salt.$password));
        $stmt = $pdo->prepare('INSERT INTO `user`(`usr_email`, `password`, `pin`) VALUES (:em , :pw , :pin )');
        $stmt->execute(array( ':em' => $email, ':pw' => $checkpw, ':pin' => $checkpin));
        $_SESSION['error']="success";
        header('location: login.php'); 
        return;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="container">
  <div class="header">
  	<h2>Register</h2>
  </div>
  <form method="post" action="register.php">
    <?php
		if ( isset($_SESSION['error']) ) {
			echo ("<div class='error'>");
			echo $_SESSION['error']."\n";
			unset($_SESSION['error']);
			echo ("</div>");
		}
	?>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
      <div class="input-group">
  	  <label>Pin</label>
  	  <input type="password" name="pin">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already have an account <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
