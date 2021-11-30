<?php 
require_once("../models/Post.php");
require_once("../models/Img.php");
require_once("../models/Realestate.php");
require_once("../models/Job.php");
require_once("../models/Category.php");
require_once("../models/Ad.php");
require_once("../models/User.php");
require_once("../models/Visitor.php");
if(isset($_GET['pid'])){

    $post = new Post;
   
    $user = new User;
    $img = new Img;
    $realestate = new Realestate;
    $cat = new Category;
    $job = new Job;
    $ad = new Ad;
    $GET = filter_var_array($_GET,FILTER_SANITIZE_STRING);
    $post_id = $GET['pid'];
   $postInfo = $post->getPostUserInfo($post_id);
   $post_category = $cat->getCategoryNameRow($postInfo->post_cat_id);
   $cat_name = $post_category->cat_title;
   $userOwner=false;

   $lastSeenSeconds = $user->getUserSeen($postInfo->user_id);
   $currentTime = time();
  
    $timeAgo = strtotime($lastSeenSeconds->last_seen);
     $timePassed = $currentTime - $timeAgo;
   //print_r($lastSeenSeconds);
   if(isset($_SESSION['user_id'])){
       $theUser_id = $_SESSION['user_id'];
       if($theUser_id == $postInfo->user_id){
           $userOwner=true;
       }
   }

   if($cat_name!="Realestate" && $cat_name!="Jobs" && $cat_name!="Cars"){
       $original_name = $cat_name;
       $cat_name = "Others";
   }

   switch($cat_name){
       case "Realestate";
     
       $real = $realestate->getRealEstatePost($post_id);
       break;
       case "Jobs";
       $thisJob = $job->getJobByPostId($post_id);
    //    print_r($thisJob);
       break;

       case "Others";
       $thisAd = $ad->getThisAdByPostId($post_id);
       //print_r($thisAd);
       break;
   }
   $post_featured_image =trim($postInfo->post_featured_img);
    $image_numb = $img->getPostImages($post_featured_image);
   $post_featured_image_pieces = $img->getAllImages($post_featured_image);
  

   require_once("page-counter.php");
   
   $totalPageViews = $pageView->getPageViews($post_id);
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
    <link rel="stylesheet" type="text/css" href="css/post.css">

    <title>View All Categories, See You Realestate, Jobs and Much More </title>
</head>
<body class="post-container">
