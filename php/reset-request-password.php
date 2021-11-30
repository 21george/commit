<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../models/Reset.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";
require ROOT_PATH.'classes/Config.php';
require ROOT_PATH.'profile/vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['reset_password'])){

    $reset = new Reset;
    // echo "Yes inside";
    $selectorToken = bin2hex(random_bytes(8));
    $userToken = random_bytes(32);
    $tokenExpiry= date("U")+1800;

    $reset_email = filter_var($_POST['reset_email'], FILTER_VALIDATE_EMAIL);
    $deleteEmail = $reset->deleteEmailIfExists($reset_email);
    echo $url ="http://localhost/theredapp/generate-new-password.php?selectorToken=".$selectorToken."&val=".bin2hex($userToken);
    $hashedUserToken = password_hash($userToken,PASSWORD_DEFAULT);
    $addIntoReset = $reset->addReset($reset_email,$selectorToken,$hashedUserToken,$tokenExpiry);

    if($addIntoReset){
        $setFrom = "theredappsupport@support.com";
        $addAddress = $reset_email;
        $subject = "Reset Password for the user of theredapp";
        $Body ="<p><strong>Hi $reset_email</strong>, <br>
        Someone recently requested a password change for your redapp account. If this was you, you can set a new password
        here:<br>
        <a href=".$url.">Rest Your Password</a><br>
        If you don't want to change your password or didn't request this, just ignore and delete this message.<br>
        To keep your account safe and secure, please don't forward this email to anyone. See our Help Center for more 
        security tips.<br>
        Happy Posting!</p>";
 
        $mail = new PHPMailer(true);
        try {
                                                 // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = Config::SMTP_HOST;  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = Config::SMTP_USER;                     // SMTP username
            $mail->Password   = Config::SMTP_PASSWORD;                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = Config::SMTP_PORT;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom($setFrom);
            $mail->addAddress($addAddress);     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
             $mail->addReplyTo($setFrom);
            $mail->charSet ="UTF-8";
           // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $Body;
            $mail->AltBody = $Body;
   
   
                    if(!$mail->send()){
                        redirect("reset-password.php?reset=fail");
                        exit;
                    }
                    else{
                        redirect("reset-password.php?reset=success");
                     
                       exit(); 
                    }
           // echo 'Message has been sent';
        } catch (Exception $e) {
   
            redirect("reset-password.php?reset=fail");
           exit();
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
else{
    redirect("registration");
}
?>