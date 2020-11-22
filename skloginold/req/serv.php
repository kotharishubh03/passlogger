<?php
require_once "pdo.php";
$stmt = $pdo->prepare('SELECT * FROM `password`');
		$stmt->execute();
		$row = $stmt->fetchall();
		if ( $row !== false ) {
			echo json_encode($row);
			//header("Location: pin.php");
			//return;
			
		} else {
			$_SESSION["error"] = "Incorrect password Login fail for ".$usr_email;
			
			//error_log("Login fail ".$usr_email." $check");
			header( 'Location: login.php' ) ;
			return;
		}
?>