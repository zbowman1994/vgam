<?php
    
    
    require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';
	
	$idp = $_POST['product_id'];
	$quantity = $_POST['quantity'];
	$remove = $_GET['priduct_id'];
	
	$addToCart = addProduct($idp,$quantity);
	$cart = getCart();
	$total = getTotal();
	$removeItem = removeProduct($remove);
	
	 
	?>

<button type="button"><a href = "productSelection.php">Continue shopping</a></button>
<button type="button">Checkout</button>
    <table border=2 rules=rows>
        <thead>
            <tr>
                <th scope="col">product id</th>
				<th scope="col">name</th>
                <th scope="col">price</th>
				<th scope="col">quantity</th>
				
			<button type="submit" value="empty" >Empty Cart</button>
				
            </tr>
        </thead>
        <tbody>
            <!-- use foreach loop to fetch contents of each row -->
	<form action="cart.php" method="get">	   	
             <?php foreach ($cart as $item) { ?>
			  <tr>
				<td><?php echo $item['product_id']; ?></td>
                <td><?php echo $item['product_name']; ?></td>
				<td><?php echo $item['product_price']; ?></td>
				<td><?php echo $item['quantity']; ?></td>
				<td><input type="checkbox" name="product_id"  ></td>
				<td><button type="submit" value="<?php $item['product_id'] ?>">Remove</button></td>
			 </tr>
			 <?php } ?>
        </form>
		<tr>
		<?php foreach ($total as $amount){ ?>
		<td>total is: <?php echo $amount['total']; ?></td>
		<?php }?>
		</tr>
		</tbody>
    </table>