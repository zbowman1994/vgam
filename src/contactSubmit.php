<?php 
require 'view/header.html'; 
require_once 'vendor/autoload.php';
require_once('config.php');
$fullName = $_POST['firstname'] . $_POST['lastname'];
$email = $_POST['email'];
$subject = $_POST['subject'];

$mail = new PHPMailer; // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // 465 or doesnt like 587
$mail->IsHTML(true);
$mail->Username = "ics199grp00@gmail.com";
$mail->Password = "ics199vgam";
$mail->SetFrom("ics199grp00@gmail.com");
$mail->Subject = "Email recieved";

$mail->Body = 'This is an automated email to confirm your message has been recieved.<br>
Below is a copy of the information we recieved:<br><br>
Message sent: ' . $subject . '<br><br>From: ' . $email . '<br><br>Customer name: ' . $fullName . '<br><br>
We will get back to you shortly';
$mail->AddAddress("ics199grp00@gmail.com");
$mail->AddCC($email);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo '<h2 style="background-color: black; color: cornflowerblue;">Thank you ' . $fullName . ' for reaching out.<br>
	We will get back to you as soon as we can at the following address ' . $email . '.</h2><br><br>';
 }
?>
<link rel="stylesheet" type ="text/css" href="css/style.css" > 
<button type="button" id="products"><a href = "productSelection.php">Products</a></button>
<br><br><br>
<?php require 'view/footer.php'; ?>