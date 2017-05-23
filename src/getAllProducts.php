<?php
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
$products = getAllProducts();
?>
<?php require 'view/header.html'; ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" > 

<button type="button" id ="backToCart"><a href = "cart.php">Back to cart</a></button>
<button type="button"><a href = "getAllWiiGames.php">Wii games</a></button>
<button type="button"><a href = "getAllPlaystationGames.php">Playstation games</a></button>
<button type="button"><a href = "getAllMiscItems.php">Misc. Items</a></button>
<br><br><br>

<table id="allProducts">
    <thead>
        <tr>
            <th scope="col">Product Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Description</th>
            <th scope="col">Product Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Add Product</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) { ?>
        <form action="cart.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
            <tr>
                <td><img src = "<?php echo $product['product_image']; ?>" height = "100" width = "100"></img></td>
                <td><?php echo $product['product_name']; ?></td>
                <td><?php echo $product['product_description']; ?></td>
                <td>$<?php echo $product['product_price']; ?></td>
                <td><input type="number" name="quantity" value="quantity" placeholder="1" width="15"></td>	
                <!--TO-DO: add button bigger than remove-->
                <td><button type="submit" id="Add">Add</button>
            </tr>
        </form>
    <?php } ?>
</tbody>
</table>
<br><br>
<button type="button"><a href = "cart.php">Back to cart</a></button>
<button type="button"><a href = "getAllWiiGames.php">Wii games</a></button>
<button type="button"><a href = "getAllPlaystationGames.php">Playstation games</a></button>
<button type="button"><a href = "getAllMiscItems.php">Misc Items</a></button><br>
<button type="button"><a href = "contact.php">Contact us</a></button>


<?php require 'view/footer.php'; ?>