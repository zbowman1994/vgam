
<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<?php require 'view/header.html'; 

?>

<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>
<button type="button" id="products"><a href = "productSelection.php">Product Selection</a></button>


<div>
<br> <label id="returningCustomer">Returning customers</label> <br>
<form action="loginVerify.php" method="post">
<label for="email" id="email"><br>Email:<br></label>
<input type="text" name="email">
<label for="password" id="password"><br>Password:<br></label>
<input type="password" name="password"><br>
<button type="submit" name="login" id="userLogin">Login</button>
</form>
</div>
<div class="container">
    <form action="loginVerify.php" method= "post">
			<br> <font face="arial" color="blue" size"25">New customers</font> <br>
            <label for="firstname"><b><br>First Name:<br></b></label>
            <input type="text" placeholder="Your First Name.." id="firstName" name="firstname" required>
            <label for="lastname"><b><br>Last Name:<br></b></label>
            <input type="text" placeholder="Your Last Name.." id="lastname" name="lastname" required>      
            <label for="address"><b><br>Address:<br></b></label>
            <input type="text" placeholder="Your Address.." id="address" name="address">
            <label for="email"><b><br>Email:<br></b></label>
            <input type="text" placeholder="Your Email.." id="email" name="email" required>
            <label for="password"><b><br>Password:<br></b></label>
            <input type="password" placeholder="Enter new password.." id="password" name="password" required><br>
            <button type="submit" name="register" id="userlogin">Register</button>
            
        </div>
        
    </form>
	<?php require 'view/footer.php'; ?>