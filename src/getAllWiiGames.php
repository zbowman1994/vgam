<?php
    
    
    require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';
	
	// Get products from db
	$products = getAllWiiGames();
	?>
	
	<button type="button"><a href = "cart.php">Link to cart</a></button>
	<button type="button"><a href = "getAllProducts.php">all products</a></button>
<button type="button"><a href = "getAllPlaystationGames.php">play station games</a></button>
<button type="button"><a href = "getAllMiscItems.php">Misc Items</a></button>
<button type="button"><a href = "index.php">Main</a></button>
<button type="button"><a href = "">contact us</a></button>
<button type="button"><a href = "">login</a></button>
	
    <table class="table table-bordered table-striped" id="names">
        <thead>
            <tr>
				<th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
				<th scope="col">Product Description</th>
				<th scope="col">Product Price</th>
				<th scope="col">Quantity</th>
				<th scope="col">Add/Remove product</th>
            </tr>
        </thead>
        <tbody>
            <!-- use foreach loop to fetch contents of each row -->
            <?php foreach ($products as $product) { ?>
			
            <tr>
				<td><img src = "<?php echo $product['product_image']; ?>" height = "42" width = "42"></img></td>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['product_description']; ?></td>
				<td>$<?php echo $product['product_price']; ?></td>
				<td><form><input type="text" value="1"></form></td>				
				<td><button type="button">Add</button>
				<button type="button">Remove (TO-DO: add Remove function)</button></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
	<button type="button"><a href = "cart.php">Link to cart</a></button>
	<button type="button"><a href = "getAllProducts.php">all products</a></button>
<button type="button"><a href = "getAllPlaystationGames.php">play station games</a></button>
<button type="button"><a href = "getAllMiscItems.php">Misc Items</a></button>
<button type="button"><a href = "index.php">Main</a></button>
<button type="button"><a href = "">contact us</a></button>
<button type="button"><a href = "">login</a></button>