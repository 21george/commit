<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";
require "../models/Post.php";
require "../models/Comment.php";
$comment = new Comment;
$parent_comment_id ='0';
$post_id = $_POST['post_id'];
$result = $comment->getComments($parent_comment_id,$post_id);

$output = "";
foreach($result as $row){
    if($row->comment_body==="This comment was unapproved by the owner of the ad"){
        $comment_body ="<del class='text-danger'>This comment was unapproved by the owner of the ad</del>";
    }
    else{
        $comment_body =$row->comment_body;
    }
    $output.='<li class="comment-body">
    <div class="comment-body__avatar">
        <img src="../img/users/DavidRockDesign.png" alt="avatar image">
    </div>
    <div class="comment-body-content">
        <header><a href="#" class="comment-body__link">'.$row->sender_name.'</a>
     <span class="comment-body__date"><i class="fa fa-circle"> </i>posted: '.$row->created_at.'</span>
     </header>
     <p>'.$comment_body.'</p>
     <button type="button" class="comment-body__reply-btn reply" id="'.$row->comment_id.'">Reply</button>
    </div>';
    $output .= getReplies($row->comment_id);
}
echo $output;

function getReplies($parent_id='0'){
    $post_id =$_POST['post_id'];
    $comments = new Comment;
    $reply_query = $comments->getComments($parent_id,$post_id);
    $output='';
     $countReplies = $comments->getCommentCount($parent_id,$post_id);

    if($countReplies>0){
  
        foreach($reply_query as $row){
            $theName = $comments->getCommentName($row->parent_comment_id);
            if($theName){
                $theName=$theName->sender_name;
            }
            if($row->comment_body==="This comment was unapproved by the owner of the ad"){
                $comment_body ="<del class='text-danger'>This comment was unapproved by the owner of the ad</del>";
            }
            else{
                $comment_body =$row->comment_body;
            }
            $output .='
            <ul class="replies">
              <li class="comment-body">
                  <div class="comment-body__avatar">
                      <img src="../img/users/OpenClipart-Vectors.png" alt="avatar image">
                  </div>
                  <div class="comment-body-content">
                      <header><a href="#" class="comment-body__link">'.$row->sender_name.'<i class="fa fa-reply fa-flip-horizontal"></i><span class="replies-to">'.$theName.'</span></a>
                   <span class="comment-body__date"><i class="fa fa-circle"> </i>posted '.$row->created_at.'</span>
                   </header>
                   <p>'.$comment_body.'</p>
                   <button type="button" class="comment-body__reply-btn reply" id="'.$row->comment_id.'">Reply</button>
                  </div>';

                  $output .= getReplies($row->comment_id);
        }
  
    }
    return $output.'</li></ul>
    </li></ul>';
}

?>