

<?php
include 'bootstrap.php';

?>

<?php include (ROOT_PATH ."/inc/head.php");?>

    <section class="section-register" id="section-register">

        <div class="register">
            <div class="register__form">

            <?php 
            $selectorToken = $_GET['selectorToken'];
            $val =  $_GET['val'];

            if(empty($selectorToken) || empty($val)){
                echo "There is an error in the validation process, please try again";
            }
            else{
                if(ctype_xdigit($selectorToken) !==false && ctype_xdigit($val)!==false){

                    ?>
                                  <form method="POST" action="<?php echo BASE_URL;?>php/reset-password.php">
                
               
               <input type="hidden" name="selector_token" id="selector_token" value="<?php echo $selectorToken;?>">
               <input type="hidden" name="val" id="val" value="<?php echo $val;?>">
                <div class="register__form-logo">
                    <i class="fa fa-lock"></i>
                </div>
       

                <div class="register__form__group">
                <label for="pwd" class="register__form__label email_label">
                         Enter new Password</label>
                        <input type="password" class="register__form__input email"
                         placeholder="Your Password..." id="pwd" name="pwd" 
                         autocomplete="off" required>
                         <label for="pwd" class="register__form__label email_label"><i class="fa fa-unlock-alt"></i> Password
                       </label>
                      
                </div>
                <div class="register__form__group">
                <label for="cpwd" class="register__form__label email_label">
                         Confirm new Password</label>
                        <input type="password" class="register__form__input email"
                         placeholder="Confirm Password..." id="cpwd" name="cpwd" 
                         autocomplete="off" required>
                         <label for="cpwd" class="register__form__label email_label"><i class="fa fa-unlock-alt"></i> Confirm Password
                       </label>
                      
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-register btn-outline-success" id="reset_password_btn" name="reset_password_btn">
                    Reset Password </button>
                </div>
             
            </form>
            <?php
                }
            }
  ?>
  <?php if(isset($_GET['error']) && $_GET['error']=="update_fail"):?>
  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <h4 class="alert-heading pb-2 "><i class="fa fa-exclamation-triangle"></i> Problem Occured!</h4>
                        <h4 >Dear user there we didn't update your password. Contact us!.</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
        <?php endif;?>

        <?php if(isset($_SESSION['reset_error'])):?>
  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <h4 class="alert-heading pb-2 "><i class="fa fa-exclamation-triangle"></i> Problem Occured!</h4>
                        <h4 ><?php echo $_SESSION['reset_error'];?></h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
        <?php unset($_SESSION['reset_error']);
     endif;?>
            </div>
        </div>
    </section>


    <?php include (ROOT_PATH ."/inc/scripts.php");?>