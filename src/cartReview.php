<?php 
session_start(); 
require_once('config.php');
require 'view/header.html'; 
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
$usrPass = $_POST['password'];
$usrEmail = $_POST['email'];
$sessionId = $_SESSION['count'];

$cart = getCart($sessionId);
$total = getTotal($sessionId);	
	

?>
<link rel="stylesheet" type ="text/css" href="css/style.css" >
<button type="button" id="products"><a href = "cart.php">Back to cart</a></button>

<br><br><br>
<table align="center">
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
			<?php $amount = $cost * 100; ?>
        <?php } ?>
		</tr>
</table>



<!--------- DONT TOUCH BELOW THIS LINE ITS FOR STRIPE ------->
<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Payment checkout"
          data-amount="<?php echo $amount; ?>" 
          data-locale="auto"
		  data-currency="cad"
		  data-email="<?php echo $usrEmail ?>"></script>
		  <input type="hidden" name="amount"value="<?php echo $amount; ?>">
		 
</form>
<!---------- DONT TOUCH ABOVE THIS LINE FOR STRIPE -------------->


<!--amount for the cart data amount-->
<br><br><br>
<?php require 'view/footer.php'; ?>