<?php 
session_start(); 
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
$sessionId = $_SESSION['count'];
$prodId = $_POST['product_id'];
$qty = $_POST['quantity']; 
addProduct($sessionId, $prodId, $qty);
$cart = getCart($sessionId);
$total = getTotal($sessionId);
?>
<?php require 'view/header.html'; ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" > 

<button type="button" id="continueShopping"><a href = "productSelection.php">Continue shopping</a></button>
<button type="button" id="checkout"><a href="login.php">Checkout</a></button>
<form action="deleteFromCart.php" method="get">
    <button type="submit" id="emptyCart"><input type="hidden" name="empty">Empty Cart</button>
</form><br>
<table id="cart">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>	
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cart as $item) { ?>
        <form action="deleteFromCart.php" method="get">
            <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
            <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">			 
            <tr>
                <td><?php echo $item['product_name']; ?><input type="hidden" name="product_name" value="<?php echo $item['product_name']; ?>"></td>
                <td>$<?php echo $item['product_price']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><input type="number" name="quantity" value="quantity" placeholder="Update quantity" width="3"></td>
                <td><button  type="submit" name="update" id="update">Update</button></td>
                <td><button  type="submit" name="remove" id="delete">Delete</button></td>
            </tr>
        </form>
    <?php } ?>  
    <table id ="total">
	<thead><br>
	<tr>
        <?php foreach ($total as $amount) { ?>
            <td>Subtotal:  $<?php echo $amount['total']; ?>&nbsp;&nbsp;</td>
            <td>Total:  $<?php echo(round(($amount['total'] * 0.15 + $amount['total']), 2)); ?></td>
        <?php } ?>
    </tr>
	</thead>
</tbody>
</table>

<?php require 'view/footer.php'; ?>