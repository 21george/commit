<?php

require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";

function update_img(){

    if(isset($_POST['img_submit'])){
        $user_id = filter_var($_SESSION['user_id'],FILTER_SANITIZE_NUMBER_INT);
     $filename = $_FILES['file']['name'];
      $filesize = $_FILES['file']['size'];
       $fileTmpName = $_FILES['file']['tmp_name'];
      $user = new User;
      $theUser = $user->getUserById($user_id);
      $valid_ext = array('png','jpeg','jpg');

       $uploadPath = ROOT_PATH."img/users/".$filename;
       $file_extension = pathinfo($uploadPath,PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

       if($filesize<3000000){
           if(in_array($file_extension,$valid_ext)){

            $didUpload = move_uploaded_file($fileTmpName,$uploadPath);
            
            $data = array('user_id'=>$user_id,'user_image'=>$filename);
            $updateUserImg = $user->updateImage($data);

            if($updateUserImg){
                flashSuccess('success','You have successfully updated your profile img');
                redirect('profile/index');
            }
            else{
                flashDanger('fail','You have not  updated your profile img');
                redirect('profile/index');
            }
           }
           else{
            flashDanger('fail','We accept only these extensions jpg,png,jpeg');
            redirect('profile/index');
           }
       }
       else{
        flashDanger('fail','Your File is to big');
        redirect('profile/index');
       }
      

    }
}
update_img();
?>


