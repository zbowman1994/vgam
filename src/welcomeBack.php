<?php 
session_start(); 
require_once('vendor/config.php');
require 'view/header.html'; 
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
$usrPass = $_POST['password'];
$usrEmail = $_POST['email'];
$sessionId = $_SESSION['count'];
$customer = customer($sessionId, $_POST['firstname'],$_POST['lastname'],$_POST['address'],$_POST['email'],$_POST['password']);
$verify = login($usrEmail);
$cart = getCart($sessionId);
$total = getTotal(sessionId);	
	

?>
<link rel="stylesheet" type ="text/css" href="css/style.css" >
<button type="button" id="products"><a href = "productSelection.php">Products</a></button>
<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>
<button type="button" id="contactus"><a href = "login.php">Back to login</a></button>

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
		<?php $cost = (round(($amount['total'] * 0.15 + $amount['total']), 2)); ?>
            <td>Subtotal:  $<?php echo $amount['total']; ?></td>
            <td>Total:  $<?php echo $cost; ?></td>
        <?php } ?>
		</tr>
</table>


<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Payment checkout"
          data-amount="<?php $cost * 100; ?>" 
          data-locale="auto"></script>
		  <input type="hidden" name="amount" value="data-amount">
</form>
<!--amount for the cart data amount-->
<br><br><br>
<?php require 'view/footer.php'; ?>