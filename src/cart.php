<?php
    
    
    require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';
	$id = $_POST['product_id'];
	$name = $_POST['product_name'];
	$price = $_POST['product_price'];
	$quantity = $_POST['quantity'];
	
	$addToCart = addProduct($id, $name, $price, $quantity);
	
	?>
<button type="button">Empty Cart</button>
<button type="button"><a href = "index.php">Continue shopping</a></button>
<button type="button">Checkout</button>
    <table class="table table-bordered table-striped" id="names">
        <thead>
            <tr>

                <th scope="col">Product ID</th>

                <th scope="col">Product Name</th>
				<th scope="col">Product Price</th>
				<th scope="col">Quantity</th>
				<th scope="col">Remove product</th>
            </tr>
        </thead>
        <tbody>
            <!-- use foreach loop to fetch contents of each row -->
		   <?php echo $_POSt['product_id']; ?>

		    <!-- need to update for cart instead of listing all the products again -->
			
            <tr>
                <td><?php echo $id ?></td>
				<td><?php echo $name; ?></td>
				<td>$<?php echo $price; ?></td>
				<td><?php echo $quantity; ?></td>
				<td><button type="submit">Remove</button></td>
            </tr>
            
        </tbody>
    </table>