<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";

function registration(){
    //create an instance of User class
    $user = new User();

    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $user_email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $user_password = $_POST['password'];
    $data = [
        'user_name' => $username,
        'user_email' => $user_email,
        'user_password' => $user_password,
        'user_role' => 'subscriber'
    ];

    $data['user_password'] = password_hash($data['user_password'], PASSWORD_DEFAULT);
   // print_r($data);

   $user_registration = $user->register($data);

   if($user_registration){
    //    echo "User registered";
    //    header("Location: ../index.php");
    msg('register_success', 'You are registered and now you can log in');
    redirect('login');
   }
   else{
       //echo "User not registered";
       msgDanger('register_fail', 'Something went wrong, please try again');
       redirect('registration');
   }
}

registration();




?>