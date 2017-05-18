
<?php require 'view/header.html'; ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" > 




<div>
    <table>
      <tr>
        <td>
         <button type="button" id="wii"><a href = "getAllWiiGames.php"><img src="css/images/images.jpg" width="350px" height="300px"/><br>Wii Games</a></button>
         <button type="button" id="playstationGames"><a href = "getAllPlaystationGames.php"><img src="css/images/ps4.jpg" width="350px" height="300px"/><br>Playstation Games</a></button>
         <button type="button" id="miscItems"><a href = "getAllMiscItems.php"><img src="css/images/download.jpg" width="350px" height="300px"/><br>Misc Items</a></button>
        </td>
       </tr>
    </table>
	<br>
    <button type="button" id="allproducts"><a href = "getAllProducts.php">All Products</a></button>
</div>
<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button><br>
<?php require 'view/footer.php'; ?>