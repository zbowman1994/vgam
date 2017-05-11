<?php

/*
 * This function deletes cart
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
/* function removeProduct($remove) {
	 global $dbc;
	 
	$query = 'DELETE FROM cart WHERE product_product_id = :remove';
    $statement = $dbc->prepare($query);
	$statement->bindValue(':remove', $remove);
    $statement->execute();
    $statement->closeCursor();
 }
 
 ?>