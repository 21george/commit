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
    <link rel="stylesheet" type="text/css" href="css/stripe.css">
      <!-- Bootstrap Tokenfield -->
      <script src="vendors/js/jquery-3.4.0.min.js"></script> 
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
      <link rel="stylesheet" type="text/css" href="vendors/tokenfield/css/bootstrap-tokenfield.min.css">
      
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
      <script src="vendors/tokenfield/bootstrap-tokenfield.min.js"></script>

        <!-- Summernote links -->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>

    <title>Profile Admin, manage your ads, payment and campaigns from one place</title>
</head>
<body>
<?php 
if(isset($_SESSION['user_role'])){
    $role = $_SESSION['user_role'];
    if($role !="subscriber"){
        redirect("php/logout.php");
    }

}
?>
<?php if(!isLoggedIn()):?>
<?php redirect("login.php");?>
<?php endif;?>
<?php echo flashSuccess('success');?>
<?php echo flashDanger('fail');?>
