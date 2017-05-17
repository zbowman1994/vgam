<?php
require_once('config.php');
require('PHPMailer/PHPMailerAutoload.php');
    
$token  = filter_input(INPUT_POST, 'stripeToken', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'stripeEmail', FILTER_VALIDATE_EMAIL);
$amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);
	

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "ics199grp00@gmail.com";
$mail->Password = "ics199vgam";
$mail->SetFrom("example@gmail.com");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("nathanmackenzie92@gmail.com");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
	
	$customer = \Stripe\Customer::create(array(
			'email' => $email,
			'source' => $token
));
		
	$charge = \Stripe\Charge::create(array(
	'customer' => $customer->id,
	'amount' => $amount,
		'currency' => 'cad'
	));
	
	$amount = number_format(($amount / 100), 2);
	
	echo "<h1>Successfully charged $amount!</h1>";
?>
