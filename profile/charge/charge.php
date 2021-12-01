<?php 
require_once('../vendor/autoload.php');
require_once('../../config/config.php');
require_once('../../lib/Database.php');
require_once('../../helpers/url_redirect.php');
require_once('../../models/Customer.php');
require_once('../../models/Transaction.php');
//\Stripe\Stripe::setApiKey('sk_test_BQokikJOvBiI2HlWgH4olfQ2');
\Stripe\Stripe::setApiKey(''); // you have to put your owen key from PayPal  to Aviode miss founds(just have to create a Sandbox--account for pratcies uses (two key you need to crea)!)
$POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
$type="stripe";
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$user_id = $POST['customer_id'];
$token = $POST['stripeToken'];
$amount =(float)$POST['total_amount']*100;
$customer = \Stripe\Customer::create(array(
    "email" =>$email,
    "source" =>$token
));

$charge = \Stripe\Charge::create(array(
    "amount" =>$amount,
    "currency" =>"aud",
    "description" => "Ad Payment",
    "customer" =>$customer->id

));
//  print_r($charge);
//Customer data and methods
$customerData = ['id'=>$charge->customer,
'first_name' => $first_name,
'last_name' =>$last_name,
'email' =>$email,
'user_id' =>$user_id];

$customer = new Customer();
$customer->addStripeCustomer($customerData);


//Transaction data and methods
$transactionData = ['id'=>$charge->id,
'customer_id' => $charge->customer,
'product' =>$charge->description,
'amount' =>$charge->amount,
'currency' =>$charge->currency,
'status'=>$charge->status];

$transaction = new Transaction();
$transaction->addTransaction($transactionData);
redirect('profile/success.php?tid='.$charge->id.'&product='.$charge->description.'&amount='.$charge->amount.'&type='.$type)

?>
