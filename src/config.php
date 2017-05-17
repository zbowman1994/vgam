<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_rLngtagWstKnw0AvDMganfDS",
  "publishable_key" => "pk_test_6OmnWM2956j8zpEnqPNgY80E"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>