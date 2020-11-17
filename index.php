<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<title>Shopping With Us</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="logo.jpg" height="80" width="150" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" placeholder="Search for Products" name="search"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			 
	    <div class="languages" title="language">
	    	<div id="language" class="wrapper-dropdown" tabindex="2"><a href="login.php">Sign in</a>
						
		     </div>
		     <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#language') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown').removeClass('active');
				});

			});

		</script>
		 </div>
			<div class="currency" title="currency">
					<div id="currency" class="wrapper-dropdown" tabindex="1"><a href="login.php">Sign up</a>
						
						
					</div>
					 <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#currency') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown').removeClass('active');
				});

			});

		</script>
   </div>
		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
	<div class="menu">
	  <ul id="dc_mega-menu-orange" class="dc_mm-orange">
		 <li><a href="index.php">Home</a></li>
		
    <li><a href="products.php">Products</a>
    <ul>

      <li><a href="#">Shampoo</a>
        <ul>
		 <?php
session_start();
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='shampoo' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productSubCategory'];
			$prodprice = $row['productPrice'];
$p=$row['productCategory'];
$qty=$row['quantity'];
			
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?productSubCategory='.$prodname.'&&productCategory='.$p.'">'; ?><?php echo $prodname; }
		  } }
		  ?></a></li>
          
        </ul>
      </li>
      <li><a href="products.html">Beauti Cream</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='beauticream' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
                                                $qty=$row['quantity'];
			
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
         
        </ul>
      </li>
      <li><a href="products.html">Face Washes</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='facewashes' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
$qty=$row['quantity'];
			
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
         
        </ul>
      </li>
      <li><a href="#">Deo Spray</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='deo' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
$qty=$row['quantity'];
			
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>

        </ul>
      </li>
      <li><a href="#">Soap</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='soap' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
$qty=$row['quantity'];
			
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
        
        </ul>
      </li>
       <li><a href="#">Washing Powder</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='washingpowder' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$quantity=$row['quantity'];
$qty=$row['quantity'];
			?>
          <li><?php  if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } }?></a></li>
       
        </ul>
      </li>
       <li><a href="#">Tea</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='tea' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
$qty=$row['quantity'];
			
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
          
        </ul>
      </li>
       <li><a href="#">Health Tonic</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='healthtonic' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
          
        </ul>
      </li>
       <li><a href="#">Drinks</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='drinks' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productSubCategory'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
          
        </ul>
      </li>
       <li><a href="#">Cooking Oil</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='cookingoil' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
         
        </ul>
      </li>
       <li><a href="#">Toothpaste</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='toothpaste' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
$qty=$row['quantity'];
			
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else {  echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
         
        </ul>
      </li>
       <li><a href="#">Chocklates</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='chocklates' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
     
        </ul>
      </li>
<li><a href="#">Biscuits</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='biscuits' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
          
        </ul>
      </li>
<li><a href="#">Noodels</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='noodels' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
         
        </ul>
      </li>
<li><a href="#">Rice</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='rice' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
    
        </ul>
      </li>
<li><a href="#">Ketchup</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='ketchup' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
         
        </ul>
      </li>
<li><a href="#">Pulses</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='pulses' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
          
        </ul>
      </li>
<li><a href="#">Masala</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='masala' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
       
        </ul>
      </li>
<li><a href="#">Namkeen</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='namkeen' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productSubCategory'];
			$prodprice = $row['productPrice'];
$po=$row['productCategory'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="l.php?productSubCategory='.$prodname.'&&productCategory='.$po.'">'; ?><?php echo $prodname; } } } ?></a></li>
         
        </ul>
      </li>
<li><a href="#">Toilet Cleaner</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='toiletcleaner' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
         
        </ul>
      </li>
<li><a href="#">Hair Oil</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='hairoil' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
          
        </ul>
      </li>
<li><a href="#">Hair Gel</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='hairgel' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
          
        </ul>
      </li>
<li><a href="#">Shoes Polish</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='shoespolish' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
        
        </ul>
      </li><li><a href="#">Sugar</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='sugar' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
      
        </ul>
      </li><li><a href="#">Shaving</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='shaving' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
         
        </ul>
      </li><li><a href="#">Salt</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='salt' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
          
          
        </ul>
      </li><li><a href="#">Achar</a>
        <ul>
<?php
		 require_once("config.php");
		 $list = "";
	$sql = mysql_query("select * from product where productCategory='achar' ");
	$existCount = mysql_num_rows($sql);
	if($existCount > 0){
		while($row=mysql_fetch_array($sql)){
			$id = $row['id'];
			$prodname = $row['productName'];
			$prodprice = $row['productPrice'];
			$qty=$row['quantity'];
			?>
          <li><?php if($qty<1) { echo"out of stock"; } else { echo'<a href="preview.php?id='.$id.'">'; ?><?php echo $prodname; } } } ?></a></li>
       
        </ul>
      </li>
    </ul>
  </li>

  <li><a href="products.php">Top Brands</a>
    <ul>
     <li><a href="nestle.php">Nestle</a></li>
      <li><a href="haldiram.php">Haldiram</a></li>
      <li><a href="lux.php">Lux</a></li>
      <li><a href="topicana.php">Topicana</a></li>
      <li><a href="brookebond.php">Brooke Bond</a></li>
      <li><a href="kisan.php">Kisan</a></li>
      <li><a href="colgate.php">Colgate</a></li>
      <li><a href="britannia.php">Britannia</a></li>
      <li><a href="cadbury.php">Cadbury</a></li>
      <li><a href="garnier.php">Granier</a></li>
    </ul>
  </li>
  <li><a href="faq.php">Services</a>
    <ul>
      <li><a href="#">Service 1</a>
        <ul>
          <li><a href="#">Service Detail A</a></li>
          <li><a href="#">Service Detail B</a></li>
        </ul>
      </li>
      <li><a href="#">Service 2</a>
        <ul>
          <li><a href="#">Service Detail C</a></li>
        </ul>
      </li>
      <li><a href="#">Service 3</a>
        <ul>
          <li><a href="#">Service Detail D</a></li>
          <li><a href="#">Service Detail E</a></li>
          <li><a href="#">Service Detail F</a></li>
        </ul>
      </li>
      <li><a href="#">Service 4</a></li>
    </ul>
  </li>
  <li><a href="about.php">About</a></li>
   <li><a href="">Delivery</a></li>
  
  <li><a href="contact.php">Contact</a> </li>
  <div class="clear"></div>
</ul>
</div><?php



	

$query=mysql_query("select * from product where productName='Apple Juice'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <?php if($qty<1) { echo"out of stock"; } else { 
echo'<img src="showimage1.php?id='.$row['id'].'" alt="" />';

?>
</a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $prd; ?></h2></br><?php echo $prd1; ?>
						<p>Rs.  <?php echo $prd2;  ?></p>

						<div class="button"><span><?php echo'<a href="preview.php?id='.$id.'">' ?><?php echo'Add to cart</a></span>'; } } ?></div>
				   </div>
			   </div><?php


	

$query=mysql_query("select * from product where productName='Panchratan'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<?php if($qty<1) { echo"out of stock"; } else {  echo'  <img src="showimage1.php?id='.$row['id'].'" alt="" / >';
?></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><?php echo $prd; ?></h2></br><?php echo $prd1; ?>
						  <p>Rs.  <?php echo $prd2;  ?></p>
						  <div class="button"><span><?php echo'<a href="preview.php?id='.$id.'">' ?><?php echo'Add to cart</a></span>'; } } ?></div>
					</div>
				</div>
			</div>
<?php
$query=mysql_query("select * from product where productName='Tomato Ketchup'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <?php if($qty<1) { echo"out of stock"; } else { echo' <img src="showimage1.php?id='.$row['id'].'" alt="" / >';
?></a></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $prd; ?></h2></br><?php echo $prd1; ?>
						  <p>Rs.  <?php echo $prd2;  ?></p>
						<div class="button"><span><?php echo'<a href="preview.php?id='.$id.'">' ?><?php echo'Add to cart</a></span>'; } } ?></div>
				   </div>
			   </div>	<?php



	

$query=mysql_query("select * from product where productName='Good Day'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <?php if($qty<1) { echo"out of stock"; } else { echo' <img src="showimage1.php?id='.$row['id'].'" alt="" / >';
?></a>
					</div>
					<div class="text list_2_of_1">
						<h2><?php echo $prd; ?></h2></br><?php echo $prd1; ?>
						  <p>Rs.  <?php echo $prd2;  ?></p>
						  <div class="button"><span><?php echo'<a href="preview.php?id='.$id.'">' ; echo'Add to cart</a></span>'; } } ?></div>
					</div>
				</div>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		     	<div id="slideshow">
	<ul class="slides">
    	<li><a href="preview.html"><img src="images/bournvita.jpg" alt="Marsa Alam underawter close up" height="342px" /></a></li>
        <li><a href="preview-2.html"><img src="images/8016taj_mahal_tea_100.jpg" alt="Turrimetta Beach - Dawn" height="342px"/></a></li>
        <li><a href="preview-6.html"><img src="images/Britannia Good day Choco chip.jpg" alt="Power Station" height="342px"/></a></li>
        <li><a href="preview-3.html"><img src="images/1369156600_Kissan_Tomato_Sauce_1kg.jpg" alt="Colors of Nature" height="342px"/></a></li>
    </ul>
		    <span class="arrow previous"></span>
		    <span class="arrow next"></span>
		  </div>
	    </div>
	  <div class="clear"></div>
  </div>	
</div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Products</h3>
    		</div>
    		<div class="sort">
    		
    		</div>
    		<div class="show">
    		
    		</div>
    		<div class="page-no">
    			
    		</div>
    		<div class="clear"></div>
    	</div>
<?php

	

$query=mysql_query("select * from product where productName='Apple Juice'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>		
	
	      <div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					<?php if($qty<1) { echo"out of stock"; } else { echo'  <img src="showimage1.php?id='.$row['id'].'" alt="" / >';
?></a>
					 <h2><?php echo $prd; ?></h2>
					 <p><?php echo $prd1; ?></p>
					 <p><span class="strike">528.22</span><span class="price"><?php echo $prd2; ?></span></p>
					  <div class="button"><span><img src="images/cart.jpg" alt="" /><?php echo'<a href="preview.php?id='.$id.'"' ?> <?php echo'class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="preview.php?id='.$id.'" class="details">Details</a></span>'; } } ?></div>
				</div>
<?php


	

$query=mysql_query("select * from product where productName='Panchratan'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>	
				<div class="grid_1_of_4 images_1_of_4">
					<?php if($qty<1) { echo"out of stock"; } else {  echo'  <img src="showimage1.php?id='.$row['id'].'" alt="" / >';
?></a>
					 <h2><?php echo $prd; ?></h2>
					 <p><?php echo $prd1; ?></p>
					 <p><span class="strike">528.22</span><span class="price"><?php echo $prd2;  ?></span></p>
				     <div class="button"><span><img src="images/cart.jpg" alt="" /><?php echo'<a href="preview.php?id='.$id.'"' ?><?php echo' class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="preview.php?id='.$id.'" class="details">Details</a></span>'; } } ?></div>
				</div>
<?php


	

$query=mysql_query("select * from product where productName='Taj Mahal'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>	
				<div class="grid_1_of_4 images_1_of_4">
					<?php if($qty<1) { echo"out of stock"; } else { echo'  <img src="showimage1.php?id='.$row['id'].'" alt="" / >';
?></a>
					 <h2><?php echo $prd; ?></h2>
					 <p><?php echo $prd1; ?></p>
					 <p><span class="strike">528.22</span><span class="price"><?php echo $prd2;  ?></span></p>
				      <div class="button"><span><img src="images/cart.jpg" alt="" /><?php echo'<a href="preview.php?id='.$id.'" class="cart-button">' ?><?php echo'Add to Cart</a></span> </div>
				     <div class="button"><span><a href="preview.php?id='.$id.'" class="details">Details</a></span>'; } } ?></div>
				</div><?php


	

$query=mysql_query("select * from product where productName='Strawberry & Cream'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>
				<div class="grid_1_of_4 images_1_of_4">
					<?php if($qty<1) { echo"out of stock"; } else {  echo'  <img src="showimage1.php?id='.$row['id'].'" alt="" / >';
?></a>
					 <h2><?php echo $prd; ?></h2>
					 <p><?php echo $prd1; ?></p>
					 <p><span class="strike">528.22</span><span class="price"><?php echo $prd2;  ?></span></p>
				      <div class="button"><span><img src="images/cart.jpg" alt="" /><?php echo'<a href="preview.php?id='.$id.'" class="cart-button">Add to Cart'; echo'</a></span> </div>
				     <div class="button"><span><a href="preview.php?id='.$id.'" class="details">Details</a></span>'; } } ?></div>
				</div>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="sort">
    		
    		</div>
    		<div class="show">
    		
    		</div>
    		<div class="page-no">
    			
    		</div>
    		<div class="clear"></div>
    	</div><?php

require_once("config.php");

	

$query=mysql_query("select * from product where productName='Good Day'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					<?php if($qty<1) { echo"out of stock"; } else { echo' <img src="showimage1.php?id='.$row['id'].'" alt="" / >';
?></a>
					 <div class="discount">
					 <span class="percentage">40%</span>
					</div>
					 <h2><?php echo $prd; ?> </h2></br><?php echo $prd1; ?>
					 <p><span class="strike">$438.99</span><span class="price"><?php echo $prd2;   ?></span></p>
				     <div class="button"><span><img src="images/cart.jpg" alt="" /><?php echo'<a href="preview.php?id='.$id.'" class="cart-button">Add to Cart'; echo'</a></span> </div>
				     <div class="button"><span><a href="preview.php?id='.$id.'" class="details">Details</a></span>'; } } ?></div>
				</div>
<?php

require_once("config.php");

	

$query=mysql_query("select * from product where productName='Tomato Ketchup'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>
				<div class="grid_1_of_4 images_1_of_4">
					<?php if($qty<1) { echo"out of stock"; } else { echo'  <img src="showimage1.php?id='.$row['id'].'" alt="" / >';
?></a>
					 <div class="discount">
					 <span class="percentage">40%</span>
					</div>
					 <h2><?php echo $prd; ?> </h2></br><?php echo $prd1; ?>
					 <p><span class="strike">$438.99</span><span class="price"><?php echo $prd2;  ?></span></p>
				      <div class="button"><span><img src="images/cart.jpg" alt="" /><?php echo'<a href="preview.php?id='.$id.'"';  echo'class="cart-button">Add to Cart</a></span></div>
				     <div class="button"><span><a href="preview.php?id='.$id.'" class="details">Details</a></span>'; } } ?></div>
				</div>
<?php

require_once("config.php");

	

$query=mysql_query("select * from product where productName='Max Fresh'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>
				<div class="grid_1_of_4 images_1_of_4">
					<?php if($qty<1) { echo"out of stock"; } else { echo'  <img src="showimage1.php?id='.$row['id'].'" alt="" / >'; ?>
</a>
					 <div class="discount">
					 <span class="percentage">40%</span>
					</div>
					 <h2><?php echo $prd; ?> </h2></br><?php echo $prd1; ?>
					 <p><span class="strike">$438.99</span><span class="price"><?php echo $prd2;   ?></span></p>
				      <div class="button"><span><img src="images/cart.jpg" alt="" /><?php echo'<a href="preview.php?id='.$id.'"'; echo' class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="preview.php?id='.$id.'" class="details">Details</a></span>'; } } ?></div>
				</div>
<?php

require_once("config.php");

	

$query=mysql_query("select * from product where productName='Kitkat'")or die (mysql_error());
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$prd=$row['productSubCategory'];
$prd1=$row['productName'];
$prd2=$row['productPrice'];
$qty=$row['quantity'];
?>
				<div class="grid_1_of_4 images_1_of_4">
				<?php if($qty<1) { echo"out of stock"; } else { echo'  <img src="showimage1.php?id='.$row['id'].'" alt="" / >';
?></a>
					 <div class="discount">
					 <span class="percentage">40%</span>
					</div>
					 <h2><?php echo $prd; ?> </h2></br><?php echo $prd1; ?>
					 <p><span class="strike">$438.99</span><span class="price"><?php echo $prd2; ?></span></p>
				      <div class="button"><span><img src="images/cart.jpg" alt="" /><?php echo'<a href="preview.php?id='.$id.'"'; echo'class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="preview.php?id='.$id.'" class="details">Details</a></span>'; }  ?></div>
				</div>
			</div>
    </div>
 </div>
</div><?php } ?>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="faq.php">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.php"><span>Site Map</span></a></li>
						
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="login.php">Sign In</a></li>
							<li><a href="cart.php">View Cart</a></li>
							
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+91-8006669256</span></li>
							<li><span></span></li>
						</ul>
						
				</div>
			</div>
			<div class="copy_right">
				<p>Compant Name © All rights Reseverd | Design by<span style="color:#ffffff"> &nbsp;Alamdar Abbas</span></p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>
