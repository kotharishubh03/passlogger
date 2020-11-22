<?php
	require_once "./req/pdo.php";
	require_once "./req/nav.php";
	session_start();
	if (isset($_SESSION['sessionid'])) {
	    $stmt = $pdo->prepare('SELECT usr_id FROM `sess_manager` WHERE `session_id` = :sessid');
	    $stmt->execute(array( ':sessid' => $_SESSION['sessionid'],));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	    if ( $row !== false ) {
			print_r($_SESSION);
			$stmt = $pdo->prepare('SELECT `usr_email`, `usr_fname`, `usr_lname` FROM `user` WHERE usr_id= :uid');
	    	$stmt->execute(array( ':uid' => $row["usr_id"],));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

		}
		if (isset($_POST["save"])){
			$stmt = $pdo->prepare('UPDATE `user` SET `usr_fname`=:fn ,`usr_lname`=:ln  WHERE usr_id=(SELECT usr_id FROM `sess_manager` WHERE `session_id` = :sessid)');
			$stmt->execute(array( ':sessid' => $_SESSION['sessionid'], ':fn' => $_POST['first_name'], ':ln' => $_POST['last_name']));
			header("Location: useraccount.php");
			return;
		}
	} else {
	    echo("ACCESS DENIED ");
	    return;
	}
	?>

<!DOCTYPE html>
<html>
	<title>User Accounts </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"-->
	<link rel="stylesheet" type="text/css" href="sitestyle.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"-->
	<style>
		.w3-sidebar a {font-family: "Roboto", sans-serif}
		body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
	</style>
	<body class="w3-content" style="max-width:1200px">
		<!-- Sidebar/menu -->
		<?php nav(); ?>
		<!-- Top menu on small screens -->
		<?php headerfunc(); ?>
		<!-- Overlay effect when opening sidebar on small screens -->
		<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
		<!-- !PAGE CONTENT! -->
		<div class="w3-main" style="margin-left:250px;width: inherit;">
		<!-- Push down content on small screens -->
		<div class="w3-hide-large" style="margin-top:83px"></div>
		<!-- Top header -->
		<?php tophead("User Accounts"); ?>
		<!-- items grid -->
		<div class="w3-row">
            <div class="w3-container" id="ww">
				<div class="w3-col l4 w3-padding ">
                    <div class="w3-card-4 w3-round-xlarge">
                        <div class="w3-container w3-center w3-hover-shadow">
                            <img class="w3-round-xlarge" src="https://img.icons8.com/bubbles/2x/user-male.png" alt="Avatar" style="width:80%">
							<div class="w3-container w3-center">
  							</div>
						</div>
                    </div>
				</div>
				<div class="w3-col l8 w3-padding ">
                    <div class="w3-card-4 w3-round-xlarge">
                        <div class="w3-container w3-center w3-hover-shadow">
							<form method="post">
								<div class="w3-container w3-center w3-margin">
									<label class="w3-col l4 w3-margin-left" >First Name<span class="w3-text-red w3-xlarge">*</span></label>
									<input class="w3-col l7 w3-input w3-border" type="text" id="first_name" name="first_name" value="<?php echo($row["usr_fname"]);?>">
								</div>
								<div class="w3-container w3-center w3-margin">
									<label class="w3-col l4 w3-margin-left" >Last Name<span class="w3-text-red w3-xlarge">*</span></label>
									<input class="w3-col l7 w3-input w3-border" type="text" id="last_name" name="last_name" value="<?php echo($row["usr_lname"]);?>">
								</div>
								<div class="w3-container w3-center w3-margin">
									<label class="w3-col l4 w3-margin-left" >Email<span class="w3-text-red w3-xlarge">*</span></label>
									<input class="w3-col l7 w3-input w3-border" type="text" id="email" name="email" readonly value="<?php echo($row["usr_email"]);?>">
								</div>
									<div class="w3-container w3-center w3-margin">
									<button class="w3-button w3-red w3-margin"name="save" value=1>Save</button>
							  	</div>  
							</form>
						</div>
                    </div>
                </div>
			</div>
		</div>
		<!--end of content-->
		</div>

		<script>
			// Accordion 
			function myAccFunc() {
			  var x = document.getElementById("demoAcc");
			  if (x.className.indexOf("w3-show") == -1) {
			    x.className += " w3-show";
			  } else {
			    x.className = x.className.replace(" w3-show", "");
			  }
			}
			
			// Click on the "Jeans" link on page load to open the accordion for demo purposes
			//document.getElementById("myBtn").click();
			
			
			// Open and close sidebar
			function w3_open() {
			  document.getElementById("mySidebar").style.display = "block";
			  document.getElementById("myOverlay").style.display = "block";
			}
			 
			function w3_close() {
			  document.getElementById("mySidebar").style.display = "none";
			  document.getElementById("myOverlay").style.display = "none";
			}
		</script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<!--script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script-->
	</body>
</html>