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

if(isset($_POST['submit_realestate_post'])){

    $user = new User;
    $real = new Realestate;
    $img = new Img;
    $post = new Post;
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
     $user_id = $_SESSION['user_id'];
     $post_title = $POST['post_title'];
    
     $post_content = $POST['post_content'];
     $post_property_type = $POST['post_property_type'];
     $post_featured_img  = $img->uploadImg($_FILES['file']['name']);
     $full_address  =  $POST['full_address'];
     $post_type =$POST['post_type']; 
    $post_cat_id = "1";
   
     $post_status ="unpaid";
    
     $post_property_type = $POST['post_property_type'];
     $num_beds = $POST['num_beds'];
     $num_parking = $POST['num_parking'];
     $num_toilets = $POST['num_toilets'];
     $sale_type = $POST['sale_type'];
     $num_showers = $POST['num_showers'];
     $advertised_price = $POST['advertised_price'];

    $suburb = "";
    $suburb_details = trim($POST['suburb']); 
    $address_parts = explode(" ",$suburb_details);
    $address_num_parts = count($address_parts);
    $postcode = ($address_parts[$address_num_parts-1]);
    for($i = 0; $i < $address_num_parts -1; $i++){
        $suburb .= $address_parts[$i]." ";
    }
    if(strlen($suburb>0)){
        $suburb = substr($suburb,-1);
    }

    if(isset($POST['post_type']) && $POST['post_type']!="free"){

        $daysCalculated = trim($POST['daysCalculated']);
        $post_calculated_price = $POST['priceCalculated'];
        $post_start_date = trim($POST['startDate']);
        $post_end_date = trim($POST['endDate']);
    }
    else{
        $daysCalculated ="";
        $post_calculated_price=0;
        $post_start_date = date('Y-m-d');
        $post_end_date = date('Y-m-d',strtotime($post_start_date.'+30 days'));

    }
    
    $data = array(
        "post_cat_id"=>$post_cat_id,
        "post_title"=>$post_title,
        "post_content"=>$post_content,
        "post_featured_img"=>$post_featured_img,
        "user_id"=>$user_id,
        "post_status"=>$post_status,
        "post_type"=>$post_type,
        "full_address"=>$full_address,
        "suburb"=>$suburb,
        "postcode"=>$postcode,
        "post_start_date"=>$post_start_date,
        "post_end_date"=>$post_end_date,
        "advertised_price"=>$advertised_price,
        "post_property_type"=>$post_property_type,
        "num_beds"=>$num_beds,
        "num_parking"=>$num_parking,
        "num_showers"=>$num_showers,
        "num_toilets"=>$num_toilets,
        "sale_type"=>$sale_type
    );
    $addRealEstatePost = $real->insertRealestateAd($data);
    if($addRealEstatePost){

        $last_post_id = $post->getLastId();
      
        $addRealestate = $real->insertIntoRealestate($last_post_id->id,$data);
        $addPostPaymentRecord = $post->insertIntoPaymentRecords($last_post_id->id,$post_calculated_price,$user_id);
        if($addPostPaymentRecord  && $addRealestate ){
            flashSuccess('success','You have successfully added new Post');
            redirect("profile/index");
        }
       
    }
    else{
        flashDanger('fail','You have not added the Post');
        redirect("profile/index");
    }
}

if(isset($_POST['submit_job_post'])){

    $user = new User;

    $img = new Img;
    $post = new Post;
    $job = new Job;
    $cat = new Category();
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
     $user_id = $_SESSION['user_id'];
     $post_title = $POST['post_title'];
     $sub_title = $POST['sub_title'];
     $post_content = $POST['post_content'];
   
     $post_featured_img  = $img->uploadImg($_FILES['file']['name']);
     $full_address  =  $POST['full_address'];
     $post_type = $POST['post_type']; 
 
  
    $cat_title= "Jobs";
    $cat_id = $cat->getCatId($cat_title);
    $post_cat_id =  $cat_id->cat_id;
     $post_status ="unpaid";


    $job_occupation= $POST['job_classification'];
    $get_job_occ = $job->getOccupationName($job_occupation);
    $job_occupation_title = $get_job_occ->title;
    //to get the job name we only have id
    $job_name = $POST['specific_job'];
    $get_job_name = $job->getJobName($job_name);
    $job_title = $get_job_name->title;

    //end of job title
    $city = $POST['city'];
    $job_type= $POST['job_type'];
    $salary= $POST['salary'];
    $hourly_rate_from= $POST['hourly_rate_from'];
    $hourly_rate_to= $POST['hourly_rate_to'];
    $company_email= $POST['company_email'];
    $application_link= $POST['application_link'];

    $suburb = "";
    $suburb_details = trim($POST['suburb']); 
    $address_parts = explode(" ",$suburb_details);
    $address_num_parts = count($address_parts);
    $postcode = ($address_parts[$address_num_parts-1]);
    for($i = 0; $i < $address_num_parts -1; $i++){
        $suburb .= $address_parts[$i]." ";
    }
    if(strlen($suburb>0)){
        $suburb = substr($suburb,-1);
    }

    if(isset($POST['post_type']) && $POST['post_type']!="free"){

        $daysCalculated = trim($POST['daysCalculated']);
        $post_calculated_price = $POST['priceCalculated'];
        $post_start_date = trim($POST['startDate']);
        $post_end_date = trim($POST['endDate']);
    }
    else{
        $daysCalculated ="";
        $post_calculated_price=0;
        $post_start_date = date('Y-m-d');
        $post_end_date = date('Y-m-d',strtotime($post_start_date.'+30 days'));

    }
    
    $data = array(
        "post_cat_id"=>$post_cat_id,
        "post_title"=>$post_title,
        "sub_title"=>$sub_title,
        "post_content"=>$post_content,
        "post_featured_img"=>$post_featured_img,
        "user_id"=>$user_id,
        "post_status"=>$post_status,
        "post_type"=>$post_type,
        "full_address"=>$full_address,
        "suburb"=>$suburb,
        "postcode"=>$postcode,
        "post_start_date"=>$post_start_date,
        "post_end_date"=>$post_end_date,
        "job_occupation"=>$job_occupation_title,
        "job_name"=>$job_title,
        "city"=>$city,
        "job_type"=>$job_type,
        "salary"=>$salary,
        "hourly_rate_from"=>$hourly_rate_from,
        "hourly_rate_to"=>$hourly_rate_to,
        "company_email"=>$company_email,
        "application_link"=>$application_link,
    );
    //print_r($data);

    $addPost = $post->insertPost($data);
    if($addPost){

        $last_post_id = $post->getLastId();
        $insertJob = $job->insertIntoJobs($last_post_id->id,$data);
        $addPostPaymentRecord = $post->insertIntoPaymentRecords($last_post_id->id,$post_calculated_price,$user_id);
        if($addPostPaymentRecord  && $insertJob ){
            flashSuccess('success','You have successfully added new Job Ad');
            redirect("profile/index");
        }
       
    }
    else{
        flashDanger('fail','You have not added the Post');
        redirect("profile/index");
    }
}


if(isset($_POST['submit_new_post'])){
   
 $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $user = new User;

    $img = new Img;
    $post = new Post;
    $job = new Job;
    $cat = new Category();
    $ad = new Ad();
     $user_id = $_SESSION['user_id'];
     $post_title = $POST['post_title'];
     $post_content = $POST['post_content'];
     $post_featured_img  = $img->uploadImg($_FILES['file']['name']);
     $full_address  =  $POST['full_address'];
     $post_type = $POST['post_type']; 
     $post_cat_id =  $POST['post_cat_id'];
     $post_status ="unpaid";

     $email = $POST["email"];
     $item_condition = $POST['condition'];
      $contact_name = $POST["contact_name"];
     $contact_number = $POST['contact_number'];
     $item_price = $POST["post_price"];
     
     if($item_price =="" || $item_price=="0"){
         $item_price= $POST["radio_price"];
     }
    


     $city = $POST['city'];
    

    $suburb = "";
    $suburb_details = trim($POST['suburb']); 
    $address_parts = explode(" ",$suburb_details);
    $address_num_parts = count($address_parts);
    $postcode = ($address_parts[$address_num_parts-1]);
    for($i = 0; $i < $address_num_parts -1; $i++){
        $suburb .= $address_parts[$i]." ";
    }
    if(strlen($suburb>0)){
        $suburb = substr($suburb,-1);
    }

    if(isset($POST['post_type']) && $POST['post_type']!="free"){

        $daysCalculated = trim($POST['daysCalculated']);
        $post_calculated_price = $POST['priceCalculated'];
        $post_start_date = trim($POST['startDate']);
        $post_end_date = trim($POST['endDate']);
    }
    else{
        $daysCalculated ="";
        $post_calculated_price=0;
        $post_start_date = date('Y-m-d');
        $post_end_date = date('Y-m-d',strtotime($post_start_date.'+30 days'));

    }
    
    $data = array(
        "post_cat_id"=>$post_cat_id,
        "post_title"=>$post_title,
        "post_content"=>$post_content,
        "post_featured_img"=>$post_featured_img,
        "user_id"=>$user_id,
        "post_status"=>$post_status,
        "post_type"=>$post_type,
        "full_address"=>$full_address,
        "suburb"=>$suburb,
        "postcode"=>$postcode,
        "post_start_date"=>$post_start_date,
        "post_end_date"=>$post_end_date,
        "city"=>$city,
        "contact_name"=>$contact_name,
        "contact_number"=>$contact_number,
        "item_condition"=>$item_condition,
        "item_price"=>$item_price,
        "email"=>$email
    );
    //print_r($data);

    $addPost = $post->insertPost($data);
    if($addPost){

        $last_post_id = $post->getLastId();
        $insertAd = $ad->insertNewAd($last_post_id->id,$data);
        $addPostPaymentRecord = $post->insertIntoPaymentRecords($last_post_id->id,$post_calculated_price,$user_id);
        if($addPostPaymentRecord  && $insertAd ){
            flashSuccess('success','You have successfully added new Ad');
            redirect("profile/index");
        }
       
    }
    else{
        flashDanger('fail','You have not added the Post');
        redirect("profile/index");
    }
}
?>