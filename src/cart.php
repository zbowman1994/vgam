<?php
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
addProduct($_POST['product_id'], $_POST['quantity']);
$cart = getCart();
$total = getTotal();
?>
<button type="button"><a href = "productSelection.php">Continue shopping</a></button>
<button type="button">Checkout</button>
<form action="deleteFromCart.php" method="get">
    <button type="submit"><input type="hidden" name="empty">Empty Cart</button>
</form>
<table border=2 rules=rows>
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>	
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cart as $item) { ?>
        <form action="deleteFromCart.php" method="get">
            <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
            <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">			 
            <tr>
                <td><?php echo $item['product_name']; ?><input type="hidden" name="product_name" value="<?php echo $item['product_name']; ?>"></td>
                <td>$<?php echo $item['product_price']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><input type="number" name="quantity" value="quantity" placeholder="*TO-DO* Update quantity" width="5"></td>
                <td><button  type="submit" name="update" >Update quantity</button></td>
                <td><button  type="submit" name="remove" >Delete</button></td>
            </tr>
        </form>
    <?php } ?>  
    <tr>
        <?php foreach ($total as $amount) { ?>
            <td>Subtotal:  $<?php echo $amount['total']; ?></td>
            <td>Total:  $<?php echo(round(($amount['total'] * 0.15 + $amount['total']), 2)); ?></td>
        <?php } ?>
    </tr>
</tbody>
</table>