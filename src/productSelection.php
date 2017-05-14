<?php require 'view/header.html'; ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<button type="button" id="main"><a href = "index.php">Main</a></button>
<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>
<button type="button" id="login"><a href = "login.php">Login</a></button>
<div>
<?php echo $_SESSION['count'] . "    is the sid    ";?>
    <table>
		<tr>
			<td>
      <div class="imgContainer">
				<div>
				</div>
				<div class="imgButton">
					<button type="button" id="wii"><a href = "getAllWiiGames.php"><img src="css/images/images.jpg" width="350px" height="300px"/>Wii Games</a></button>
				</div>
         </div>
			</td>
      <td>
      <div class="imgContainer">
				<div>
				</div>
				<div class="imgButton">
					<button type="button" id="playstationgames"><a href = "getAllPlaystationGames.php"><img src="css/images/ps4.jpg" width="350px" height="300px"/>Playstation Games</a></button>
				</div>
         </div>
			</td>
        <td>
      <div class="imgContainer">
				<div>
				</div>
				<div class="imgButton">
					<button type="button" id="miscitems"><a href = "getAllMiscItems.php"><img src="css/images/download.jpg" width="350px" height="300px"/>Misc Items</a></button>
				</div>
         </div>
			</td>
            
            </tr>
</table>
    
    
    
    

<button type="button" id="allproducts"><a href = "getAllProducts.php">All Products</a></button>



</div>

<?php require 'view/footer.php'; ?>