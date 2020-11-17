<?php 
require_once "./req/pdo.php";
require_once "./req/randomstr.php";
session_start();
$salt = 'XyZzy12*_';
//print_r($s);
if (!isset($_SESSION['fname']) && !isset($_SESSION['user_id'])) {
	header('location: login.php');
	return;
}
if (isset($_POST['login_user'])) {
	$pin = htmlentities($_POST['pin']);
	//echo ($username."   ".$pin);
	if (strlen($pin) < 1) {
		$_SESSION['error']="Pin is Required to login";
		header('location: pin.php');
		return;
	}else {
		//print_r($_POST);
        $check = hash('md5', $salt.$pin);
        echo(hash('md5', $salt.$pin));
		$stmt = $pdo->prepare('SELECT usr_id, usr_fname, pin FROM user WHERE usr_id = :uid AND usr_fname = :ufnm AND pin = :pin');
		$stmt->execute(array( ':uid' => $_SESSION['user_id'], ':ufnm' => $_SESSION['fname'], ':pin' => $check));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if ( $row !== false ) {
			Print_r($row);
			$_SESSION['fname'] = $row['usr_fname'];
			$_SESSION['user_id'] = $row['usr_id'];
			$a = random_str(32);
			$_SESSION['sessionid']=$a;
			$stmt = $pdo->prepare('SELECT usr_id FROM `sess_manager` WHERE usr_id = :uid');
			$stmt->execute(array( ':uid' => $_SESSION['user_id'],));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if ( $row !== false ) {
				$stmt = $pdo->prepare('UPDATE `sess_manager` SET `session_id`=:sessid ,`timestramp`=current_timestamp() WHERE `usr_id`=:uid ');
				$stmt->execute(array( ':uid' => $_SESSION['user_id'], ':sessid' => $a));
			} else {
				$stmt = $pdo->prepare('INSERT INTO `sess_manager` (`usr_id`, `session_id`, `timestramp`) VALUES (:uid, :sessid, current_timestamp())');
				$stmt->execute(array( ':uid' => $_SESSION['user_id'], ':sessid' => $a));
			}
			unset($_SESSION['fname']);
			unset($_SESSION['user_id']);
			//print_r($_SESSION);
			header("Location: password.php");
			return;
			
		} else {
			$_SESSION["error"] = "Wrong Pin Try Again ".$check;
			//error_log("Login fail ".$username." $check");
			print_r($_SESSION);
			header( 'Location: pin.php' ) ;
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

  <form method="post" action="pin.php">
  	<?php
		if ( isset($_SESSION['error']) ) {
			echo ("<div class='error'>");
			echo $_SESSION['error']."\n";
			unset($_SESSION['error']);
			echo ("</div>");
		}
	?>
  	<div class="input-group">
  		<label>Pin</label>
  		<input type="text" name="pin" >
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>

  </form>
</body>
</html>
