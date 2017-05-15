<?php
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
$prodId = $_GET['product_id'];
$cartId = $_GET['cart_id'];
$name = $_GET['product_name'];
$qty = $_GET['quantity'];
if (isset($_GET['update'])) {
    updateQuantity($prodId, $qty);
}elseif (isset($_GET['remove'])) {
    removeProduct($prodId, $cartId);
}elseif (isset($_GET['empty'])) {
    clearCart();
}
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
<p><?php if (isset($_GET['remove'])) {
	echo 'Successfully removed ' . $name;
}elseif (isset($_GET['update'])) {
echo 'Successfully updated ' . $name;
}elseif (isset($_GET['empty'])) {
echo 'Cart cleared'; }?></p>
<p> What would you like to do now? </p>
<button type="button"><a href = "cart.php">Back to cart</a></button>
<button type="button"><a href = "productSelection.php">Product Selection</a></button>

