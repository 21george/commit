<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../models/Realestate.php";
require "../models/Img.php";
require "../models/Post.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";

if(isset($_POST['update_user'])){

    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
     $user_occupation =$POST['user_occupation'];
     $user_gender =$POST['user_gender'];
     $user_bio =$POST['user_bio'];
     $user_exp =$POST['user_exp'];
     $user_firstname =$POST['user_firstname'];
     $user_lastname =$POST['user_lastname'];
     $user_phone =$POST['user_phone'];
     $user_linkedin = $POST['user_linkedin'];
     $user_gplus =$POST['user_gplus'];

    $user_suburb = "";
    $user_postcode = "";
    $user_suburb_details = trim($POST['suburb']); 
    $address_parts = explode(" ",$user_suburb_details);
    $address_num_parts = count($address_parts);
    "The postciode".$user_postcode = ($address_parts[$address_num_parts-1]);
    for($i = 0; $i < $address_num_parts -1; $i++){
         $user_suburb .= $address_parts[$i]." ";
    }
    if(strlen($user_suburb>0)){
         $user_suburb = substr($user_suburb,-1);
    }

    $userData = array();
    $data = array();
    $user_id = $_SESSION['user_id'];

    $data = array(
        "user_firstname"=>$user_firstname,
        "user_lastname" =>$user_lastname,
        "user_occupation"=>$user_occupation,
        "user_gender"=>$user_gender,
        "user_exp"=>$user_exp,
        "user_bio"=>$user_bio,
        "user_phone"=>$user_phone,
        "user_linkedin"=>$user_linkedin,
        "user_gplus"=>$user_gplus,
        "user_suburb"=>$user_suburb,
        "user_postcode"=>$user_postcode,
        "user_id"=>$user_id
    );

    if($user_firstname!=""){
        array_push($userData,"user_firstname");
    }
    else{
        unset($data["user_firstname"]);
    }
    
    if($user_lastname!=""){
        array_push($userData,"user_lastname");
    }
    else{
        unset($data["user_lastname"]);
    }
    if($user_occupation!=""){
        array_push($userData,"user_occupation");
    }
    else{
        unset($data["user_occupation"]);
    }
    if($user_gender!="" && $user_gender!="default"){
        array_push($userData,"user_gender");
    }
    else{
        unset($data["user_gender"]);
    }
    if($user_exp!="" && $user_exp!=0){
        array_push($userData,"user_exp");
    }
    else{
        unset($data["user_exp"]);
    }
    if($user_bio!=""){
        array_push($userData,"user_bio");
    }
    else{
        unset($data["user_bio"]);
    }
    if($user_gplus!=""){
        array_push($userData,"user_gplus");
    }
    else{
        unset($data["user_gplus"]);
    }
    if($user_linkedin!=""){
        array_push($userData,"user_linkedin");
    }
    else{
        unset($data["user_linkedin"]);
    }
    if($user_postcode!=""){
        array_push($userData,"user_postcode");
    }
    else{
        unset($data["user_postcode"]);
    }
    if($user_suburb!=""){
        array_push($userData,"user_suburb");
    }
    else{
        unset($data["user_suburb"]);
    }

    if($user_phone!=""){
        array_push($userData,"user_phone");
    }
    else{
        unset($data["user_phone"]);
    }

 
    //print_r($data);
    function arrayString($userData){
        $string = "";
        foreach($userData as $key=>$value){
            $string .=" ".$value." =:".$value.","; 
        }
        return $string;
    }
    $string = arrayString($userData);
     $string = substr($string,0,-1);
     $user = new User;
     $query = "UPDATE users SET ".$string." WHERE user_id =:user_id";


    $updateUser = $user->updateUserDetails($query,$data);

     if($updateUser){
         flashSuccess('success',"You have successfully updated user details");
         redirect('profile/index');
     }
     else{
        flashDanger('fail',"You have not successfully updated user details");
        redirect('profile/index');
     }

    }

?>