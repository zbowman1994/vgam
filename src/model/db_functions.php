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
 * This function will add products to the cart
 */
 function addProduct() {
	
	
 }
?>
