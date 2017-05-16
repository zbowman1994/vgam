<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<?php require 'view/header.html'; 
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
// Get products from db
$usrPass = $_POST['password'];
$usrEmail = $_POST['email'];
//if (isset($POST['login'])) {
	$verify = login($usrEmail);
if (isset($_POST['register'])) {
	$customer = customer($_POST['firstname'],$_POST['lastname'],$_POST['address'],$_POST['email'],$_POST['password']);
	}
	

?>
<button type="button" id="products"><a href = "productSelection.php">Products</a></button>
<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>

<style>
table, th, td {
    border: 1px solid black;
	border-collapse: collapse;
	padding: 20px;
}
</style>
<br><br><br>
<table align="center">
  <tr>
    
	<?php 
	
	foreach ($verify as $check) {
		$hashedPass = $check['password'];
		echo $check['email'] . '<br>';
		echo $check['password'] . '<br>';		
	
	
	if (password_verify($usrPass, $hashedPass)) {
		echo 'yeah thats right';
	} else {
		echo $hashedPass;
		echo 'pissoff you hacker';
	}
	}
	?>
  </tr>
</table>
<br><br><br>
<?php require 'view/footer.php'; ?>