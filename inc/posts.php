<?php
require_once('models/Post.php');
require_once('models/User.php');
require_once('models/Img.php');
require_once('models/Category.php');
require_once('models/Realestate.php');
require_once('models/Job.php');
require_once('models/Ad.php');

$post = new Post();
$user = new User();
$cat = new Category();
$real = new Realestate();
$img = new Img();
$job = new Job();
$ad = new Ad();
$post_type="free";
$post_status="PAID";

$posts = $post->getAllFreePosts($post_type);
$paidPosts = $post->getAllPaidPosts($post_status,$post_type);
//print_r($posts);
// print_r($paidPosts);
$postCount = $post->getPostCount();

if($postCount ==0){
   require_once("inc/template-starter-posts.php");
}
else{
    echo '<section class="section-main">
    <div class="container-fluid">
        <div class="row">
   
            <div class="col-md-12 text-center">
                <h2 class="secondary-heading">Featured Listings</h2>
            </div>';
}
?>


<?php foreach($paidPosts as $p):?>

<?php

$user_id =$p->user_id;

$post_category = $cat->getCategoryNameRow($p->post_cat_id);
 $cat_name = $post_category->cat_title;

 if($cat_name !="Realestate" && $cat_name!="Jobs" && $cat_name!="Cars"){
     $originalCategoryName =$cat_name;
     $cat_name = "Others";
 }

 switch($cat_name){

    case "Realestate";
        $getRealEstate = $real->getRealestatePost($p->post_id);
        // print_r($getRealEstate);
        $getOwner = $user->getUserById($user_id);
        include('realestate-post.php');
        //print_r($getOwner);
    break;

    case "Jobs";

    $getJobs = $job->getJobPost($p->post_id);
  
    // print_r($getRealEstate);
    $getOwner = $user->getUserById($user_id);
    include('job-post.php');
    //print_r($getOwner);
break;

    case "Others";
        $getOthers = $ad->getOtherCatPost($p->post_id);
        $getOwner = $user->getUserById($user_id);
        include('other-post.php');
    break;
 }
?>

<?php endforeach;?>


<!--loop through free posts -->
<?php foreach($posts as $p):?>

<?php

$user_id =$p->user_id;
$post_category = $cat->getCategoryNameRow($p->post_cat_id);
 $cat_name = $post_category->cat_title;

 if($cat_name !="Realestate" && $cat_name!="Jobs" && $cat_name!="Cars"){
     $originalCategoryName =$cat_name;
     $cat_name = "Others";
 }

 switch($cat_name){
    

    case "Realestate";

        $getRealEstate = $real->getRealestatePost($p->post_id);
      
        // print_r($getRealEstate);
        $getOwner = $user->getUserById($user_id);
        include('realestate-post.php');
        //print_r($getOwner);
    break;

    
    case "Jobs";

        $getJobs = $job->getJobPost($p->post_id);
      
        // print_r($getRealEstate);
        $getOwner = $user->getUserById($user_id);
        include('job-post.php');
        //print_r($getOwner);
    break;

    case "Others";
        $getOthers = $ad->getOtherCatPost($p->post_id);
        $getOwner = $user->getUserById($user_id);
        include('other-post.php');
    break;
 }
?>

<?php endforeach;?>
</div>
</section>