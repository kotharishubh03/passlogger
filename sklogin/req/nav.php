<?php
function nav ($st=0){
echo('<nav class="w3-sidebar w3-bar-block w3-black w3-collapse w3-top" style="z-index:3;width:250px;left:0" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
        <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <h3 class="w3-wide"><b>PassLogger</b></h3>
    </div>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">');
    if ($st==0){echo('<a href="./password.php" class="w3-bar-item w3-button w3-black"><i class="fa fa-key w3-margin-right"></i>Passwords</a>');} 
        else {echo('<a href="./password.php" class="w3-bar-item w3-button"><i class="fa fa-key w3-margin-right"></i>Passwords</a>');}
    if ($st==1){echo('<a href="./Notes.php" class="w3-bar-item w3-button w3-black"><i class="fa fa-sticky-note-o w3-margin-right"></i>Notes</a>');} 
        else {echo('<a href="./Notes.php" class="w3-bar-item w3-button"><i class="fa fa-sticky-note-o w3-margin-right"></i>Notes</a>');}
    /*if ($st==2){echo('<a href="./Addresses.php" class="w3-bar-item w3-button w3-black"><i class="fa fa-address-book w3-margin-right"></i>Addresses</a>');} 
        else {echo('<a href="./Addresses.php" class="w3-bar-item w3-button"><i class="fa fa-address-book w3-margin-right"></i>Addresses</a>');}*/
    if ($st==6){echo('<a href="./Goverment_ids.php" class="w3-bar-item w3-button w3-black"><i class="fa fa-id-card w3-margin-right"></i>Goverment Ids</a>');} 
        else {echo('<a href="./Goverment_ids.php" class="w3-bar-item w3-button"><i class="fa fa-id-card w3-margin-right"></i>Goverment Ids</a>');}
    echo('<a href="./logout.php" class="w3-bar-item w3-button w3-black"></i>Logout</a>
    </div>
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Security Checkup</a>
    <a href="#footer"  class="w3-bar-item w3-button w3-padding">Contact Us</a>
</nav>');
}
function headerfunc(){
    echo('<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <div class="w3-bar-item w3-padding-24 w3-wide">Passloger</div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>');
}

function tophead($st){
echo('<header class="w3-container w3-xlarge w3-black">
<p class="w3-left" style="border: none;display: inline-block;
padding: 8px 16px;vertical-align: middle;
text-decoration: none;color: inherit;background-color: inherit;
text-align: center;">'.$st.'</p>
<p class="w3-right">
    <a href="./useraccount.php"  class="w3-bar-item w3-button w3-padding">
        <span>USER ACCOUNT &nbsp;<i class="fa fa-user w3-margin-right"></i></span>
    </a>
</p>
</header>');
}
?>