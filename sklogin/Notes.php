<?php
    require_once "./req/pdo.php";
    require_once "./req/nav.php";
    session_start();
    if (isset($_SESSION['sessionid'])) {
        $stmt = $pdo->prepare('SELECT usr_id FROM `sess_manager` WHERE `session_id` = :sessid');
        $stmt->execute(array( ':sessid' => $_SESSION['sessionid'],));
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $rows !== false ) {
           // print_r($_SESSION);
        }
        if(isset($_POST["delete"])) {
            if ($_POST["delete"]==1) {
                $stmt = $pdo->prepare('DELETE FROM `notes` WHERE `notes_id` = :notesid');
                $stmt->execute(array( ':notesid' => $_POST["notes_id"],));
                header("Location: notes.php");
                return;
            }
        }
        if(isset($_GET["add"])) {
            if ($_GET["add"]==1) {
                $stmt = $pdo->prepare('SELECT usr_id FROM `sess_manager` WHERE `session_id` = :sessid');
                $stmt->execute(array( ':sessid' => $_SESSION['sessionid'],));
                $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                $uid=$rows['usr_id'];
                $stmt = $pdo->prepare('INSERT INTO `notes` (`usr_id`, `title`, `note`) VALUES (:usrid,:title,:note)');
                $stmt->execute(array( ':usrid'=>$uid,':title'=>$_GET['title'],':note'=>$_GET['note'] ));
                $_SESSION['hello']=$_SESSION['hello']."here";
                header("Location: notes.php");
                return;
            }
        }
    } else {
        header("Location: access-denied.html");
        return;
    }
    $stmt = $pdo->prepare('SELECT * FROM `notes` where `usr_id` in (SELECT usr_id FROM `sess_manager` WHERE `session_id` = :sessid)');
		$stmt->execute(array( ':sessid' => $_SESSION['sessionid'],));
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
<title>Notes </title>
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
<?php nav(1); ?>
        <!-- Top menu on small screens -->
        <?php headerfunc(); ?>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px;width: inherit;">
            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>
            <!-- Top header -->
                <?php tophead("Notes"); ?>
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
                                    <h2>'.$r["title"].'</h2>
                                    <button onclick="document.getElementById(\''.$r["notes_id"].'\').style.display=\'block\'" class="w3-button w3-green w3-margin">View</button>
                                    <form method="post">
                                    <button class="w3-button w3-red w3-margin" name="delete" value=1>Delete</button>
                                    <input type="text" name="notes_id" value="'.$r["notes_id"].'" style="display:none;">
                                    </form>
                                </div>
                            </div>
                        </div>');
                    echo('<div id="'.$r["notes_id"].'" class="w3-modal">
                        <div class="w3-modal-content w3-animate-zoom w3-card-4">
                            <header class="w3-container w3-black"> 
                                <span onclick="document.getElementById(\''.$r["notes_id"].'\').style.display=\'None\'" 
                                    class="w3-button w3-display-topright">&times;</span>
                                <h2>'.$r["title"].'</h2>
                            </header>
                            <div class="w3-container">
                                <h7 class="w3-tag"><span class="w3-text-red w3-xlarge">*</span> Are required Field</h7>
                                <form class="w3-container w3-margin">
                                    <div class="w3-row w3-margin"> 
                                        <label class="w3-col l2 w3-margin-left">User Name<span class="w3-text-red w3-xlarge">*</span></label>
                                        <input class="w3-col l4 w3-input w3-border" type="text" value="'.$r["title"].'" readonly>
                                    </div> 
                                    <div class="w3-row w3-margin"> 
                                        <label class="w3-col l2 w3-margin-left">Note</label>
                                        <textarea class="w3-col l9 w3-input w3-border" readonly>'.$r["note"].'</textarea>
                                    </div >
                                </form>
                            </div>
                            <footer class="w3-container w3-grey">
                                <button class="w3-button w3-red w3-margin" onclick="document.getElementById(\''.$r["notes_id"].'\').style.display=\'None\'">Close</button>
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
                        <h2>Add Notes</h2>
                    </header>
                    <div class="w3-container">
                        <h7 class="w3-tag"><span class="w3-text-red w3-xlarge">*</span> Are required Field</h7>
                        <form class="w3-container w3-margin" method="get">
                            <div class="w3-row w3-margin"> 
                                <label class="w3-col l2 w3-margin-left" >Title<span class="w3-text-red w3-xlarge">*</span></label>
                                <input class="w3-col l4 w3-input w3-border" type="text" id="title" name="title">
                            </div>   
                            <div class="w3-row w3-margin"> 
                                <label class="w3-col l2 w3-margin-left">Notes</label>
                                <textarea class="w3-col l9 w3-input w3-border" id="note" name="note"></textarea>
                            </div >
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
  <!-- End page content -->
</div>


<script>

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
