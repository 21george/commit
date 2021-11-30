<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";
require "../models/Post.php";
require "../models/Comment.php";
$comment = new Comment;

$POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);


echo $parent_comment_id = $POST['comment_id'];
echo $comment_body = $POST['comment_body'];
echo $comment_name = $POST['comment_name'];
echo $post_id = $POST['post_id'];
echo $comment_email = $POST['comment_email'];
echo $owner_email = $POST['owner_email'];
echo $post_owner_id = $POST['post_owner_id'];
$comment_data = array(
    'parent_comment_id'=>$parent_comment_id,
    'comment_body'=>$comment_body,
    'sender_name'=>$comment_name,
    'post_id'=>$post_id,
    'user_email'=>$comment_email,
    'owner_email'=>$owner_email,
    'post_owner_id'=>$post_owner_id
);

if($comment_name!="" && $comment_email!="" && $comment_body!=""){
    $insertComments = $comment->addComment($comment_data);

    if($insertComments){
        $msg = array(
            'msg'=>'success'
        );
    }
    else{
        $msg = array(
            'msg'=>'fail'
        );
    }
    ob_end_clean();
     echo json_encode($msg);
}


?>