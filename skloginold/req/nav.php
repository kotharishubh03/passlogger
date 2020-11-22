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
    if ($st==2){echo('<a href="./Addresses.php" class="w3-bar-item w3-button w3-black"><i class="fa fa-address-book w3-margin-right"></i>Addresses</a>');} 
        else {echo('<a href="./Addresses.php" class="w3-bar-item w3-button"><i class="fa fa-address-book w3-margin-right"></i>Addresses</a>');}
    if ($st==3 or $st==4 or $st==5){
        echo('<a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-left-align w3-black" id="myBtn">
                <i class="fa fa-bank w3-margin-right"></i>Banking <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">');    
        if ($st==3){echo('<a href="./payment_cards.php" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-credit-card w3-margin-right"></i>Payment Cards</a>');} 
            else {echo('<a href="./payment_cards.php" class="w3-bar-item w3-button"><i class="fa fa-credit-card w3-margin-right"></i>Payment Cards</a>');}
        if ($st==4){echo('<a href="./bank_accounts.php" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-bank w3-margin-right"></i>Bank Accounts</a>');} 
            else {echo('<a href="./bank_accounts.php" class="w3-bar-item w3-button"><i class="fa fa-bank w3-margin-right"></i>Bank Accounts</a>');}
        if ($st==5){echo('<a href="./fd_accounts.php" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-file-text-o w3-margin-right"></i>FD Accounts</a>');} 
            else {echo('<a href="./fd_accounts.php" class="w3-bar-item w3-button"><i class="fa fa-file-text-o w3-margin-right"></i>FD Accounts</a>');}
    } else {
        echo('<a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-left-align" id="myBtn">
                <i class="fa fa-bank w3-margin-right"></i>Banking <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
            <a href="./payment_cards.php" class="w3-bar-item w3-button"><i class="fa fa-credit-card w3-margin-right"></i>Payment Cards</a>
            <a href="./bank_accounts.php" class="w3-bar-item w3-button"><i class="fa fa-bank w3-margin-right"></i>Bank Accounts</a>
            <a href="./fd_accounts.php" class="w3-bar-item w3-button"><i class="fa fa-file-text-o w3-margin-right"></i>FD Accounts</a>');
    }
    echo('</div>');
    if ($st==6){echo('<a href="./Goverment_ids.php" class="w3-bar-item w3-button w3-black"><i class="fa fa-id-card w3-margin-right"></i>Goverment Ids</a>');} 
        else {echo('<a href="./Goverment_ids.php" class="w3-bar-item w3-button"><i class="fa fa-id-card w3-margin-right"></i>Goverment Ids</a>');}
    if ($st==7){echo('<a href="./Wifi_passwords.php" class="w3-bar-item w3-button w3-black"><i class="fa fa-wifi w3-margin-right"></i>Wifi Passwords</a>');} 
        else {echo('<a href="./Wifi_passwords.php" class="w3-bar-item w3-button"><i class="fa fa-wifi w3-margin-right"></i>Wifi Passwords</a>');}
    echo('<a href="./logout.php" class="w3-bar-item w3-button w3-black">Logout</a>
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