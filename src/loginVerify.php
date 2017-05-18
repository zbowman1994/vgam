<?php
session_start(); 
require 'view/header.html'; 
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
$usrPass = $_POST['password'];
$usrEmail = $_POST['email'];
$sessionId = $_SESSION['count'];
$customer = customer($sessionId, $_POST['firstname'],$_POST['lastname'],$_POST['address'],$_POST['email'],$_POST['password']);
$verify = login($usrEmail);
?>
<link rel="stylesheet" type ="text/css" href="css/style.css" >
<button type="button" id="products"><a href = "productSelection.php">Products</a></button>
<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>
<!-- <button type="button" id="contactus"><a href = "login.php">Back to login</a></button> -->

<br><br><br>
<table align="center">
  <tr>
    <?php if (isset($_POST['register'])) {
		echo 'Thanks for joining ' . $_POST['firstname'] . '<br>';
		echo'<button type"button"><a href="cartReview.php">Proceed to payment</a></button>';
	}?>
	<?php 

	foreach ($verify as $check) {
		$hashedPass = $check['password'];
		$name = $check['f_name'];		
	}
	if (isset($_POST['login'])){
	if (password_verify($usrPass, $hashedPass)) {
		echo 'Yeah thats right! Welcome ' . $name;
		echo'<button type"button"><a href="cartReview.php">Proceed to payment</a></button>';
	} else {
		echo 'Sorry try again.';
		echo '<button type="button" id="contactus"><a href = "login.php">Back to login</a></button>';
	}
	}
	?>
  </tr>
<!--  <button type"button"><a href="cartReview.php">Proceed to payment</a></button> -->