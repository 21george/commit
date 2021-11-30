

<?php include("../bootstrap.php");?>

    <!-- Head -->

<?php include (ROOT_PATH."admin/inc/head.php");?>
    <!-- Left Panel -->

    <?php include (ROOT_PATH."admin/inc/left-panel.php");?>

    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

    <?php include (ROOT_PATH."admin/inc/header.php");?>
   
    <?php include (ROOT_PATH."admin/inc/breadcrumbs.php");?>
    <?php include (ROOT_PATH."admin/inc/display-msg.php");?>

<div class="content mt-3">

<?php 
require "../models/Comment.php";
$comment = new Comment;
$allComments = $comment->Comments();
?>



<div class="animated fadeIn">
                <div class="row">
            
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Comments table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Comment Id</th>
                                            <th scope="col">Parent Comment</th>
                                            <th scope="col">Comment Body</th>
                                            <th scope="col">Comment Name</th>
                                            <th scope="col">Post Id</th>
                                            <th scope="col">User Email</th>
                                            <th scope="col">Unapproved</th>
                                            <th scope="col">Delete</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($allComments as $all):?>
                                        <tr>
                                            <td ><?php echo $all->comment_id;?></td>
                                            <td ><?php echo $all->parent_comment_id;?></td>
                                            <td ><?php echo $all->comment_body;?></td>
                                            <td ><?php echo $all->sender_name;?></td>
                                            <td ><?php echo $all->post_id;?></td>
                                            <td ><?php echo $all->user_email;?></td>
                                            <td><small>
                <form action="../php/action.php" method="POST" class="form-inline">

                <input type="hidden" id="comment_id" name="comment_id" value="<?php echo $all->comment_id;?>">
                <button type="submit" name="unapproved_admin_comment" id="unapproved_admin_comment" class="btn btn-danger btn-sm">
                <i class="fa fa-trash"></i> Suspend Comment
                </button>

                </form>
</td>
            <td><small>

            <form action="../php/action.php" method="POST"  onclick="return confirm('Are you sure you want to delete this comment');" class="form-inline">

<input type="hidden" id="comment_id" name="comment_id" value="<?php echo $all->comment_id;?>">
<button type="submit" name="delete_admin_comment" id="delete_admin_comment" class="btn btn-danger btn-sm">
<i class="fa fa-trash"></i> 
</button>

</form>

            </small></td>

       
                                           
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- .animated -->
    </div>
</div>
  
    <!-- Right Panel -->
    <?php include (ROOT_PATH."admin/inc/footer-scripts.php");?>