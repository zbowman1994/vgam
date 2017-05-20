<?php
session_start(); 
require 'view/header.html'; 
require_once 'model/db_connect.php';
require_once 'model/db_functions.php';
require_once 'vendor/autoload.php';
require_once('config.php');
$sessionId = $_SESSION['count'];
$cart = getCart($sessionId);
$total = getTotal($sessionId);

    
$token  = filter_input(INPUT_POST, 'stripeToken', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'stripeEmail', FILTER_VALIDATE_EMAIL);
$amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);
	

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
$mail->Subject = "Thank you for your purchase!";
//this works for a foreach loop

$mail->Body = '<h1>Video Games and More</h1>';
$mail->Body = '<p>Thank you for your purchase!</p>';
$mail->Body = '<table align="center"><thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>	
        </tr>
    </thead><tbody';
foreach ($cart as $item) {
$mail->Body .= '<tr><td>' . $item['product_name'].'</td><td>' . $item['product_price']. '</td><td>' . $item['quantity']. '</td></tr>';
}
$mail->Body .= 'You total was <tr>';
foreach ($total as $charge) { 
$mail->Body .= '<td>' . (round(($charge['total'] * 0.15 + $charge['total']), 2)). '</td></tr></tbody></table>';
}
$mail->AddAddress($email);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "You will recieve a confirmation email shortly";
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
<table>
</tr>
  <?php foreach ($cart as $item) { ?>
        <tr>
                <td><?php echo $item['product_name']; ?><input type="hidden" name="product_name" value="<?php echo $item['product_name']; ?>"></td>
                <td>$<?php echo $item['product_price']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                </tr>
        
   <?php } ?> 
</tr>   
    <tr>
        <?php foreach ($total as $amount) { ?> 
		<?php $cost = (round(($amount['total'] * 0.15 + $amount['total']), 2)); ?>
            <td>Subtotal:  $<?php echo $amount['total']; ?></td>
            <td>Total:  $<?php echo $cost; ?></td>
			<?php $amount = $cost * 100; ?>
        <?php } ?>
		</tr>
		</table>