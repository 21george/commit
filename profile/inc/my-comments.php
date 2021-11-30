

<?php
require_once('../models/Comment.php');

require_once('../models/Post.php');
$comment = new Comment;
$post  = new Post;

$allComments = $comment->getAllUserComments($user_id);

?>
<table class="table table-bordered table-dark mt-5">
<thead>
  <tr>
    <th scope="col"><h5>Post ID</h5></th>
    <th scope="col"><h5>Comment Name</h5></th>
    <th scope="col"><h5>Comment Email</h5></th>
    <th scope="col"><h5>Date</h5></th>
    <th scope="col"><h5>Comment Body</h5></th>
    <th scope="col"><h5>Unapprove</h5></th>
    <th scope="col"><h5>Delete</h5></th>
  </tr>
</thead>
<tbody>
<?php foreach($allComments as $c):?>
  <tr>
    <th scope="row"><small><?php echo $c->post_id;?></small></th>
    <th><small><?php echo $c->sender_name;?></small></th>
    <th><small><?php echo $c->user_email;?></small></td>
    <th><small><?php echo $c->created_at;?></small></th>
    <th><small><?php  if($c->comment_body==="This comment was unapproved by the owner of the ad"){
        echo "<del class='text-danger'>$c->comment_body</del>";
    }
    else{
        echo $c->comment_body;
    };?></small></th>
    <th><small>
                <form action="../php/action.php" method="POST" class="form-inline">
                <input type="hidden" id="comment_id" name="comment_id" value="<?php echo $c->comment_id;?>">
                <button type="submit" name="block_comment" id="block_comment" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Block Comment
                </button>

                </form>
</small></th>
    

<th><small>
                <form action="../php/action.php" method="POST" class="form-inline">
                <input type="hidden" id="comment_id" name="comment_id" value="<?php echo $c->comment_id;?>">
                <button type="submit" name="delete_comment" id="delete_comment" class="btn btn-danger btn-sm">
                <i class="fa fa-trash"></i> Delete Comment
                </button>

                </form>
</small></th>
   
  </tr>
  
</tbody>
<?php endforeach;?>
</table>

