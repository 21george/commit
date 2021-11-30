

<?php
include 'bootstrap.php';

?>

<?php include (ROOT_PATH ."/inc/head.php");?>

    <section class="section-register" id="section-register">

        <div class="register">
            <div class="register__form">
                <form method="POST" action="<?php echo BASE_URL;?>php/reset-request-password.php">
                
                    <div class="register__form-heading">
                        Reset Your Password
                    </div>
                    <div class="register__form-logo">
                        <i class="fa fa-lock"></i>
                    </div>
               
                    <div class="register__form__group">
                            
                            <label class="register__form__label email_label">
                             An email will be sent to you with detail instructions on how to reset your password.</label>
                            
                    </div>

                    <div class="register__form__group">
                            <input type="email" class="register__form__input email"
                             placeholder="Enter Your existing email address" id="reset_email" name="reset_email" 
                             autocomplete="off" required>
                            <label for="reset_email" class="register__form__label email_label"><i class="fa fa-paper-plane-o"></i>
                             Email Address</label>
                          
                    </div>
                   


                    <div class="text-center">
                        <button type="submit" class="btn btn-register btn-outline-success" id="reset_password" name="reset_password">
                        Reset and Receive new Password by email</button>
                    </div>
                 
                </form>
                <?php if(isset($_GET['reset']) && $_GET['reset']=="success"):?>
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <h4 class="alert-heading pb-2 "><i class="fa fa-paper-plane-o"></i> Link sent to your email!</h4>
                        <h4 >Dear user please check your email account!.</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                <?php else:?>
                <?php if(isset($_GET['reset']) && $_GET['reset']=="fail"):?>
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <h4 class="alert-heading pb-2 "><i class="fa fa-exclamation-triangle"></i> Problem Occured!</h4>
                        <h4 >Dear user there was a problem, please contact us via email!.</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            <?php endif;?>
            <?php endif;?>
            </div>
        </div>
    </section>


    <?php include (ROOT_PATH ."/inc/scripts.php");?>