
<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<?php require 'view/header.html'; 

?>

<button type="button" id="products"><a href = "productSelection.php">Product Selection</a></button><br>

<br>
<div id ="login">
<br> <label id="returningCustomer">Returning Customer</label> <br>
<form action="loginVerify.php" method="post">
    <label for="email" id="email"><b><br>Email:<br></b></label>
<input type="email" name="email" placeholder="Your email.." required>
    <label for="password" id="password"><b><br>Password:<br></b></label>
<input type="password" name="password" placeholder="Your password.." required><br><br>
<button type="submit" name="login" id="userLogin">Login</button>
</form>
</div> <br>
<div id="newCustomer">
    <form action="loginVerify.php" method= "post">
        <br> <label id="newCustomers">New Customer</label> <br>
            <label for="firstname" id="firstName"><b><br>First Name:<br></b></label>
            <input type="text" placeholder="Your First Name.." id="firstName" name="firstname" required>
            <label for="lastname" id="lastName"><b><br>Last Name:<br></b></label>
            <input type="text" placeholder="Your Last Name.." id="lastname" name="lastname" required>      
            <label for="address" id="address"><b><br>Address:<br></b></label>
            <input type="text" placeholder="Your Address.." id="address" name="address" required>
            <label for="email" id="email"><b><br>Email:<br></b></label>
            <input type="email" placeholder="Your Email.." id="email" name="email" required>
            <label for="password" id="password"><b><br>Password:<br></b></label>
            <input type="password" placeholder="Enter new password.." id="password" name="password" required><br><br>
            <button type="submit" name="register" id="userlogin">Register</button>
            
        </div>
        
    </form>
	<br>
	<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>
	<?php require 'view/footer.php'; ?>