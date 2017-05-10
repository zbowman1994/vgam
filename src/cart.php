<?php
    
    
    require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';
	$idp = $_POST['product_id'];
	$name = $_POST['product_name'];
	$price = $_POST['product_price'];
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
				<button type="button" >Empty Cart</button>
            </tr>
        </thead>
        <tbody>
            <!-- use foreach loop to fetch contents of each row -->
		   	
             <?php foreach ($cart as $item) { ?>
			   <tr>
				<td><?php echo $item['product_id']; ?></td>
                <td><?php echo $item['product_name']; ?></td>
				<td><?php echo $item['product_price']; ?></td>
				<td><?php echo $item['quantity']; ?></td>
				<td><button type="submit">Remove</button></td>
			 </tr>
			 <?php } ?>
        
		</tbody>
    </table>