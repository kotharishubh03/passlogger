<?php
require_once "./req/pdo.php";
require_once "./req/nav.php";
?>

<!DOCTYPE html>
<html>
    <title>Bank Accounts </title>
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
        <?php nav(4); ?>
        <!-- Top menu on small screens -->
        <?php headerfunc(); ?>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px;width: inherit;">
            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>
            <!-- Top header -->
                <?php tophead("Bank Accounts"); ?>
            <!-- items grid -->
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
            document.getElementById("myBtn").click();
            
            
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