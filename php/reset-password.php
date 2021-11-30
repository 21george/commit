<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../models/Reset.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";


if(isset($_POST['reset_password_btn'])){
    
$reset = new Reset();
$user = new User();
$selector_token = $_POST['selector_token'];
$val = $_POST['val'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['cpwd'];

$pattern ='/^(?=.*[!@#$%&*_])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

if(empty($pwd) || empty($cpwd)){
    $_SESSION['reset_error']="the password fields cannot be empty";
    $url ="generate-new-password.php?selectorToken=".$selector_token."&val=".$val;
    redirect($url);
    exit();
}
else if($pwd != $cpwd){
    $_SESSION['reset_error']="Password and Confirm password didn't match. Try again!";
    $url ="generate-new-password.php?selectorToken=".$selector_token."&val=".$val;
    redirect($url);
    exit();
}
if(preg_match($pattern,$pwd)){
    $currentDate = date("U");
    $validate = $reset->getValidation($selector_token,$currentDate);

    if($validate){
        $generate_binary_token = hex2bin($val);
        $tokenVerify = password_verify($generate_binary_token,$validate->user_token);
        if($tokenVerify==false){
            echo "Please resubmit your reset password request";
        }
        else if($tokenVerify==true){
            $user_email = $validate->reset_email;
            $getUser = $user->findUserByEmail($user_email);
            if($getUser){
                $user_id = $getUser->user_id;
                $user_password = password_hash($pwd,PASSWORD_DEFAULT);
                $updatePassword = $user->updateUserPassword($user_id,$user_password);

                if($updatePassword){
                    redirect('login.php?update=pwd_updated');
                    exit();
                }else{
                    redirect('generate-new-password.php?error=update_fail');
                    exit();
                }
            }
        }

    }
    else{
        echo "Please resubmit your password request again";
        exit();
    }
}
else{
    $_SESSION['reset_error']="Your password has to be at least 8 Characters ling.
    Must contain at least one lower,one upper letter and digit and on the these special signs !@#$%&*_";
    $url ="generate-new-password.php?selectorToken=".$selector_token."&val=".$val;
    redirect($url);
    exit();
}
}
else{
    redirect("registration");
}
?>
