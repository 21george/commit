<?php include("../php/password-update.php");?>
<section class="content-form d-flex justify-content-center align-items-center flex-wrap">
<div class="row">
<div class="heading-tertiary">Update/Change Your Password</div>
        
        <form method="POST"  class="profile-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<?php if(isset($password_success)):?>
<div class="profile-form__styling text-center">


<div class="alert alert-success blockquote" role="alert">
<h1><?php echo $password_success;?></h1>
</div>
</div>
<?php endif;?>

        <div class="profile-form__styling">
            <label for="current_password" class="label-style">Enter your existing Password</label>
            <input type="password" id="current_password" name="current_password" class="input-style form-control"  autocomplete="off" >
        </div>
        <?php if(isset($current_password_err) && $current_password_err!=""):?>
         <div class="alert alert-danger blockquote text-center" role="alert">
             <h1><?php echo $current_password_err;?></h1>
        </div>
        <?php endif;?>
 
        <div class="profile-form__styling">
            <label for="new_password" class="label-style">Enter new Password</label>
            <input type="password" id="new_password" name="new_password" class="input-style form-control"  
             autocomplete="off" >
        </div>

        <?php if(isset($new_password_err) && $new_password_err!=""):?>
         <div class="alert alert-danger blockquote text-center" role="alert">
             <h1><?php echo $new_password_err;?></h1>
        </div>
        <?php endif;?>
        <div class="profile-form__styling">
            <label for="confirm_password" class="label-style">Repeat your new Password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="input-style form-control"  autocomplete="off" >
        </div>
        
        <?php if(isset($confirm_password_err) && $confirm_password_err!=""):?>
         <div class="alert alert-danger blockquote text-center" role="alert">
             <h1><?php echo $confirm_password_err;?></h1>
        </div>
        <?php endif;?>
        <div class="text-center">
            <button type="submit" id="submit" class="btn btn-success form-btn">Submit</button>
        </div>
        </form>
</div>       

    </section> 