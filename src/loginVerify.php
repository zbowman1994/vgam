<?php
session_start(); 
require 'view/header.html'; 
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
$usrPass = $_POST['password'];
$usrEmail = $_POST['email'];
$sessionId = $_SESSION['count'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$customer = customer($sessionId, $firstName, $lastName, $address, $email, $password);
$verify = login($usrEmail);
?>
<link rel="stylesheet" type ="text/css" href="css/style.css" >
<button type="button" id="products"><a href = "productSelection.php">Products</a></button>
<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>

<br><br><br>
<table align="center">
  <tr>
    <?php if (isset($_POST['register'])) {
		echo '<p style="font-family:Tahoma, Geneva, sans-serif; background-color: black; border: 10px solid white; width: 15%; padding: 15px 20px; display: inline-block;">Thanks for joining ' . $firstName . '</p><br>';
		echo'<button type"button"><a href="cartReview.php">Proceed to payment</a></button>';
	}?>
	<?php 

	foreach ($verify as $check) {
		$hashedPass = $check['password'];
		$name = $check['f_name'];		
	}
	if (isset($_POST['login'])){
	if (password_verify($usrPass, $hashedPass)) {
		echo '<p id="loginVerify" style="font-family:Tahoma, Geneva, sans-serif; border: 10px solid white; width: 15%; padding: 15px 20px; display: inline-block;">Yeah thats right! Welcome ' . $name . '</p><br><br>';
		echo'<button type"button"><a href="cartReview.php">Proceed to payment</a></button>';
	} else {
		echo '<p id="wrongPass" style="font-family:Tahoma, Geneva, sans-serif; border: 10px solid white; width: 15%; padding: 15px 20px; display: inline-block;">Sorry try again.</p><br><br>';
		echo '<button type="button" id="contactus"><a href = "login.php">Back to login</a></button>';
	}
	}
	?>
  </tr>
 </table>
