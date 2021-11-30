<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";
require "../models/Post.php";
require "../models/Comment.php";
require "../models/Realestate.php";
require "../models/Job.php";
require "../models/Ad.php";

if(isset($_POST['unapproved_admin_comment'])){
   
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $comment_id = $POST ['comment_id'];
    $comment = new Comment;
    $unapproved = $comment->unapproveComment($comment_id);
        if($unapproved){
            $_SESSION['success'] ="You have unapproved the comment";
           redirect('admin/comments.php');
        }
        else{
            $_SESSION['fail'] ="You didnt unapproved the comment";
            redirect('admin/comments.php');
        }
}


if(isset($_POST['delete_admin_comment'])){
  
 

    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $comment_id = $POST ['comment_id'];
    $comment = new Comment;

    $deleteComment = $comment->deleteComment($comment_id);

    if($deleteComment){
        $_SESSION['success'] ="You have deleted the comment";
        redirect('admin/comments.php');
    }
    else{
        $_SESSION['fail'] ="You didnt delete the comment";
        redirect('admin/comments.php');
    }
    
}

if(isset($_POST['block_comment'])){
    // echo "Do something";
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
        $comment_id = $_POST['comment_id'];
        $comment = new Comment;
        $unapproved = $comment->unapproveComment($comment_id);
            if($unapproved){
                flashSuccess('success', 'You have successfully unapproved the comment');
               redirect('profile/comments');
            }
            else{
                flashSuccess('fail', 'You have not successfully unapproved the comment');
                redirect('profile/comments');
            }
}

if(isset($_POST['delete_comment'])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $comment_id = $_POST['comment_id'];
    $comment = new Comment;
        $deleteComment = $comment->deleteComment($comment_id);
    
        if($deleteComment){
            flashSuccess('success', 'You have successfully deleted the comment');
            redirect('profile/comments');
        }
        else{
            flashSuccess('fail', 'You have not deleted the comment');
            redirect('profile/comments');
        }
    
    
}






if(isset($_GET['pid']) && isset($_GET['type']) && $_GET['type']==="del"){
    $GET = filter_var_array($_GET,FILTER_SANITIZE_STRING);
    $post_id = $GET['pid'];
    $post = new Post();
    $estate = new Realestate();
    $job = new Job();
    $ad = new Ad();
    $findCat = $post->getPostByPostId($post_id);
    $cat_id = $findCat->post_cat_id;
    $deletePost = $post->deletePost($post_id);
    

    if($cat_id =="1"){
       
        $deleteEstate = $estate->deleteEstate($post_id);
    }else if($cat_id =="2"){
        $deleteJobs = $job->deleteJob($post_id);
    }else if($cat_id =="3"){
        echo "Delete cars but we don't have them at the moment";
        $deleteJobs = $job->deleteJob($post_id);
    }
    else{
        
        $deleteAds = $ad->deleteAd($post_id);
    }

    if($deletePost){
        flashSuccess('success', 'You have successfully deleted the Ad');
        redirect('profile/index.php?page=posts');
    }
    else{
        flashDanger('fail', 'You havent deleted the Ad');
        redirect('profile/index.php?page=posts');
    }

 
}

//deleting the posts from admin side
if(isset($_POST['delete_admin_post'])){
    //echo "Here is admin delete";


    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
     $post_id = $POST['post_id'];
    $post = new Post();
    $estate = new Realestate();
    $job = new Job();
    $ad = new Ad();
    $deletePost = $post->deletePost($post_id);
    $findCat = $post->getPostByPostId($post_id);
    $cat_id = $findCat->post_cat_id;
    if($cat_id =="1"){
        $deleteEstate = $estate->deleteEstate($post_id);
    }else if($cat_id =="2"){
        $deleteJobs = $job->deleteJob($post_id);
    }else if($cat_id =="3"){
        echo "Delete cars but we don't have them at the moment";
        //$deleteJobs = $job->deleteJob($post_id);
    }
    else{
        $deleteAds = $ad->deleteAd($post_id);
    }

    if($deletePost){
       // flashSuccess('success', 'You have successfully deleted the Ad');
       $_SESSION['success'] ="You have successfully deleted the Ad";
       redirect('admin/ads.php');
    }
    else{
       // flashDanger('fail', 'You havent deleted the Ad');
       $_SESSION['fail'] ="You havent deleted the Ad";
        redirect('admin/ads.php');
    }
}


if(isset($_POST['block_user'])){
    //echo "Ready to block the user";
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $user_id = $POST['user_id'];
    $user = new User;
    $blockUser = $user->blockUser($user_id);
   
    if($blockUser){
        $_SESSION['success'] ="You have successfully blocked user";
        redirect('admin/users.php');
    }
    else{
        $_SESSION['fail'] ="You have not block the user";
        redirect('admin/users.php');
    }
}
if(isset($_POST['unblock_user'])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $user_id =  $POST['user_id'];
    $user = new User;
    $unblockUser = $user->unblockUser($user_id);
   
    if($unblockUser){
        $_SESSION['success'] ="You have successfully unblocked user";
        redirect('admin/users.php');
    }
    else{
        $_SESSION['fail'] ="You have not unblock the user";
        redirect('admin/users.php');
    }
}


if(isset($_POST['delete_admin_user'])){
    // echo "Good to go";
    
        $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
        $user_id = $POST['user_id'];
        $user = new User;
        $deleteUser = $user->deleteUser($user_id);
        if($deleteUser){
            $_SESSION['success'] ="You have successfully deleted user";
            redirect('admin/users.php');
        }
        else{
            $_SESSION['fail'] ="You have not deleted the user";
            redirect('admin/users.php');
        }
    
}

?>