<?php

/**
 * This function generates customer database
 */
function customer($sessionId, $firstname, $lastname, $address, $email, $password) {
	global $dbc;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = 'INSERT INTO customer(session_id, f_name, l_name, address, email, password) 
			  VALUES (:sessionId, :firstname, :lastname, :address, :email, :password)';
    $statement = $dbc->prepare($query);
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
	$statement->bindValue(':sessionId', $sessionId);
    $statement->execute();
    $statement->closeCursor();
}

/*
 * This function generates result set of the 
 * products table
 */

function getAllProducts() {
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

function getAllWiiGames() {
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

function getAllPlaystationGames() {
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

function getAllMiscItems() {
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

function addProduct($sessionId, $idp, $quantity) {
    global $dbc;
    $query = 'INSERT INTO cart (customer_session_id, products_product_id, quantity, time) 
	values (:sessionId, :idp, :quantity, NOW())
	ON DUPLICATE KEY UPDATE quantity = quantity + :quantity';
    $statement = $dbc->prepare($query);
	$statement->bindValue(':sessionId', $sessionId);
    $statement->bindValue(':idp', $idp);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();
}

/*
 * This function generates result set of the 
 * product in the shopping cart and returns them
 */

function getCart($sessionId) {
    global $dbc;
    $query = 'SELECT cart_id, product_id, product_name, product_price, quantity from products
	INNER JOIN cart ON products.product_id = cart.products_product_id
	WHERE cart.customer_session_id = :sessionId';
    $statement = $dbc->prepare($query);
	$statement->bindValue(':sessionId', $sessionId);
    $statement->execute();
    $cart = $statement->fetchAll();
    $statement->closeCursor();
    return $cart;
}

/* Retrieve total of all products in cart need to add quantity fror running total
 */

function getTotal($sessionId) {
    global $dbc;
    $query = 'SELECT SUM(product_price * quantity) as total from products
	INNER JOIN cart ON products.product_id = cart.products_product_id
	WHERE cart.customer_session_id = :sessionId';
    $statement = $dbc->prepare($query);
	$statement->bindValue(':sessionId', $sessionId);
    $statement->execute();
    $total = $statement->fetchAll();
    $statement->closeCursor();
    return $total;
}

/*
 * function to retireive user credentials then verify them
 */
function login($email) {
	global $dbc;
    $query = 'SELECT f_name, email, password FROM customer WHERE email = :email';
    $statement = $dbc->prepare($query);
	$statement->bindValue(':email', $email);
    $statement->execute();
    $verify = $statement->fetchAll();
    $statement->closeCursor();
	return $verify;
}


?>
