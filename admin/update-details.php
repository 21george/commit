

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


<div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <strong>Update Admin Details</strong>
            </div>
            <div class="card-body card-block">
            <form action="<?php echo BASE_URL?>php/update-admin-details.php" method="POST" enctype="multipart/form-data" class="form-horizontal">

<div class="row form-group">
    <div class="col col-md-3"><label for="user_firstname" class=" form-control-label">Admin First Name</label></div>
    <div class="col-12 col-md-9"><input type="text" id="user_firstname" name="user_firstname" placeholder="" class="form-control"></div>
</div>

<div class="row form-group">
    <div class="col col-md-3"><label for="user_lastname" class=" form-control-label">Admin Last Name</label></div>
    <div class="col-12 col-md-9"><input type="text" id="user_lastname" name="user_lastname" placeholder="" class="form-control"></div>
</div>

<div class="row form-group">
        <div class="col col-md-3"><label for="user_gender" class=" form-control-label">Select Gender</label></div>
        <div class="col-12 col-md-9">
            <select name="user_gender" id="user_gender" class="form-control-lg form-control">
                <option value="female">Female</option>
                <option value="male" > Male</option>

            </select>
        </div>
    </div>
<div class="row form-group">
<div class="col col-md-3"><label for="user_bio" class=" form-control-label">Short Bio</label></div>
<div class="col-12 col-md-9"><textarea name="user_bio" id="user_bio" rows="9" placeholder="Content..." class="form-control"></textarea></div>
</div>

    <div class="row form-group">
    <div class="col col-md-3"><label for="user_phone" class=" form-control-label"> Phone Number</label></div>
    <div class="col-12 col-md-9"><input type="number" id="user_phone" name="user_phone" placeholder="" class="form-control"></div>
</div>
<div class="row form-group">
    <div class="col col-md-3"><label for="user_occupation" class=" form-control-label">Occupation</label></div>
    <div class="col-12 col-md-9"><input type="text" id="user_occupation" name="user_occupation" placeholder="" class="form-control"></div>
</div>


    <div class="row form-group">
        <div class="col col-md-3"><label for="user_exp" class=" form-control-label">User Exp</label></div>
        <div class="col-12 col-md-9">
            <select name="user_exp" id="user_exp" class="form-control-lg form-control">
                <option value="0">0</option>
                <option value="1" selected> 1</option>
                <option value="2"> 2</option>
                <option value="3"> 3</option>
                <option value="4"> 4</option>
                <option value="5"> 5</option>
                <option value="6"> 6</option>
            </select>
        </div>
    </div>

    
<button type="submit" name="update_admin_details" id="update_admin_details" class="btn btn-primary btn-success btn-block">
<i class="fa fa-dot-circle-o"></i> Submit
</button>
<button type="reset" class="btn btn-danger btn-sm btn-block">
<i class="fa fa-ban"></i> Reset
</button>

</form>
            </div>
   
        </div>
     
    </div>
</div><!--content ends here-->

</div><!-- Right Panel -->
<?php include (ROOT_PATH."admin/inc/footer-scripts.php");?>