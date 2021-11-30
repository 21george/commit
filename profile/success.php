
<?php include("../bootstrap.php");?>
<?php 
include(ROOT_PATH."models/Transaction.php");
$transaction = new Transaction();
$user_id = $_SESSION['user_id'];

if(!empty($_GET['tid']) && !empty($_GET['amount']) && !empty($_GET['type'])){

    $GET = filter_var_array($_GET,FILTER_SANITIZE_STRING);
    $type = $GET['type'];
    if($type == "stripe"){
        // echo "Stripe payment has been done";
            $tid = $GET['tid'];
            $product = $GET['product'];
            $amount = $GET['amount'];
            $formatedAmount = sprintf('%.2f',$amount/100);
         $count = count($_SESSION['shopping_cart']);
         if(!empty($count)){
             foreach($_SESSION['shopping_cart'] as $key =>$post_product){
                //  echo "The id is".$post_product['id']."<br>";
                //  echo $post_product['price']."<br>";
                $post_paid_status="PAID";
               $transaction->addPaidTransaction($post_product['id'],$post_product['price'],$user_id,$tid,$type);
                $transaction->updatePaidTransactionPost($post_product['id'],$user_id,$post_paid_status);

             }
         }
         else{
             redirect('profile/cart');
         }

         if(!empty($count)){
            foreach($_SESSION['shopping_cart'] as $key =>$post_product){
              unset($_SESSION['shopping_cart'][$key]);
            }
        }
       
    }
    else if($type =='paypal'){
                // echo "PayPal payment has been done";
                $tid = $GET['tid'];
             
               $amount = $GET['amount'];
               
             $count = count($_SESSION['shopping_cart']);
             if(!empty($count)){
                 foreach($_SESSION['shopping_cart'] as $key =>$post_product){
                    //  echo "The id is".$post_product['id']."<br>";
                    //  echo $post_product['price']."<br>";
                    $post_paid_status="PAID";
                    $transaction->addPaidTransaction($post_product['id'],$post_product['price'],$user_id,$tid,$type);
                    $transaction->updatePaidTransactionPost($post_product['id'],$user_id,$post_paid_status);
    
                 }
             }
             else{
                 redirect('profile/cart');
             }
    
             if(!empty($count)){
                foreach($_SESSION['shopping_cart'] as $key =>$post_product){
                  unset($_SESSION['shopping_cart'][$key]);
                }
            }
    }
}
else{
    redirect("profile/cart");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://fonts.googleapis.com/css?family=Lato:100,400,700|Nunito+Sans:300,400,700|Open+Sans:300,400,700|Roboto:100,300,400,700" rel="stylesheet"> 
<!-- CSS styles -->

<link rel="stylesheet" type="text/css" href="vendors/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="vendors/font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/profile.css">

<title>Profile Admin, manage your ads, payment and campaigns from one place</title>
</head>
<body>

<div class="container-fluid my-flex-container">

<div class="content d-flex">



<main class="content-center text-center" >
<div class="jumbotron text-xs-center " style="height:100vh">
    <svg style="height:8rem; width:8rem; fill:rgb(49,179,49); " class="mar-bt3">

        <use xlink:href="img/SVG/symbol-defs.svg#icon-check-circle"></use>
    </svg>
    <h1 class="display-3 mar-bt3">Thank You!</h1>
    <h2 class="display-4">Thanks for your payment!</h2>
    <p class="lead"><strong>Please check your email</strong> for further instruction and questions contact us</p>

    <div class="text-center mar-bt3">
        <p class="lead">This is your Transaction <strong>id: <?php echo $tid;?></strong></p>
        <p class="lead">This is amount paid: <strong>$<?php echo $amount;?></strong></p>
        <p class="lead">You can view your transactions here <a href="transactions.php"
             class="btn btn-outline-success">My Payments</a></p>
    </div>
    <p >Having trouble? <a href="index.php">Contact Us</a></p>
    <hr>
    <p class="lead"><a href="index.php"
        class="btn btn-success btn-lg font-lg2 padding-lg" role="button">Continue to homepage</a></p>
</div>

</main>
</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="vendors/js/bootstrap.min.js"></script>  


</body>
</html>
