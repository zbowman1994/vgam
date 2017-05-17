<?php require 'view/header.html'; ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<button type="button" id="products"><a href = "productSelection.php">Product Selection</a></button>


<h3>Contact Form</h3>
<div class="container">
    <form action="contactSubmit.php">
        <label for="fname"></label>
        <input type="text" id="fname" name="firstname" placeholder="Your first name..">
        <label for="lname"></label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        <label for="country">Country</label>
        <select id="country" name="country">
            <option value="canada">Canada</option>
            <option value="australia">Australia</option>     
            <option value="usa">USA</option>
        </select>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        <input type="submit" value="Submit"><a href = "contactSubmit.php"></a>
    </form>
</div>


<?php require 'view/footer.php'; ?>