<?php

/** 
 * This function takes in a first and last name
 * and stores it in the database
 *
 * @param string $firstName - the firstName the user entered in the form.
 * @param string $lastName - the lastName the user enterd in the form.
 *
 * @return void 
 */
function storeName($firstName, $lastName)
{
    global $dbc;
    
    $query = 'INSERT INTO tblNames (first_name, last_name) 
			  VALUES (:firstName, :lastName)';
    $statement = $dbc->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $statement->closeCursor();

}

/**
 * This function generates the result set of
 * the tblNames table.
 *
 * @return array $names - an assoc. array which contains all the names stored in the DB.
 */
function getAllNames()
{
    global $dbc;
    
    $query = 'SELECT * from tblNames ORDER BY last_name';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $names = $statement->fetchAll();
    $statement->closeCursor();
    return $names;

}

/*
 * This function generates result set of the 
 * products table
*/
function getAllProducts()
{
	
	global $dbc;
	
	$query = 'SELECT * from products';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
	
    return $products;
}

/*
 * This function generates result set of the 
 * wii games
*/
function getAllWiiGames()
{
	
	global $dbc;
	
	$query = 'SELECT * from products where categories_cat_id = 1';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $wiiGames = $statement->fetchAll();
    $statement->closeCursor();
	
    return $wiiGames;
}

/*
 * This function generates result set of the 
 * playstation games
*/
function getAllPlaystationGames()
{
	
	global $dbc;
	
	$query = 'SELECT * from products where categories_cat_id = 2';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $playstationGames = $statement->fetchAll();
    $statement->closeCursor();
	
    return $playstationGames;
}

/*
 * This function generates result set of the 
 * misc items
*/
function getAllMiscItems()
{
	
	global $dbc;
	
	$query = 'SELECT * from products where categories_cat_id = 3';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $miscItems = $statement->fetchAll();
    $statement->closeCursor();
	
    return $miscItems;
}

/*
 * This function will add product id quantity and a timestamp to the cart
 * this is to be used in get cart to query db and return the items for display
 */
 function addProduct($idp, $quantity) {
	
	global $dbc;
    
    $query = 'INSERT INTO cart (products_product_id, quantity, time) 
	values (:idp, :quantity, NOW())';
    $statement = $dbc->prepare($query);
    $statement->bindValue(':idp', $idp);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();
	
 }
 
 /*
 * This function generates result set of the 
 * product in the shopping cart and returns them
*/
function getCart()
{
	
	global $dbc;
	
	$query = 'SELECT product_id, product_name, product_price, quantity from products
	INNER JOIN cart ON products.product_id = cart.products_product_id';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $cart = $statement->fetchAll();
    $statement->closeCursor();
	
    return $cart;
}

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
 function removeProduct() {
	 global $dbc;
	 
	 $query = ' DELETE * FROM cart WHERE product_id = $id';
    $statement = $dbc->prepare($query);
    $statement->execute();
    $statement->closeCursor();
 }

?>
