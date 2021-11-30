

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

$allUsers = $user->getUsers();


?>
<div class="animated fadeIn">
<div class="row">

<div class="col-lg-12">
<div class="card">
<div class="card-header">
<strong class="card-title">Registered Users Table</strong>
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">User Id</th>
            <th scope="col">User First Name</th>
            <th scope="col">User Name</th>
            <th scope="col">User Role</th>
            <th scope="col">User Email</th>
            <th scope="col">Date Registered</th>
            <th scope="col">Blocked Or Unblocked</th>
            <th scope="col">Block User</th>
            <th scope="col">Unblock User</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($allUsers as $all):?>
        <tr>
            <td ><?php echo $all->user_id;?></td>
            <td ><?php echo $all->user_firstname;?></td>
            <td ><?php echo $all->user_name;?></td>
            <td ><?php echo $all->user_role?></td>
            <td ><?php echo $all->user_email;?></td>
            <td ><?php echo $all->created_at;?></td>
            <td ><?php if($all->blocked){
                echo "<span class='text-danger'>Suspended</span>";
            }
            else{
                echo "<span class='text-success'>Not suspended</span>";
            };?></td>
            <td><small>
                <form action="../php/action.php" method="POST" class="form-inline">
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $all->user_id;?>">
                <button type="submit" name="block_user" id="block_user" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Block User
                </button>

                </form>
</td>
<td><small>
                <form action="../php/action.php" method="POST" class="form-inline">
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $all->user_id;?>">
                <button type="submit" name="unblock_user" id="unblock_user" class="btn btn-success btn-sm">
                <i class="fa fa-thumbs-up"></i> Unblock User
                </button>

                </form>
</td>
            <td>
            <small>
            <form action="../php/action.php" method="POST"  onclick="return confirm('Are you sure you want to delete this user');" class="form-inline">

<input type="hidden" id="user_id" name="user_id" value="<?php echo $all->user_id;?>">
<button type="submit" name="delete_admin_user" id="delete_admin_user" class="btn btn-danger btn-sm">
<i class="fa fa-trash"></i> 
</button>

</form>

                
            </small>
            </td>
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