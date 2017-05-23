<?php require 'view/header.html'; ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<button type="button" id="products"><a href = "productSelection.php">Product Selection</a></button>


<br><br>
    <form action="contactSubmit.php" id="contact" method="post">
	<h2>Contact Form</h2>
        <label for="fname"></label>First Name<br>
        <input type="text" id="fname" name="firstname" placeholder="Your first name.." required><br><br>
        <label for="lname"></label>Last Name<br>
        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required><br><br>
		<label for="email"></label>Your Email<br>
        <input type="email" id="email" name="email" placeholder="Your email.." required><br><br>
        <label for="country">Country<br></label>
        <select id="country" name="country">
            <option value="canada">Canada</option>
            <option value="australia">Australia</option>     
            <option value="usa">USA</option>
			<option value="other">Other</option>
        </select><br><br>
        <label for="subject" required>Subject<br></label>
        <textarea id="subject" name="subject" placeholder="Write something.." rows="17" cols="35" required></textarea><br>
        <input type="submit" value="Submit" id="submitContact"><a href = "contactSubmit.php"></a>
    </form>



<?php require 'view/footer.php'; ?>