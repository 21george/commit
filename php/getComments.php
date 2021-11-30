<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";
require "../models/Post.php";
require "../models/Comment.php";
$comment = new Comment;
$comment_status = 0;

if(isset($_POST['check']) && isset($_POST['uid'])){

    $POST=filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $user_id = $POST['uid'];
    if($_POST['check'] !=""){
        $updateComments = $comment->updateStatus();
    }
    $result = $comment->getAllComments($user_id);
    $output='';
    if($result){
        foreach($result as $row){

            $output .='
            <li class="mb-1">
                <p class="m-auto"><strong>'.$row->sender_name.'</strong></p>
                <p class="ml-1 text-success">'.$row->comment_body.'<a href="comments">Read Comments</a></p>
            </li>';
        }
    }else{
        $output .='<li><p class="p-3 text-danger"><strong>No new comments found</strong></p><a href="comments">Read Comments</a></li>';
    }

    $comment_status=0;
    $countComments = $comment->getUnseenCount($comment_status,$user_id);
    
    $data = array(
        'notification'=>$output,
        'unseen_notification' =>$countComments
    );
    echo json_encode($data);
}

?>