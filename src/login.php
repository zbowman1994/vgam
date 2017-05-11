<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<?php require 'view/header.html'; ?>

<button type="button" id="main"><a href="index.php">Main</a></button>
<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>
<button type="button" id="products"><a href = "productSelection.php">Products</a></button>
<button type="button" id="login"><a href = "login.php">Login</a></button>
                                                 

<?php require 'view/footer.php'; ?>


<h3>Login</h3>

<div class="container">
  <form action="/action_page.php">
    <label for="uname">Username:</label>
    <input type="text" id="uname" name="username" placeholder="Your username..">

    <label for="pass">Password:</label>
    <input type="text" id="pass" name="password" placeholder="Your password..">

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>

