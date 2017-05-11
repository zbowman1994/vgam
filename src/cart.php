<?php
    
    
    require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';
	require_once 'model/deleteFromCart.php';
	
	$idp = $_POST['product_id'];
	$quantity = $_POST['quantity'];
	//$remove = $_get['product_id'];
	
	$addToCart = addProduct($idp,$quantity);
	$cart = getCart();
	$total = getTotal();
	//$removeItem = removeProduct($remove);
	
	 
	?>

<button type="button"><a href = "productSelection.php">Continue shopping</a></button>
<button type="button">Checkout</button>
    <table border=2 rules=rows>
        <thead>
            <tr>
                
				<th scope="col">name</th>
                <th scope="col">price</th>
				<th scope="col">quantity</th>
				
			<button type="submit" value="empty" >Empty Cart</button>
				
            </tr>
        </thead>
        <tbody>
            <!-- use foreach loop to fetch contents of each row -->	   	
             <?php foreach ($cart as $item) { ?>
			 <form action="deleteFromCart.php" method="get">
			<input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
			  <tr>
				
                <td><?php echo $item['product_name']; ?></td>
				<td><?php echo $item['product_price']; ?></td>
				<td><?php echo $item['quantity']; ?></td>
				
				<td><button type="submit" id="remove" >Remove</button></td>
			 </tr>
			 </form>
			 <?php } ?>
		<tr>
		<?php foreach ($total as $amount){ ?>
		<td>subtotal is: <?php echo $amount['total']; ?></td>
		<?php }?>
		</tr>
		</tbody>
    </table>