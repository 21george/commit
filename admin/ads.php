

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
require "../models/Post.php";
$post = new Post;
$allPosts = $post->getAllAds();


?>
<div class="animated fadeIn">
                <div class="row">
            
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Ads Table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Post Id</th>
                                            <th scope="col">Post Title</th>
                                            <th scope="col">Post Body</th>
                                            <th scope="col">Full Address</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($allPosts as $all):?>
                                        <tr>
                                            <td ><?php echo $all->post_id;?></td>
                                            <td ><?php echo $all->post_title;?></td>
                                            <td ><?php echo $all->post_content;?></td>
                                            <td ><?php echo $all->full_address?></td>
                                            <td ><?php echo $all->post_status;?></td>
                                            <td ><?php echo $all->post_type;?></td>
                                            <td><small>

<form action="../php/action.php" method="POST"  onclick="return confirm('Are you sure you want to delete this Ad/Post');" class="form-inline">

<input type="hidden" id="post_id" name="post_id" value="<?php echo $all->post_id;?>">
<button type="submit" name="delete_admin_post" id="delete_admin_post" class="btn btn-danger btn-sm">
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