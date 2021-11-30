

<?php
include 'bootstrap.php';

?>

<?php include (ROOT_PATH ."/inc/head.php");?>

    <section class="section-login" id="section-login">

        <div class="login">
            <div class="login__form">
                <form method="POST">
                <!-- Getting updated password  -->
                
                <?php msg('register_success')?>
                <?php if(isset($_GET['update']) && $_GET['update']=="pwd_updated"):?>
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <h4 class="alert-heading pb-2 "><i class="fa fa-check-circle-o"></i> Password Updated!</h4>
                        <h4 >Your password has been updated, Log in with the new password.</h4>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
<?php endif;?>
                    <div class="login__form-heading">
                        login
                    </div>
                    <div class="login__form-logo">
                        <i class="fa fa-sign-in"></i>
                    </div>


                    <div class="login__form__group">
                            <input type="email" class="login__form__input" placeholder="Email" id="login-email" name="login-email" autocomplete="off" required>
                            <label for="email" class="login__form__label"><i class="fa fa-paper-plane-o"></i> Email Address</label>
                            <div class="login-email-msg login__form__label" style="font-size:1.5rem; padding-left:0.5rem;"></div>
                    </div>
                    <div class="login__form__group">
                            <input type="password" class="login__form__input" placeholder="Choose Password" id="login-password" name="login-password" required>
                            <label for="password" class="login__form__label"><i class="fa fa-unlock-alt"></i> Password</label>
                            <div  class="login-password-msg login__form__label" style="font-size:1.5rem; padding-left:0.5rem;"></div>
                    </div>
                    <div class="error-msg login__form__label" style="color:red; font-size:1.5rem;"></div>                    <div class="progress d-none">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" id="my-pbar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                    </div>
                    <div class="login__form_group "></div>
                 
                    <div class="">
                        <button type="button" class="btn btn-login btn-secondary" id="submit-registration"> Sign in &rarr;</button>
                    </div>
                    <a href="<?php echo BASE_URL;?>reset-password.php" class="h6 btn btn-outline-dark ml-2">Forgot Password?</a>
                    <p class="already-member">No Account? Register here? <a href="<?php echo BASE_URL;?>registration" class="to_login">Register</a></p>
                </form>

            </div>
        </div>
    </section>


    <?php include (ROOT_PATH ."/inc/scripts.php");?>