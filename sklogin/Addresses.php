<?php
require_once "./req/pdo.php";
require_once "./req/nav.php";
$stmt = $pdo->prepare('SELECT * FROM `password`');
		$stmt->execute();
		$row = $stmt->fetchall();
		if ( $row !== false ) {
			print_r($row);
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
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"-->
    <style>
        .w3-sidebar a {font-family: "Roboto", sans-serif}
        body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
    </style>
        <body class="w3-content" style="max-width:1200px">
        <!-- Sidebar/menu -->
        <?php nav(2); ?>
        <!-- Top menu on small screens -->
        <?php headerfunc(); ?>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px;width: inherit;">
            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>
            <!-- Top header -->
                <?php tophead("Addresses"); ?>
            <!-- items grid -->
            <div class="w3-row">
                <div class="w3-container">
                    <div class="w3-col m4 s6 w3-padding ">
                        <div class="w3-card-4 w3-dark-grey w3-round-xlarge">
                            <div class="w3-container w3-center w3-hover-shadow">
                                <!--h3>Friend request</h3-->
                                <h5>Kite Zerodha</h5>
                                <h6>kothari.d.75@gmail.com</h6>
                                <img class="w3-round-xlarge" src="data:image/png;base64,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" alt="Avatar" style="width:80%">
                                <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-margin">View</button>
                                <button class="w3-button w3-red w3-margin">Delete</button>
                            </div>
                        </div>
                    </div>
                    <div id="id01" class="w3-modal">
                        <div class="w3-modal-content w3-animate-zoom w3-card-4">
                            <header class="w3-container w3-black"> 
                                <span onclick="document.getElementById('id01').style.display='none'" 
                                    class="w3-button w3-display-topright">&times;</span>
                                <h2>Kite Zerodha (kothari.d.75@gmail.com)</h2>
                            </header>
                            <div class="w3-container">
                            <h7 class="w3-tag"><span class="w3-text-red w3-xlarge">*</span> Are required Field</h7>
                            <form class="w3-container w3-margin">
                            <div class="w3-row w3-margin"> 
                                <label class="w3-col l2 w3-margin-left">User Name<span class="w3-text-red w3-xlarge">*</span></label>
                                <input class="w3-col l4 w3-input w3-border" type="text" readonly>
                                <label class="w3-col l2 w3-margin-left">Password<span class="w3-text-red w3-xlarge">*</span></label>
                                <input class="w3-col l3 w3-input w3-border" type="text" readonly>
                            </div>
                            <div class="w3-row w3-margin">
                                <label class="w3-col l2 w3-margin-left">Website<span class="w3-text-red w3-xlarge">*</span></label>
                                <input class="w3-col l6 w3-input w3-border" type="text" readonly>
                                <label class="w3-col l1 w3-margin-left">Pin</label>
                                <input class="w3-col l2 w3-input w3-border" type="text" readonly>
                            </div>
                            </form>
                            </div>
                            <footer class="w3-container w3-grey">
                                <button class="w3-button w3-red w3-margin" onclick="document.getElementById('id01').style.display='none'">Close</button>
                                <button class="w3-button w3-red w3-margin" onclick="document.getElementById('id01').style.display='none'">Edit</button>
                                <button class="w3-button w3-red w3-margin" onclick="document.getElementById('id01').style.display='none'">Autologin</button>
                            </footer>
                        </div>
                    </div>
                    <div class="w3-col m4 s6 w3-padding ">
                        <div class="w3-card-4 w3-dark-grey w3-round-xlarge">
                            <div class="w3-container w3-center w3-hover-shadow">
                                <h5>Kite Zerodha</h5>
                                <img class="w3-round-xlarge" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAk1BMVEX2Rhr////bNCzbMir3WTTeSUL1MgD2OgD2PQD/+vjfQTX//Pv3Wzj2TCP2Pwj3SyDZGgv3YUH4dFr2VC78xLrYEwDxubf4fGT6oZD4clf3aEr3ZEX8v7T/9vTkRzbwsrDsoZ7rmpf7sKP7uKz8ysH6p5f4bVH0xsXuqqj5inX5moj6oJD6q5z0oJbYJBz0yMfqk4/+jRxGAAAFC0lEQVR4nO3diVrbMAwH8KYwRulGObbBDo5dbAx2vP/TLeEr0MaJL0mx/rb9BPXvi2UltaVZIzduT3cBx+x+Jkdy9nIGOPZ+NXImsCRyJqAkd42cCTCJlAkyiZAJKMl5I2cCSnLXyJmAkpw//n4BE3QSARN4En6TE0ySu40pcJuAkpxvzoHZ5H0GJMwmoCTft2fBagK6cHokrCaZkHCa5ELCaJINCZ9JPiRsJhmRcJnkRMJkkkdewmpykxUJi0lmJBwmH/ZTTy9m7N2PTohucpMbCd0EdOFYSMgmoDvOF9uciCY5khBNsiShmeRJQjIBDa8uEooJKIltx6GagOYlzqeEYJJd9ko3+ZgvSawJKInHwok2AV04fiRxJnmTxJgsMyeJMMmeJNwkf5JgkwJIQk1KIAk0WWadl8SZFEESZnJcBEmQyfFh6unFjGCSEBNQkq+hJP4my2JIvE1Qd5wIEl+TRUEkniZFkfiZlEXiZbIAzUsiSXxMSiPxMCloE/Y1Wb4qjcRpUiCJy6REEocJKsknCondZAEaXmkkVpNCSWwmpZJYTIolGTcpl2TUpGCSMZNFkZuw1aTMvMRqUvRTMmxSOMmQSekkAyaLXUySN1wkpgnqU8JHYphcVJK+SSUxTCqJYXJRfHg1TCqJYbI4rSQ9k4tK0jepC8cwqSSGCerC+SZAsjapJIZJJTFMKolhUkkMk0pimICS7MuRNDPMmgOHv+VIQJ+T1eWfH4ImiPFkdTnfOZJDQdx3WpL5fOetGApgfvJA0qH8FTTBQlmTCKLgve88ksgtH7T34tUziRgK2PeTLRIpFKzvbD2SucyWDPU91iCRQUH6bj9A0qG8EzTRvnwGSSRQcP4HHCERQIH5v3iUhH/3QTlXYCFhRwE5f2Il4UYBOadkJ2FGwTjP5iLpUPgCLcS5RzcJKwrA+VhHLOFH0X+O2pOEMU9Rf97em4QPRfu9jAASNhTl93eCSLhQdN/zCiRhCrSq7wMGk/CgaL43GkHCgqL4fnEUCQeK3nvokSQMKPZ6BQm35GgSOorWuhYEkg7lStAkFQqJhIqis04OkaRL3ggoKuspkUloKBrrbjGQkFAU1mdjIaGg6Kvjx0RCCLTq6j2ykcSjaKsLykgSjaKsfuzqgJEkFkVXnWFmkkgUVfWo2UniUDTVLRcg6VB+SpoI17cXIenylFAUPX0QhEgiUNT0yxAjCUfR0ldFkCQYRUn/HVGS0N1HR58mYZJ2hKCo6OclTxL0pGjo+zYBSRCKgv6Ak5CEoKTvIzkRSUBGm7zf6GQk/iip+9JOSOKNkrh/8espSdrhlbyl7XM9NYlfRpu0H/rkJH4oBBMySgKSdrhjCsWkodU6SEPigUIyIaGkInEHWpoJASUdiTOmEE2iURKSOFGoJpGBNimJC4VsEpWnJCZpx9G1pElERpuexIrCYBK8fDSQ2FA4TAJRdJBYUFhMgnYfLSTjKDwmzYk3ih6SURQmE28UTSRjKFwmnii6SEZQ2Ey8ULSRDKPwmXig6CMZRGE0caJoJBlC4TRxoOgkGUBhNbHmKVpJWpTPkiYWFL0kBgqzyejy0UzSR+E2GUHRTdJDYTdpzgZQtJNso/CbDKDoJ9lCETAxUBBINlEkTHooGCQbKCImWygoJM8oMiYbKDgkTyhCJk8oSCSPKFIm6zwFi2SNImbygIJG0qL8kzRpUVYHO3CjRRE0aW5fII759X+kqs4nWzLougAAAABJRU5ErkJggg==" alt="Avatar" style="width:80%">
                                <button class="w3-button w3-green w3-margin">Accept</button>
                                <button class="w3-button w3-red w3-margin">Decline</button>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col m4 s6 w3-padding ">
                        <div class="w3-card-4 w3-dark-grey w3-round-xlarge">
                            <div class="w3-container w3-center w3-hover-shadow">
                                <h5>Kite Zerodha</h5>
                                <img class="w3-round-xlarge" src="data:image/png;base64,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" alt="Avatar" style="width:80%">                                
                                <button class="w3-button w3-green w3-margin">Accept</button>
                                <button class="w3-button w3-red w3-margin">Decline</button>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col m4 s6 w3-padding ">
                        <div class="w3-card-4 w3-dark-grey w3-round-xlarge">
                            <div class="w3-container w3-center w3-hover-shadow">
                                <h5>Kite Zerodha</h5>
                                <img class="w3-round-xlarge" src="data:image/png;base64,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" alt="Avatar" style="width:80%">                                
                                <button class="w3-button w3-green w3-margin">Accept</button>
                                <button class="w3-button w3-red w3-margin">Decline</button>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col m4 s6 w3-padding ">
                        <div class="w3-card-4 w3-dark-grey w3-round-xlarge">
                            <div class="w3-container w3-center w3-hover-shadow">
                                <h5>Kite Zerodha</h5>
                                <img class="w3-round-xlarge" src="data:image/png;base64,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" alt="Avatar" style="width:80%">                                
                                <button class="w3-button w3-green w3-margin">Accept</button>
                                <button class="w3-button w3-red w3-margin">Decline</button>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col m4 s6 w3-padding ">
                        <div class="w3-card-4 w3-dark-grey w3-round-xlarge">
                            <div class="w3-container w3-center w3-hover-shadow">
                                <h5>Kite Zerodha</h5>
                                <img class="w3-round-xlarge" src="data:image/png;base64,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" alt="Avatar" style="width:80%">
                                
                                <button class="w3-button w3-green w3-margin">Accept</button>
                                <button class="w3-button w3-red w3-margin">Decline</button>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col m4 s6 w3-padding ">
                        <div class="w3-card-4 w3-dark-grey w3-round-xlarge">
                            <div class="w3-container w3-center w3-hover-shadow">
                                <h5>Kite Zerodha</h5>
                                <img class="w3-round-xlarge" src="data:image/png;base64,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" alt="Avatar" style="width:80%">
                                
                                <button class="w3-button w3-green w3-margin">Accept</button>
                                <button class="w3-button w3-red w3-margin">Decline</button>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col m4 s6 w3-padding ">
                        <div class="w3-card-4 w3-dark-grey w3-round-xlarge">
                            <div class="w3-container w3-center w3-hover-shadow">
                                <h5>Kite Zerodha</h5>
                                <img class="w3-round-xlarge" src="data:image/png;base64,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" alt="Avatar" style="width:80%">
                                
                                <button class="w3-button w3-green w3-margin">Accept</button>
                                <button class="w3-button w3-red w3-margin">Decline</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="addpassform" class="w3-modal">
                <div class="w3-modal-content w3-animate-zoom w3-card-4">
                    <header class="w3-container w3-teal"> 
                        <span onclick="document.getElementById('addpassform').style.display='none'" 
                            class="w3-button w3-display-topright">&times;</span>
                        <h2>Modal Header</h2>
                    </header>
                    <div class="w3-container">
                        <p>Some text..</p>
                        <p>Some text..</p>
                    </div>
                    <footer class="w3-container w3-teal">
                        <p>Modal Footer</p>
                    </footer>
                </div>
            </div>
            <div style="font-size: 90px;">
                <button onclick="document.getElementById('addpassform').style.display='block'" class="w3-button w3-margin"><a style="position: fixed;bottom: 10px;right:10px;"><i class="fa fa-plus-circle fa-10x" aria-hidden="true"></i></a></button>
            </div>
            <!-- End page content -->
        </div>
        <!-- Newsletter Modal -->
        <div id="newsletter" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
                <div class="w3-container w3-white w3-center">
                    <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
                    <h2 class="w3-wide">NEWSLETTER</h2>
                    <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
                    <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
                </div>
            </div>
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