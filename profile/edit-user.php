
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

   include (ROOT_PATH."profile/inc/edit-user-details.php");
   

?>

<!--Popup-->
<?php include (ROOT_PATH."profile/inc/popup.php");?>



</main>
    </div>
   <!--Footer-->
<?php include (ROOT_PATH."profile/inc/footer.php");?>
</div>
   <!--Footer-->
<?php include (ROOT_PATH."profile/inc/profile-scripts.php");?>