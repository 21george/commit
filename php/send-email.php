<?php 

require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";

require "../models/Img.php";
require "../models/Post.php";

require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";
require ROOT_PATH.'classes/Config.php';
// Load Composer's autoloader
require ROOT_PATH.'profile/vendor/autoload.php';

$img  = new Img;
$user  = new User;
$post = new Post;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$post_id = filter_var($_POST['post_id'],FILTER_SANITIZE_STRING);
$user_id = filter_var($_POST['user_id'],FILTER_SANITIZE_STRING);
$getCategory = $post->getCategoryFromDesc($post_id,$user_id);

if($getCategory->post_cat_id =="2"){
    if(!empty($_POST['setFrom']) && !empty($_FILES['user_resume']) && !empty($_FILES['user_cl'])){
     
        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
        if(!filter_var($_POST['setFrom'],FILTER_VALIDATE_EMAIL)){
            //echo "You have wrong email address";
            $response = array(
                "type"=>"error",
                "message"=>"You have wrong email address"
            );
            echo json_encode($response);
            exit();
        }
        else{
             $setFrom =$POST['setFrom'];
        }
        if(strlen($_POST['user_mobile'])!= 10){
           // echo "You have wrong phone number";
            $response = array(
                "type"=>"error",
                "message"=>"You have wrong phone number"
            );
            echo json_encode($response);
            exit();
        }
        else{
             $user_mobile =$POST['user_mobile'];
        }
    
          $Body = $POST['message_body'];
        if(empty($Body)){
            //echo "You can't have the text message empty";
    
            $response = array(
                "type"=>"error",
                "message"=>"You can't have empty text message"
            );
            echo json_encode($response);
            exit();
        }
    
        $year_exp = $POST['email_reason'];
        $email_subject = $POST['desc'];
    
         $file = $_FILES['user_resume']['name'];
         $temp = $_FILES['user_resume']['tmp_name'];
         $size = $_FILES['user_resume']['size'];
         $upload_file = $img->uploadFile($file,$temp,$size);
    
         if($upload_file["type"]=="error"){
            $response = array(
                "type"=>"error",
                "message"=>$upload_file['message']
            );
    
            echo json_encode($response);
            exit();
         }
         $file1 = $_FILES['user_cl']['name'];
         $temp = $_FILES['user_cl']['tmp_name'];
         $size = $_FILES['user_cl']['size'];
         $upload_file1 = $img->uploadFile($file1,$temp,$size);
    
         if($upload_file1["type"]=="error"){
            $response = array(
                "type"=>"error",
                "message"=>$upload_file1['message']
            );
            
            echo json_encode($response);
            exit();
         }
    
         if($upload_file){
             if($upload_file1){
                  $file_path = ROOT_PATH.'img/upload/'.$_FILES['user_resume']['name'];
                  $file_path2 = ROOT_PATH.'img/upload/'.$_FILES['user_cl']['name'];
             }
         }
    
         //$user_id = $POST['user_id'];
         $owner_email = $user->getUserById($user_id);
         $userName = $owner_email->user_name;
         $addAddress = $owner_email->user_email;
    
         $mail = new PHPMailer(true);
         try {
             //Server settings
             //$mail->SMTPDebug = 2;                                       // Enable verbose debug output
             $mail->isSMTP();                                            // Set mailer to use SMTP
             $mail->Host       = Config::SMTP_HOST;  // Specify main and backup SMTP servers
             $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
             $mail->Username   = Config::SMTP_USER;                     // SMTP username
             $mail->Password   = Config::SMTP_PASSWORD;                               // SMTP password
             $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
             $mail->Port       = Config::SMTP_PORT;                                    // TCP port to connect to
         
             //Recipients
             $mail->setFrom($setFrom);
             $mail->addAddress($addAddress, $userName);     // Add a recipient
             // $mail->addAddress('ellen@example.com');               // Name is optional
              $mail->addReplyTo($setFrom);
              $mail->addAttachment($file_path);
              $mail->addAttachment($file_path2);
    
    
    
            
             $mail->charSet ="UTF-8";
            // Content
             $mail->isHTML(true);                                  // Set email format to HTML
             $mail->Subject = $email_subject;
             $mail->Body    = "Dear ".$userName." You have received email from: ".$setFrom . "The message: ".$Body.", also I have ".$year_exp. ",
             years of experience and you can contact me directly on my number".$user_mobile;
             $mail->AltBody = "Dear ".$userName." You have received email from: ".$setFrom . "The message: ".$Body.", also I have ".$year_exp. ",
            years of experience and you can contact me directly on my number".$user_mobile;
    
    
                     if(!$mail->send()){
                        $response = array(
                            "type"=>"error",
                            "message"=>"Message has been sent"
                        );
                        
                        echo json_encode($response);
                        exit();
                     }
                     else{
                        $response = array(
                            "type"=>"success",
                            "message"=>"Your email is on the way!"
                        );
                        
                        echo json_encode($response);
                        exit(); 
                     }
            // echo 'Message has been sent';
         } catch (Exception $e) {
    
            $response = array(
                "type"=>"error",
                "message"=>"Message could not be sent. Mailer Error: {$mail->ErrorInfo}"
            );
            
            echo json_encode($response);
            exit();
             //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
    
    
    }
    else{
        // echo "Some fields are empty";
               $response = array(
                "type"=>"error",
                "message"=>"Some fields are empty"
            );
    
            echo json_encode($response);
    }
}
else{
    if(!empty($_POST['setFrom'])){
      
        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
        if(!filter_var($_POST['setFrom'],FILTER_VALIDATE_EMAIL)){
            //echo "You have wrong email address";
            $response = array(
                "type"=>"error",
                "message"=>"You have wrong email address"
            );
            echo json_encode($response);
            exit();
        }
        else{
             $setFrom =$POST['setFrom'];
        }
        if(strlen($_POST['user_mobile'])!= 10){
           // echo "You have wrong phone number";
            $response = array(
                "type"=>"error",
                "message"=>"You have wrong phone number"
            );
            echo json_encode($response);
            exit();
        }
        else{
             $user_mobile =$POST['user_mobile'];
        }
    
          $Body = $POST['message_body'];
        if(empty($Body)){
            //echo "You can't have the text message empty";
    
            $response = array(
                "type"=>"error",
                "message"=>"You can't have empty text message"
            );
            echo json_encode($response);
            exit();
        }
    
        $email_reason = $POST['email_reason'];
        $contact_purpose = $POST['desc'];
    
         $owner_email = $user->getUserById($user_id);
         $userName = $owner_email->user_name;
         $addAddress = $owner_email->user_email;
    
         $mail = new PHPMailer(true);
         try {
             //Server settings
             //$mail->SMTPDebug = 2;                                       // Enable verbose debug output
             $mail->isSMTP();                                            // Set mailer to use SMTP
             $mail->Host       = Config::SMTP_HOST;  // Specify main and backup SMTP servers
             $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
             $mail->Username   = Config::SMTP_USER;                     // SMTP username
             $mail->Password   = Config::SMTP_PASSWORD;                               // SMTP password
             $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
             $mail->Port       = Config::SMTP_PORT;                                    // TCP port to connect to
         
             //Recipients
             $mail->setFrom($setFrom);
             $mail->addAddress($addAddress, $userName);     // Add a recipient
             // $mail->addAddress('ellen@example.com');               // Name is optional
              $mail->addReplyTo($setFrom);
      
    
    
    
            
             $mail->charSet ="UTF-8";
            // Content
             $mail->isHTML(true);                                  // Set email format to HTML
             $mail->Subject = $email_reason;
             $mail->Body    = "Dear ".$addAddress." You have received email from: ".$setFrom ." regarding".$contact_purpose."
              The content of the message: ".$Body.", and you can contact me directly on my number".$user_mobile;
             $mail->AltBody = "Dear ".$addAddress." You have received email from: ".$setFrom ." regarding".$contact_purpose."
             The content of the message: ".$Body.", and you can contact me directly on my number".$user_mobile;
    
    
                     if(!$mail->send()){
                        $response = array(
                            "type"=>"error",
                            "message"=>"Message has been sent"
                        );
                        
                        echo json_encode($response);
                        exit();
                     }
                     else{
                        $response = array(
                            "type"=>"success",
                            "message"=>"Your email is on the way!"
                        );
                        
                        echo json_encode($response);
                        exit(); 
                     }
            // echo 'Message has been sent';
         } catch (Exception $e) {
    
            $response = array(
                "type"=>"error",
                "message"=>"Message could not be sent. Mailer Error: {$mail->ErrorInfo}"
            );
            
            echo json_encode($response);
            exit();
             //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
    
    
    }
    else{
        // echo "Some fields are empty";
               $response = array(
                "type"=>"error",
                "message"=>"Some fields are empty"
            );
    
            echo json_encode($response);
    }
}


// print_r($_POST);





?>