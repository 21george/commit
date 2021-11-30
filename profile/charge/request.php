<?php

require_once ('./bootstrap.php');
require_once ('../../helpers/session_helper.php');
require_once ('../../helpers/cart_helper.php');
require_once ('../../helpers/url_redirect.php');

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

$payer = new Payer();
$payer->setPaymentMethod("paypal");

$subtotal=0;

if(!empty($_SESSION['shopping_cart'])){

    $count = count($_SESSION['shopping_cart']);
    for($i = 0; $i < $count; $i++){
         $item_sku = $_SESSION['shopping_cart'][$i]['id'];
         $item_price = floatval($_SESSION['shopping_cart'][$i]['price']);
        $item_quantity = intval($_SESSION['shopping_cart'][$i]['quantity']);

        $float_price = floatval($item_price);
        $int_quantity = intval($item_quantity);
        if($subtotal == 0){
             $subtotal = floatval($float_price * $int_quantity);
        }
        else{
            $subtotal += floatval($float_price * $int_quantity);
        }

        $items[$i] = new Item();
        $items[$i]->setName('Post Payment')
            ->setCurrency('AUD')
            ->setQuantity($item_quantity)
            ->setSku($item_sku) // Similar to `item_number` in Classic API
            ->setPrice($float_price);
    }
    
    
    $itemList = new ItemList();
    $itemList->setItems($items);
    
    $details = new Details();
    $details->setShipping(1.2)
        ->setTax(1.3)
        ->setSubtotal($subtotal);
    
         echo $set_total = $subtotal +1.2+1.3;
        $amount = new Amount();
    $amount->setCurrency("AUD")
        ->setTotal($set_total)
        ->setDetails($details);
    
        $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Post Payment Description")
        ->setInvoiceNumber(uniqid());

     
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($paypalConfig['return_url'])
            ->setCancelUrl(($paypalConfig['cancel_url']));
        
        
            $payment = new Payment();
            $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
            $request = clone $payment;
            try {
                $payment->create($apiContext);
            } catch (Exception $ex) {
                ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
            exit(1);
        }
        header('location:'.$payment->getApprovalLink());
         exit(1);
        // ResultPrinter::printResult("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);
        
        // return $payment;
        
        
        }
        else{
            redirect('profile/cart.php');
        }
?>