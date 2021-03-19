<?php
require_once('./vendor/autoload.php');

\Stripe\Stripe::setApiKey('sk_test_51IWo1NLVREWMGHkpJcBuKjxlKSMNhD5nPXRNDcbe62IC2TJXBXe3aNooygpiSr6CETAw1wlQRWHULMpBl2ONQYx300PDH5lJep');

// Sanitize POST array

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

// Create customer in Strip
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge customer
$charge = \Stripe\Charge::create(array(
  "amount" => 5000,
  "currency" => "usd",
  "description" => "Intro to PHP Course",
  "customer" => $customer->id
));

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);
