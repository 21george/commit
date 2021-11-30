<?php
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require_once('./bootstrap.php');
require_once('../../config/config.php');
require_once('../../lib/Database.php');
require_once('../../helpers/url_redirect.php');
require_once('../../models/Transaction.php');
if(empty($_GET['paymentId']) || empty($_GET['PayerID'])){
    throw new Exception('The response is missing the paymentId and PayerID');
}
$paymentId = $_GET['paymentId'];
$payment = Payment::get($paymentId,$apiContext);

$execution = new PaymentExecution();
$execution->setPayerId($_GET['PayerID']);
try{
    $payment->execute($execution,$apiContext);
    try{
        $payment = Payment::get($paymentId,$apiContext);
        $transaction = new Transaction();
        $data = [
            'transaction_id' => $payment->getId(),
            'payment_amount' => $payment->transactions[0]->amount->total,
            'payment_status' => $payment->getState(),
            'invoice_id' => $payment->transactions[0]->invoice_number,
            'type' =>'paypal'
        ];

        if($transaction->addPayment($data)!== false && $data['payment_status'] ==='approved'){
            redirect('profile/success.php?tid='.$data['transaction_id'].'&amount='.$data['payment_amount'].'&type='.$data['type']);
        }
        

    }
    catch(Exception $e){
        //failed to retrieve payment from PayPal
    }
}
catch(Exception $e){
    //failed to make payment
}
?>