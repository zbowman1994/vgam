<?php
	/******* This demo file incorporates change-quantity-demo.php ******/
	session_start(); 
	$sid = session_id();
	require('connect.php');
	require('cartitem.php');
    
    if (isset($_POST['update']))
	{
	  // go through each item that has a changed quantity and update in DB
	  foreach ($_POST['itemchange'] as $key=>$val)
	  {
	    // fetch the item from the DB
		$query = 'select cartitem from tblCart where cartID = :key';
		$statement = $db->prepare($query);
		$statement->bindValue(':key', $key);
		$statement->execute();
		$row = $statement->fetch();
		$statement->closeCursor();
		
		// update the qtty for this object
		$object = unserialize($row['cartitem']);
		$object->setQtty($val);
		$object = serialize($object);
		
		// store the updated obj back in the DB
		$query = 'update tblCart set cartitem = :object where cartID = :key';
		$statement = $db->prepare($query);
		$statement->bindValue(':object', $object);
		$statement->bindValue(':key', $key);
		$statement->execute();
		$statement->closeCursor();
	  }
	}
	
	if (isset($_GET['deleteitem']))
    {
      $itemNumber = $_GET['deleteitem'];
	  
	  // parameterized query to prevent SQLi Attacks
	  $query = 'delete from tblCart where cartID = :itemnum and userid = :sid';
      $statement = $db->prepare($query);
	  $statement->bindValue(':itemnum', $itemNumber);
	  $statement->bindValue(':sid', $sid);
	  $statement->execute();
	  $statement->closeCursor();
	  
	  header("Location: {$_SERVER['PHP_SELF']}");
	}
	
	if (isset($_GET['deleteall']))
	{
	  $query = 'delete from tblCart where userid = :sid';
      $statement = $db->prepare($query);
	  $statement->bindValue(':sid', $sid);
	  $statement->execute();
	  $statement->closeCursor();
	  
	  header("Location: {$_SERVER['PHP_SELF']}");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Total Price Demo</title>
</head>
<body>
<?php
  
  $runningtotal = 0;
  
  // test for number of items
  $query = 'SELECT COUNT(*) FROM tblCart WHERE userid = :sid';
  $statement = $db->prepare($query);
  $statement->bindValue(':sid', $sid);
  $statement->execute();
    
  // make sure the cart has items
  if ($statement->fetchColumn() > 0) {
	  echo "<form method=\"post\" action=\"{$_SERVER['PHP_SELF']}\">";
  
      echo "<table border=\"1\" width=\"80%\" align=\"center\">";
      echo "<tr><td>Model</td><td>Size</td><td>Color</td><td>Price</td><td>Quantity</td></tr>";
	  
	  // fetch all the items from the DB for this user
	  $query = 'select cartID, cartitem from tblCart where userid = :sid';
	  $statement = $db->prepare($query);
      $statement->bindValue(':sid', $sid);
      $statement->execute();
		
	  // get the first row
	  $row = $statement->fetch();
           
	  // print out each cart item from the DB
	  while($row != null) {
		$item = unserialize($row['cartitem']);
        echo "<tr>";
		echo "<td>{$item->getModel()}</td>";
		echo "<td>{$item->getSize()}</td>";
		echo "<td>{$item->getColor()}</td>";
		echo "<td>{$item->getPrice()}</td>";
		echo "<td><input name=\"itemchange[{$row['cartID']}]\" type=\"text\" value=\"{$item->getQtty()}\" size=\"2\" maxlength=\"2\" /></td>\n\n";
		echo "<td><a href=\"{$_SERVER['PHP_SELF']}?deleteitem={$row['cartID']}\">delete</a></td>";
		
		$lineprice = $item->getPrice() * $item->getQtty();
		$runningtotal += $lineprice;
		$lineprice = number_format($lineprice, 2);
		echo "<td>\$$lineprice</td>";
		echo "<tr/>\n";
		// fetch the next row
		$row = $statement->fetch();
	  }
	  $statement->closeCursor();
	  
	  echo "<tr><td colspan=\"5\" align=\"center\"><input type=\"submit\" name=\"update\" value=\"Update Quantities\" /></td></tr>";
	  
	  $runningtotal = number_format($runningtotal, 2);
	  echo "<td colspan=\"6\" align=\"right\">TOTAL</td><td>\$$runningtotal</td></tr>";
	  
	  echo "<tr><td colspan=\"5\" align=\"center\"><a href=\"{$_SERVER['PHP_SELF']}?deleteall=yes\">Delete all items</a></td></tr>";
	  echo "</table></form>";
 } else
	 die('Cart is empty. Re-fill Cart by going back to <a href="store-object-demo.php">store-object-demo.php</a>');
?>
</body>
</html>
