<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<?php require 'view/header.html'; 

?>

<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>
<button type="button" id="products"><a href = "productSelection.php">Product Selection</a></button>


<div>
<form action="welcomeBack.php" method="post">
<label for="email">Email</label>
<input type="text" name="email">
<label for="password">Password</label>
<input type="password" name="password">
<button type="submit" name="login" id="userlogin">Login</button>
</form>
</div>
<div class="container">
    <form action="welcomeBack.php" method= "post">
        <div class="container">
            <label for="firstname"><b>First Name:</b></label>
            <input type="text" placeholder="Your First Name.." id="firstname" name="firstname" required>
            <label for="lastname"><b>Last Name:</b></label>
            <input type="text" placeholder="Your Last Name.." id="lastname" name="lastname" required>      
            <label for="address"><b>Address:</b></label>
            <input type="text" placeholder="Your Address.." id="address" name="address">
            <label for="email"><b>Email:</b></label>
            <input type="text" placeholder="Your Email.." id="email" name="email" required>
            <label for="password"><b>Password:</b></label>
            <input type="password" placeholder="Your password.." id="password" name="password" required>
            <button type="submit" name="register" id="userlogin">Register</button>
            <input type="checkbox" checked="checked"> Remember Me
        </div>
        
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
	<?php require 'view/footer.php'; ?>