
<?php include ("../bootstrap.php");?>

<!--Head -->
<?php include (ROOT_PATH."profile/inc/head.php");?>

<div class="container-fluid my-flex-container">
   <!--Header -->
<?php include (ROOT_PATH."profile/inc/header.php");?>

    <div class="content d-flex">
      
<!--Sidebar -->
<?php include (ROOT_PATH."profile/inc/sidebar.php");?>

<main class="content-center ">
<!--Search Box -->
<?php include (ROOT_PATH."profile/inc/search-box.php");?>

<?php 

   include (ROOT_PATH."profile/inc/section-cart.php");

?>
<!--Price Boxes -->
<?php //include (ROOT_PATH."profile/inc/price-boxes.php");?>

<!--Section for displaying all of our posts-->
<?php //include (ROOT_PATH."profile/inc/active-posts.php");?>
        
<!--Popup-->
<?php include (ROOT_PATH."profile/inc/popup.php");?>

<!--Profile Form goes here-->

<?php //include (ROOT_PATH."profile/inc/form.php");?>
    
   <!-- Section Cart-->

<?php //include (ROOT_PATH."profile/inc/section-cart.php");?>

<!-- Live Search-->
<?php //include (ROOT_PATH."profile/inc/live-search.php");?>

<!-- Display Messages -->
<?php //include (ROOT_PATH."profile/inc/display-msg.php");?>


<!--Section for adding the posts to cart-->
<?php //include (ROOT_PATH."profile/inc/unpaid-posts.php");?>


    
</main>
    </div>
   <!--Footer-->
<?php include (ROOT_PATH."profile/inc/footer.php");?>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="./js/charge.js"></script>
   <!--Footer-->
<?php include (ROOT_PATH."profile/inc/profile-scripts.php");?>