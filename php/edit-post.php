<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../models/Realestate.php";
require "../models/Img.php";
require "../models/Post.php";
require "../models/Category.php";
require "../models/Job.php";
require "../models/Ad.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";

if(isset($_POST['edit_realestate_post'])){

    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $user = new User;
    $real = new Realestate;
    $img = new Img;
    $post = new Post;


     $post_id = $POST['post_id'];
     $user_id = $_SESSION['user_id'];
     $post_title = $POST['post_title'];
     $post_cat_id = "1";
     $post_content = $POST['post_content'];
     $post_property_type = $POST['post_property_type'];
     $post_featured_img  = $img->uploadImg($_FILES['file']['name']);

     if(empty($post_featured_img)){
       
          $post_featured_img = $POST['post_featured_img'];
    }
     $num_beds = $POST['num_beds'];
     $num_parking = $POST['num_parking'];
     $num_toilets = $POST['num_toilets'];
     $sale_type = $POST['sale_type'];
     $num_showers = $POST['num_showers'];
     $advertised_price = $POST['advertised_price'];

    
    $data = array(
        "post_cat_id"=>$post_cat_id,
        "post_title"=>$post_title,
        "post_content"=>$post_content,
        "post_featured_img"=>$post_featured_img,
        "user_id"=>$user_id,
        "post_id"=>$post_id,
        "advertised_price"=>$advertised_price,
        "post_property_type"=>$post_property_type,
        "num_beds"=>$num_beds,
        "num_parking"=>$num_parking,
        "num_showers"=>$num_showers,
        "num_toilets"=>$num_toilets,
        "sale_type"=>$sale_type
    );
  //  print_r($data);
    $updatePost = $post->editPost($data);
    if($updatePost){

      
        $updateRealestate = $real->editRealestate($data);

        if($updateRealestate){
            flashSuccess('success','You have successfully edited the Post');
            redirect("profile/index.php?page=posts");
        }
       
    }
    else{
        flashDanger('fail','You have not edited the Post');
        redirect("profile/index");
    }
}
else{
    redirect("profile/index.php");
}

?>