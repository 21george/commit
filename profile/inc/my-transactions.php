<?php 

require_once('../models/Transaction.php');

require_once('../models/Post.php');
$tran = new Transaction;
$post  = new Post;

$transactions = $tran->getAllTransactions($user_id);
?>

<table class="table table-striped table-bordered mt-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><h5>Transaction id TID</h5></th>
      <th scope="col"><h5>Post Id</h5></th>
      <th scope="col"><h5>Price Paid</h5></th>
      <th scope="col"><h5>Payment Method</h5></th>
      <th scope="col"><h5>Date Paid</h5></th>
    </tr>
  </thead>
  <tbody>
<?php foreach($transactions as $t):?>
    <tr>
      <th scope="row"><small><?php echo $t->tid;?></small></th>
      <th><small><?php echo $t->post_id;?></small></th>
      <th><small><?php echo $t->post_calculated_price;?></small></th>
      <th><small><?php echo $t->type;?></small></th>
      <th><small><?php echo $t->date_paid;?></small></th>
    </tr>
    
<?php endforeach;?>
  </tbody>
</table>