<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";


function login(){

    $user = new User;

    $email = filter_var($_POST['login-email'],FILTER_SANITIZE_EMAIL);
    $form_password = $_POST['login-password'];
    $exists =$user->findUserByEmail($email);
   
    if($exists){
        $db_role = $exists->user_role;
        $db_password = $exists->user_password;

        if($db_role ==="admin"){
            if(password_verify($form_password, $db_password)){
                $login = $user->userLogin($email,$db_password);
                if($login){
                    $loggedInUser = createUserSession($login);
                    echo json_encode(['msgcode' => 'success', 'msg'=> 'admin/index']);
                }
                else{
                    echo json_encode(['msgcode' => 'no_password', 'msg'=> 'Please enter correct password admin!']);
                }
            }
            else{
                echo json_encode(['msgcode' => 'no_password', 'msg'=> 'Please enter correct password admin!']);
            }
        }
        else{
            if(password_verify($form_password, $db_password)){
                $login = $user->userLogin($email,$db_password);
                if($login){
                    $loggedInUser = createUserSession($login);
                    echo json_encode(['msgcode' => 'success', 'msg'=> 'profile/index']);
                }
                else{
                    echo json_encode(['msgcode' => 'no_password', 'msg'=> 'Please enter correct password']);
                }
            }
            else{
                echo json_encode(['msgcode' => 'no_password', 'msg'=> 'Please enter correct password']);
            }
        }
    }
    else{
        echo json_encode(['msgcode' => 'no_email', 'msg'=> 'Please enter Correct Email Address']);
    }

}

login();

function createUserSession($user){
    $_SESSION['user_id'] = $user->user_id;
    $_SESSION['user_email'] = $user->user_email;
    $_SESSION['user_name'] = $user->user_name;
    $_SESSION['user_role'] = $user->user_role;
}
 
?>