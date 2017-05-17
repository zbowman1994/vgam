<?php require 'view/header.html'; ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<button type="button" id="products"><a href = "productSelection.php">Product Selection</a></button>


<br><h3>Contact Form</h3>
<div class="container">
    <form action="contactSubmit.php">
        <label for="fname"></label>First Name<br>
        <input type="text" id="fname" name="firstname" placeholder="Your first name.."><br>
        <label for="lname"></label>Last Name<br>
        <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br>
        <label for="country">Country<br></label>
        <select id="country" name="country">
            <option value="canada">Canada</option>
            <option value="australia">Australia</option>     
            <option value="usa">USA</option>
        </select><br>
        <label for="subject">Subject<br></label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea><br>
        <input type="submit" value="Submit"><a href = "contactSubmit.php"></a>
    </form>
</div>


<?php require 'view/footer.php'; ?>