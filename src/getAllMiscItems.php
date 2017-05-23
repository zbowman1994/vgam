<?php
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
// Get products from db
$products = getAllMiscItems();
?>
<?php require 'view/header.html'; ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" > 

<button type="button"><a href = "cart.php">Back to cart</a></button>	
<button type="button"><a href = "getAllProducts.php">All products</a></button>
<button type="button"><a href = "getAllWiiGames.php">Wii games</a></button>
<button type="button"><a href = "getAllPlaystationGames.php">Playstation games</a></button>
<br><br><br>

<table id="getAllMiscItems">
    <thead>
        <tr>
            <th scope="col">Product Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Description</th>
            <th scope="col">Product Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Add product</th>
        </tr>
    </thead>
    <tbody>
        <!-- use foreach loop to fetch contents of each row -->
        <?php foreach ($products as $product) { ?>
        <form action="cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
            <tr>
                <td><img src = "<?php echo $product['product_image']; ?>" height = "100" width = "100"></img></td>
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
<br><br>
<button type="button"><a href = "cart.php">Back to cart</a></button>	
<button type="button"><a href = "getAllProducts.php">All products</a></button>
<button type="button"><a href = "getAllWiiGames.php">Wii games</a></button>
<button type="button"><a href = "getAllPlaystationGames.php">Playstation games</a></button><br>
<button type="button"><a href = "contact.php">Contact us</a></button>
<?php require 'view/footer.php'; ?>