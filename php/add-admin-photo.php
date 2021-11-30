<?php

require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";
require "../models/Img.php";


$img = new Img;
$user = new User;
if(isset($_POST['admin_img_submit'])){
   // echo "Continue";

   $file = $_FILES['file']['name'];
   $temp = $_FILES['file']['tmp_name'];
   $size = $_FILES['file']['size'];
   $upload_file = $img->uploadImage($file,$temp,$size);

    if($upload_file["type"]!="success"){
    
     $_SESSION['fail']=$upload_file["message"];;
     redirect("admin/index.php");
     exit();
    }
//    print_r($upload_file);
   $user_id = filter_var($_SESSION['user_id'],FILTER_SANITIZE_STRING);
   $theUser = $user->getUserById($user_id);
   $data = array('user_id'=>$user_id,'user_image'=>$file);
   $updateUserImg = $user->updateImage($data);

   if($updateUserImg){
       $_SESSION['success']="You have successfully updated your profile image";
       redirect("admin/index.php");
   }
   else{
    $_SESSION['fail']="You have not updated your profile image";
    redirect("admin/index.php");
   }


}
else{

    redirect("admin/index.php");
}

?>
