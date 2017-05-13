<?php
    
    
    require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';
	//$idp = $_POST['product_id'];
	//$quantity = $_POST['quantity'];
	
	//$addToCart = addProduct($idp, $quantity);
	$addToCart = addProduct($_POST['product_id'], $_POST['quantity']);
	//$removeItem = removeProduct($cpid);
	$cart = getCart();
	$total = getTotal();
	
	
	 
	?>
	

<button type="button"><a href = "productSelection.php">Continue shopping</a></button>
<button type="button">Checkout</button>
<form action="deleteFromCart.php" method="get">
<button type="submit"><input type="hidden" name="empty">Empty Cart</button>
</form>
    <table border=2 rules=rows>
        <thead>
            <tr>
				<th scope="col">Name</th>
                <th scope="col">Price</th>
				<th scope="col">Quantity</th>	
            </tr>
        </thead>
        <tbody>
            <!-- use foreach loop to fetch contents of each row -->	   	
			 
			<?php foreach ($cart as $item) { ?>
			<form action="deleteFromCart.php" method="get">
			<input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
			<input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">			 
			 <tr>
                <td><?php echo $item['product_name']; ?><input type="hidden" name="product_name" value="<?php echo $item['product_name']; ?>"></td>
				<td>$<?php echo $item['product_price']; ?></td>
				<td><?php echo $item['quantity']; ?></td>
				<td><button  type="submit" name="remove" >Remove</button></td>
				<td><input type="number" name="quantity" value="quantity" placeholder="1" width="5"></td>
			</tr>
			 </form>
			 <?php } ?>
			  
		<tr>
		<?php foreach ($total as $amount){ ?>
		<td>Subtotal:  $<?php echo $amount['total']; ?></td>
		<td>Total:  $<?php echo round($amount['total'] * 0.15 + $amount['total']),2; ?></td>
		<?php } ?>
		</tr>
		</tbody>
    </table>