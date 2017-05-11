<?php
    
    
    require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';
	
	$idp = $_POST['product_id'];
	$quantity = $_POST['quantity'];
	
	$addToCart = addProduct($idp,$quantity);
	$cart = getCart();
	
	 
	?>

<button type="button"><a href = "productSelection.php">Continue shopping</a></button>
<button type="button">Checkout</button>
    <table class="table table-bordered table-striped" id="names">
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
	<form action="cart.php" method="post">	   	
             <?php foreach ($cart as $item) { ?>
			  <tr>
				<td><?php echo $item['product_id']; ?><input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>"></td>
                <td><?php echo $item['product_name']; ?></td>
				<td><?php echo $item['product_price']; ?></td>
				<td><?php echo $item['quantity']; ?></td>
				<td><input type="checkbox" name="product_id"  ></td>
				<td><button type="submit" value="<?php $item['product_id'] ?>">Remove</button></td>
			 </tr>
			 <?php } ?>
        </form>
		
		</tbody>
    </table>