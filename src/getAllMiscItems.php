<?php
    
    
    require_once 'model/db_connect.php';
    require_once 'model/db_functions.php';
	
	// Get products from db
	$products = getAllMiscItems();
	?>
	
	<button type="button"><a href = "cart.php">Link to cart</a></button>	
<button type="button"><a href = "getAllProducts.php">all products</a></button>
<button type="button"><a href = "getAllWiiGames.php">wii games</a></button>
<button type="button"><a href = "getAllPlaystationGames.php">play station games</a></button>
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
			<form action="cart.php" method="post">
			<input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
            <tr>
				<td><img src = "<?php echo $product['product_image']; ?>" height = "42" width = "42"></img></td>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['product_description']; ?></td>
				<td>$<?php echo $product['product_price']; ?></td>
				<td><input type="number" name="quantity" value="quantity" placeholder="1" width="15"></td>				
				<td><button type="submit">Add</button>
				</tr>
				</form>
            <?php } ?>
        </tbody>
    </table>
<button type="button"><a href = "cart.php">Link to cart</a></button>	
<button type="button"><a href = "getAllProducts.php">all products</a></button>
<button type="button"><a href = "getAllWiiGames.php">wii games</a></button>
<button type="button"><a href = "getAllPlaystationGames.php">play station games</a></button>
<button type="button"><a href = "index.php">Main</a></button>
<button type="button"><a href = "">contact us</a></button>
<button type="button"><a href = "">login</a></button>