<?php
    
    
    require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';
	
	// Get products from db
	
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
          
		   <?php echo $_REQUEST['product_id']; ?>
		    <!-- need to update for cart instead of listing all the products again -->
			
            <tr>
                <td><?php echo $_POST['product_id']; ?></td>
				<td><?php echo $_POST['product_name']; ?></td>
				<td>$<?php echo $_POST['product_price']; ?></td>
				
				<td><button type="submit">Remove</button></td>
            </tr>
            
        </tbody>
    </table>