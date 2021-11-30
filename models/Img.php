<?php
class Img{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }

public function uploadImg($allFiles){
    $allImages = "";
    foreach($_FILES['file']['name'] as $key=>$val){
         $filename = $_FILES['file']['name'][$key];
         $allImages = $allImages.",".$filename; 
         $upload_dir = ROOT_PATH."img/posts/";
         $upload_file = $upload_dir.$_FILES['file']['name'][$key];
         move_uploaded_file($_FILES['file']['tmp_name'][$key],$upload_file);
    }

     $allImages = substr($allImages,1);
     return $allImages;
}

public function getPostImages($post_featured_image){

    if($post_featured_image==NULL || $post_featured_image ==""){
        $image_numb =0;
        return $image_numb;
    }
    else{
        $post_featured_image_pices = array_filter(explode(",",$post_featured_image));
        $image_numb = count($post_featured_image_pices);
        return $image_numb;
    }
}
//getting all of the images in the post carousel 
public function getAllImages($post_featured_image){
    $post_featured_image_pieces = array_filter(explode(",",$post_featured_image)); 
    return $post_featured_image_pieces;

}


//upload a file

public function uploadFIle($file,$temp,$size){

    $allowed_file_extension = array(
        'png',
        'jpg', 
        'jpeg',
        'doc',
        'docx',
        'pdf',
        'txt'
    );

    $file_extension =pathinfo($file,PATHINFO_EXTENSION);
    $target = ROOT_PATH."img/upload/".basename($file);




    if(! file_exists($temp)){
        //echo "Choose a file to upload";
        $response = array(
            "type"=>"error",
            "message"=>"Choose a file to upload"
        );
    }

    else if(! in_array($file_extension,$allowed_file_extension)){
        //echo "Please attach documents like pdf, doc, docx";
        $response = array(
            "type"=>"error",
            "message"=>"Please attach documents like pdf, doc, docx"
        );
    }

    else if(($file>2000000)){
       //; echo "File too big";
        $response = array(
            "type"=>"error",
            "message"=>"File size exceeds 2mb"
        );
    }
    else if(file_exists($target)){
       // echo "Sorry the file/files already exists";
                $response = array(
            "type"=>"success",
            "message"=>"File Already exists"
        );
    }
    else{
        if(move_uploaded_file($temp,$target)){
            //echo "File uploaded successfully";
                            $response = array(
            "type"=>"success",
            "message"=>"File uploaded successfully"
        );
        }
        else{
            //echo "Problems in uploading the files";
            $response = array(
    "type"=>"error",
    "message"=>"Problems in uploading the files"
);
        }
    }
    return $response;
}


public function uploadImage($file,$temp,$size){

    $allowed_file_extension = array(
        'png',
        'jpg', 
        'jpeg' 
    );

    $file_extension =pathinfo($file,PATHINFO_EXTENSION);
    $target = ROOT_PATH."admin/images/".basename($file);




    if(! file_exists($temp)){
        //echo "Choose a file to upload";
        $response = array(
            "type"=>"error",
            "message"=>"Choose a image to upload"
        );
    }

    else if(! in_array($file_extension,$allowed_file_extension)){
        //echo "Please attach documents like pdf, doc, docx";
        $response = array(
            "type"=>"error",
            "message"=>"Please attach images like png,jpeg"
        );
    }

    else if(($file>2000000)){
       //; echo "File too big";
        $response = array(
            "type"=>"error",
            "message"=>"File size exceeds 2mb"
        );
    }
    else if(file_exists($target)){
       // echo "Sorry the file/files already exists";
                $response = array(
            "type"=>"success",
            "message"=>"Images Already exists"
        );
    }
    else{
        if(move_uploaded_file($temp,$target)){
            //echo "File uploaded successfully";
                            $response = array(
            "type"=>"success",
            "message"=>"Images uploaded successfully"
        );
        }
        else{
            //echo "Problems in uploading the files";
            $response = array(
    "type"=>"error",
    "message"=>"Problems in uploading the files"
);
        }
    }
    return $response;
}
}

?>