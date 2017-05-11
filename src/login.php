<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<?php require 'view/header.html'; ?>

<button type="button" id="main"><a href="index.php">Main</a></button>
<button type="button" id="contactus"><a href = "contact.php">Contact Us</a></button>
<button type="button" id="products"><a href = "productSelection.php">Products</a></button>
<button type="button" id="login"><a href = "login.php">Login</a></button>
                                                 

<?php require 'view/footer.php'; ?>

<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 5px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.container {
    padding: 16px;
}

span.psw {
    float: left;
    padding-top: 16px;
}

</style>

<div class="container">
  <form action="/action_page.php">
    
    <div class="container">
        <label for="f_name"><b>First Name:</b></label>
    <input type="text" placeholder="Your First Name.." id="f_name" name="f_name" required>
      
        <label for="l_name"><b>Last Name:</b></label>
      <input type="text" placeholder="Your Last Name.." id="l_name" name="l_name" required>
      
      
        <label for="address"><b>Address:</b></label>
      <input type="text" placeholder="Your Address.." id="address" name="address">
      
      
        <label for="email"><b>Email:</b></label>
       <input type="text" placeholder="Your Email.." id="email" name="email" required>
    

        <label for="password"><b>Password:</b></label>
    <input type="password" placeholder="Your password.." id="password" name="password" required>

        <button type="submit">Login</button>
        <input type="checkbox" checked="checked"> Remember Me
      </div>
      
       <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
      
      </div>
    </form>



