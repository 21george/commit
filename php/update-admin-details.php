<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../models/Realestate.php";
require "../models/Img.php";
require "../models/Post.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";

if(isset($_POST['update_admin_details'])){
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);

     $user_occupation =$POST['user_occupation'];
     $user_gender =$POST['user_gender'];
     $user_bio =$POST['user_bio'];
     $user_exp =$POST['user_exp'];
     $user_firstname =$POST['user_firstname'];
     $user_lastname =$POST['user_lastname'];
     $user_phone =$POST['user_phone'];
  

 
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
        "user_id"=>$user_id
    );
    //print_r($data);

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
     echo $query = "UPDATE users SET ".$string." WHERE user_id =:user_id";


    $updateUser = $user->updateUserDetails($query,$data);

     if($updateUser){
         flashSuccess('success',"You have successfully updated user details");
         redirect('admin/index');
     }
     else{
        flashDanger('fail',"You have not successfully updated user details");
        redirect('profile/index');
     }

    }

?>