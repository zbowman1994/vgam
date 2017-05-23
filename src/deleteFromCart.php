<?php
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
$prodId = $_GET['product_id'];
$cartId = $_GET['cart_id'];
$name = $_GET['product_name'];
$qty = $_GET['quantity'];

/*
 * This function deletes cart still need to do
 */

function clearCart() {
    global $dbc;
    $query = 'TRUNCATE TABLE cart';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}

/*
 * removes the selected product from the cart
 */

function removeProduct($prodId, $cartId) {
    global $dbc;
    $query = 'DELETE FROM cart WHERE products_product_id = :product AND cart_id = :cart';
    $statement = $dbc->prepare($query);
    $statement->bindValue(':product', $prodId);
    $statement->bindValue(':cart', $cartId);
    $statement->execute();
    $statement->closeCursor();

}

/*
 * updates quantity for specific item
 */
function updateQuantity($prodId, $qty) {
    global $dbc;
    $query = 'UPDATE cart SET quantity = :qty WHERE products_product_id = :product';
    $statement = $dbc->prepare($query);
    $statement->bindValue(':product', $prodId);
    $statement->bindValue(':qty', $qty);
    $statement->execute();
    $statement->closeCursor();
}
?>
<?php require 'view/header.html'; ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" >

<p></p>
<p><?php if (isset($_GET['update'])) {
    updateQuantity($prodId, $qty);
	echo '<p style="font-family:Tahoma, Geneva, sans-serif; background-color: black; border: 10px solid white; width: 15%; padding: 15px 20px; display: inline-block;">Successfully updated ' . $name . '</p>';
	
}
if (isset($_GET['remove'])) {
    removeProduct($prodId, $cartId);
	echo '<p style="font-family:Tahoma, Geneva, sans-serif; background-color: black; border: 10px solid white; width: 15%; padding: 15px 20px; display: inline-block;">Successfully removed ' . $name . '</p>';
	
}
if (isset($_GET['empty'])) {
    clearCart();
	echo '<p style="font-family:Tahoma, Geneva, sans-serif; background-color: black; border: 10px solid white; width: 15%; padding: 15px 20px; display: inline-block;">Cart emptied </p>' ;
} ?></p>
<button type="button"><a href = "cart.php">Back to cart</a></button>
<button type="button"><a href = "productSelection.php">Product Selection</a></button>

<?php require 'view/footer.php'; ?>