<?php
    require_once "./req/pdo.php";
    require_once "./req/nav.php";
    session_start();
    if (isset($_SESSION['sessionid'])) {
        $stmt = $pdo->prepare('SELECT usr_id FROM `sess_manager` WHERE `session_id` = :sessid');
        $stmt->execute(array( ':sessid' => $_SESSION['sessionid'],));
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $rows !== false ) {
            print_r($_SESSION);
        }
        if(isset($_POST["delete"])) {
            if ($_POST["delete"]==1) {
                $stmt = $pdo->prepare('DELETE FROM `password` WHERE `pass_id` = :passid');
                $stmt->execute(array( ':passid' => $_POST["pass_id"],));
                header("Location: password.php");
                return;
            }
        }
        if(isset($_GET["add"])) {
            if ($_GET["add"]==1) {
                $stmt = $pdo->prepare('SELECT usr_id FROM `sess_manager` WHERE `session_id` = :sessid');
                $stmt->execute(array( ':sessid' => $_SESSION['sessionid'],));
                $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                $uid=$rows['usr_id'];
                $stmt = $pdo->prepare('INSERT INTO `password` (`usr_id`, `pass_website`, `username`, `password`, `pin`, `discription`) VALUES (:usrid,:web,:usrname,:pass,:pin,:disc)');
                $stmt->execute(array( ':usrid'=>$uid,':web'=>$_GET['website'],':usrname'=>$_GET['usr_name'],
                ':pass'=>$_GET['password'],':pin'=>$_GET['pin'],':disc'=>$_GET['discription'] ));
                $_SESSION['hello']=$_SESSION['hello']."here";
                header("Location: password.php");
                return;
            }
        }
    } else {
        echo("ACCESS DENIED ");
        return;
    }
    $stmt = $pdo->prepare('SELECT * FROM `password`');
		$stmt->execute();
		$row = $stmt->fetchall();
		if ( $row !== false ) {
			//print_r($row);
			//header("Location: pin.php");
			//return;
		} else {
			$_SESSION["error"] = "Incorrect password Login fail for ".$usr_email;
			
			//error_log("Login fail ".$usr_email." $check");
			header( 'Location: login.php' ) ;
			return;
        }
?>

<!DOCTYPE html>
<html>
    <title>Passwords </title>
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
        <?php nav(0); ?>
        <!-- Top menu on small screens -->
        <?php headerfunc(); ?>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px;width: inherit;">
        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>
        <!-- Top header -->
        <?php tophead("Password"); ?>
        <!-- items grid -->
        <div class="w3-row">
            <div class="w3-container" id="ww">
                <div class="w3-col m4 s6 w3-padding ">
                    <div class="w3-card-4 w3-dark-grey w3-round-xlarge">
                        <div class="w3-container w3-center w3-hover-shadow">
                            <h5>Add New </h5>
                            <img class="w3-round-xlarge" src="./images/add.jpg" alt="Avatar" style="width:60%">
                            <button onclick="document.getElementById('addpassform').style.display='block'" class="w3-button w3-green w3-margin">Add</button>
                        </div>
                    </div>
                </div>
                <?php
                    $blk="'block'";
                    $nan="'None'";
                    foreach ($row as $r) {
                        echo('<div class="w3-col m4 s6 w3-padding ">
                            <div class="w3-card-4 w3-dark-grey w3-round-xlarge">
                                <div class="w3-container w3-center w3-hover-shadow">
                                    <h5>'.$r["pass_website"].'</h5>
                                    <h6>'.$r["username"].'</h6>
                                    <img class="w3-round-xlarge" src="data:image/png;base64,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" alt="Avatar" style="width:80%">
                                    <button onclick="document.getElementById(\''.$r["pass_id"].'\').style.display=\'block\'" class="w3-button w3-green w3-margin">View</button>
                                    <form method="post">
                                    <button class="w3-button w3-red w3-margin" name="delete" value=1>Delete</button>
                                    <input type="text" name="pass_id" value="'.$r["pass_id"].'" style="display:none;">
                                    </form>
                                </div>
                            </div>
                        </div>');
                    echo('<div id="'.$r["pass_id"].'" class="w3-modal">
                        <div class="w3-modal-content w3-animate-zoom w3-card-4">
                            <header class="w3-container w3-black"> 
                                <span onclick="document.getElementById(\''.$r["pass_id"].'\').style.display=\'None\'" 
                                    class="w3-button w3-display-topright">&times;</span>
                                <h2>'.$r["pass_website"].'  '.$r["username"].'</h2>
                            </header>
                            <div class="w3-container">
                                <h7 class="w3-tag"><span class="w3-text-red w3-xlarge">*</span> Are required Field</h7>
                                <form class="w3-container w3-margin">
                                    <div class="w3-row w3-margin"> 
                                        <label class="w3-col l2 w3-margin-left">User Name<span class="w3-text-red w3-xlarge">*</span></label>
                                        <input class="w3-col l4 w3-input w3-border" type="text" value="'.$r["username"].'" readonly>
                                        <label class="w3-col l2 w3-margin-left">Password<span class="w3-text-red w3-xlarge">*</span></label>
                                        <input class="w3-col l3 w3-input w3-border" type="text" value="'.$r["password"].'" readonly>
                                    </div>
                                    <div class="w3-row w3-margin">
                                        <label class="w3-col l2 w3-margin-left">Website<span class="w3-text-red w3-xlarge">*</span></label>
                                        <input class="w3-col l6 w3-input w3-border" type="text" value="'.$r["pass_website"].'" readonly>
                                        <label class="w3-col l1 w3-margin-left">Pin</label>
                                        <input class="w3-col l2 w3-input w3-border" type="text" value="'.$r["pin"].'" readonly>
                                    </div >   
                                    <div class="w3-row w3-margin"> 
                                        <label class="w3-col l2 w3-margin-left">Discription</label>
                                        <textarea class="w3-col l9 w3-input w3-border" readonly>'.$r["discription"].'</textarea>
                                    </div >
                                </form>
                            </div>
                            <footer class="w3-container w3-grey">
                                <button class="w3-button w3-red w3-margin" onclick="document.getElementById(\''.$r["pass_id"].'\').style.display=\'None\'">Close</button>
                                <button class="w3-button w3-red w3-margin" onclick="document.getElementById(\''.$r["pass_id"].'\').style.display=\'None\'">Autologin</button>
                            </footer>
                        </div>
                    </div>');
                    }
                ?>
            </div>
        </div>
            <div id="addpassform" class="w3-modal">
                <div class="w3-modal-content w3-animate-zoom w3-card-4">
                    <header class="w3-container w3-black"> 
                        <span onclick="document.getElementById('addpassform').style.display='none'" 
                            class="w3-button w3-display-topright">&times;</span>
                        <h2>Add Password</h2>
                    </header>
                    <div class="w3-container">
                        <h7 class="w3-tag"><span class="w3-text-red w3-xlarge">*</span> Are required Field</h7>
                        <form class="w3-container w3-margin" method="get">
                            <div class="w3-row w3-margin"> 
                                <label class="w3-col l2 w3-margin-left" >User Name<span class="w3-text-red w3-xlarge">*</span></label>
                                <input class="w3-col l4 w3-input w3-border" type="text" id="usr_name" name="usr_name">
                                <label class="w3-col l2 w3-margin-left">Password<span class="w3-text-red w3-xlarge">*</span></label>
                                <input class="w3-col l3 w3-input w3-border" type="text" id="password" name="password">
                            </div>
                            <div class="w3-row w3-margin">
                                <label class="w3-col l2 w3-margin-left">Website<span class="w3-text-red w3-xlarge">*</span></label>
                                <input class="w3-col l6 w3-input w3-border" type="text" id="website" name="website">
                                <label class="w3-col l1 w3-margin-left">Pin</label>
                                <input class="w3-col l2 w3-input w3-border" type="text" id="pin" name="pin">
                            </div >   
                            <div class="w3-row w3-margin"> 
                                <label class="w3-col l2 w3-margin-left">Discription</label>
                                <textarea class="w3-col l9 w3-input w3-border" id="discription" name="discription"></textarea>
                            </div >
                            <button class="w3-button w3-red w3-margin" id="asqb">Add Sequrity Question</button>
                            <div class="w3-row w3-margin" id="sq">
                            
                            </div>
                        
                    </div>
                    <footer class="w3-container w3-grey">
                        <button class="w3-button w3-red w3-margin" onclick="document.getElementById('addpassform').style.display='none'">Close</button>
                        <button class="w3-button w3-red w3-margin" type="submit" name="add" value="1">Add</button>
                    </footer>
                    </form>
                </div>
            </div>
        <div style="font-size: 90px;">
            <button onclick="document.getElementById('addpassform').style.display='block'" class="w3-button w3-margin"><a style="position: fixed;bottom: 10px;right:10px;"><i class="fa fa-plus-circle fa-10x" aria-hidden="true"></i></a></button>
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
        <!--script src="https://code.jquery.com/jquery-3.5.1.js"integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script-->
        <script>
            $(document).ready(function () {
            window.console && console.log('Document ready called');
            var countsq=0;
                $('#asqb').click(function (event) {
                    // http://api.jquery.com/event.preventdefault/
                    event.preventDefault();
                    if (countsq >= 3) {
                        alert("Maximum of Three Security Question entries exceeded");
                        return;
                    }
                    countsq++;
                    window.console && console.log("Adding position " + countsq);
                    $('#sq').append(
                        '<label class="w3-col l2 w3-margin-left">Question</label>' +
                        '<input class="w3-col l5 w3-input w3-border" type="text" id="sq'+countsq+'" name="sq'+countsq+'">' +
                        '<label class="w3-col l1 w3-margin-left">Answer</label>' +
                        '<input class="w3-col l3 w3-input w3-border" type="text" id="sqa'+countsq+'" name="sqa'+countsq+'">'
                    );
                });
            });
        </script>
    </body>
</html>