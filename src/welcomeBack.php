<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<?php require 'view/header.html'; 
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
// Get products from db
$login = login($_POST['email'],$_POST['password']);
if (isset($POST['login'])) {
	$login = login($_POST['email'],$_POST['password']);
}elseif (isset($_POST['register'])) {
	$customer = customer($_POST['f_name'],$_POST['l_name'],$_POST['address'],$_POST['email'],$_POST['password']);
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
    
	<?php foreach ($login as $user) {
		echo 'Welcome ' . $user['f_name'] . '!';
	}	?>
  </tr>
</table>
<br><br><br>
<?php require 'view/footer.php'; ?>