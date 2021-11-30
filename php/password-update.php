<?php



if($_SERVER['REQUEST_METHOD'] =="POST"){
   $user = new User;

   $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
   $current_password =$POST['current_password'];
   $new_password =$POST['new_password'];
   $confirm_password =$POST['confirm_password'];
   $user_id =$_SESSION['user_id'];
  $theUser = $user->getUserByUserId($user_id);

  $db_password = $theUser->user_password;
  if(empty($current_password)){

      $current_password_err = "Your Password is required";
  }
  else{
      $current_password_err="";
      if(password_verify($current_password,$db_password)){
        
          $pattern ='/^(?=.*[!@#$%&*_])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

          if(preg_match($pattern,$new_password)){
            //  echo "It pass the pattern test";
              $new_password_err="";
              $confirm_password_err="";

              if($new_password === $confirm_password){
              $change_password = password_hash($new_password,PASSWORD_DEFAULT);
              
               $password_update = $user->updateUserPassword($user_id,$change_password);

          //$2y$10$bGSJ90F3Nxmd9GI04UFny.ZbQljm669nvHy3NOrr9PsutdYVpmESG
          //$2y$10$EvXz8pPX9AEi21AMJ25D8ukW8wxf5tUnJkrUovut26UC9FAe94oAG
                   
                  
              
              if($password_update){
                //   flashSuccess("success","<i class='fa fa-check-circle'></i> You have successfully updated your Password!");
                  $password_success = "You have successfully updated your Password";

                  unset($new_password);
                  unset($current_password);
                  unset($confirm_password);
                  unset($new_password_err);
                  unset($current_password_err);
                  unset($confirm_password_err);
                  unset($_POST['submit']);
                  
              }
              else{
                // flashDanger("fails","<i class='fa-exclamation-circle'></i> You have not updated your Password!");
                $password_success = "You have not updated your Password";
              }
            }else{
                $confirm_password_err="Passwords are not the same. Please try again";
            }
          }
          else{
              $new_password_err="Your password has to be at least 8 characters long. Spaces are not allowed at the beginning and at the end.
              Must contains at least one lower letter, one upper letter, one digit/number and one special character !@#$%&*_";
          }
      }
      else{
          $current_password_err="This Password is not stored in our database!";
      }
  }
}

?>

