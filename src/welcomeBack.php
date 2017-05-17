<?php session_start(); ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<?php require 'view/header.html'; 
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
// Get products from db
$usrPass = $_POST['password'];
$usrEmail = $_POST['email'];

$sessionId = $_SESSION['count'];


$customer = customer($sessionId, $_POST['firstname'],$_POST['lastname'],$_POST['address'],$_POST['email'],$_POST['password']);
$verify = login($usrEmail);
$cart = getCart();
$total = getTotal();	
	

?>
<button type="button" id="products"><a href = "productSelection.php">Products</a></button>
<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>
<button type="button" id="contactus"><a href = "login.php">Back to login</a></button>
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
    <?php if (isset($_POST['register'])) {
		echo 'Thanks for joining ' . $_POST['firstname'] . '<br>';
	}?>
	<?php 

	foreach ($verify as $check) {
		$hashedPass = $check['password'];
		$name = $check['f_name'];		
	}
	if (isset($_POST['login'])){
	if (password_verify($usrPass, $hashedPass)) {
		echo 'Yeah thats right! Welcome ' . $name;
	} else {
		echo 'Sorry try again.';
	}}
	?>
  </tr>
  <?php foreach ($cart as $item) { ?>
        <tr>
                <td><?php echo $item['product_name']; ?><input type="hidden" name="product_name" value="<?php echo $item['product_name']; ?>"></td>
                <td>$<?php echo $item['product_price']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                </tr>
        
   <?php } ?> 
</tr>   
    <tr>
        <?php foreach ($total as $amount) { ?> 
            <td>Subtotal:  $<?php echo $amount['total']; ?></td>
            <td>Total:  $<?php echo(round(($amount['total'] * 0.15 + $amount['total']), 2)); ?></td>
        <?php } ?>
		</tr>
</table>
<br><br><br>
<?php require 'view/footer.php'; ?>