

<?php include("../bootstrap.php");?>

    <!-- Head -->

<?php include (ROOT_PATH."admin/inc/head.php");?>
    <!-- Left Panel -->

    <?php include (ROOT_PATH."admin/inc/left-panel.php");?>

    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

    <?php include (ROOT_PATH."admin/inc/header.php");?>
   
    <?php include (ROOT_PATH."admin/inc/breadcrumbs.php");?>
    <?php include (ROOT_PATH."admin/inc/display-msg.php");?>

<div class="content mt-3">

<?php 
require "../models/Transaction.php";
$payment = new Transaction;
$allTransactions = $payment->getAllPaidTransactions();
?>



<div class="animated fadeIn">
                <div class="row">
            
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Comments table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Payment Id</th>
                                            <th scope="col">Post Id</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">User Id </th>
                                            <th scope="col">Transaction Id</th>
                                            <th scope="col">Payment type</th>
                                            <th scope="col">Date Paid</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($allTransactions as $all):?>
                                        <tr>
                                            <td ><?php echo $all->post_payment_id;?></td>
                                            <td ><?php echo $all->post_id;?></td>
                                            <td ><?php echo $all->post_calculated_price;?></td>
                                            <td ><?php echo $all->user_id;?></td>
                                            <td ><?php echo $all->tid;?></td>
                                            <td ><?php echo $all->type;?></td>
                                            <td ><?php echo $all->date_paid;?></td>               
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- .animated -->
    </div>
</div>
  
    <!-- Right Panel -->
    <?php include (ROOT_PATH."admin/inc/footer-scripts.php");?>