

<?php
include 'bootstrap.php';

?>

<?php include (ROOT_PATH ."/inc/head.php");?>

    <section class="section-register" id="section-register">

        <div class="register">
            <div class="register__form">
                <form method="POST" action="<?php echo BASE_URL;?>php/register.php">  /* Getting the <?php echo BASE_URL;?>*/
                <!-- Getting Dengermsg from inner that php folder -->
                <?php msgDanger('register_fail')?>
                    <div class="register__form-heading">
                        Register
                    </div>
                    <div class="register__form-logo">
                        <i class="fa fa-sign-in"></i>
                    </div>
                    <div class="register__form__group">
                        <input type="text" class="register__form__input" placeholder="Username" id="username" name="username" autocomplete="off" required>
                        <label for="username" class="register__form__label"><i class="fa fa-user-o"></i> Choose Username</label>
                        <div class="username-error"></div>
                    </div>
                    <div class="register__form__group">
                            <input type="email" class="register__form__input email" placeholder="Email" id="email" name="email" autocomplete="off" required>
                            <label for="email" class="register__form__label email_label"><i class="fa fa-paper-plane-o"></i> Email Address</label>
                            <div class="email-error register__form__label" ></div>
                    </div>
                    <div class="register__form__group">
                            <input type="password" class="register__form__input" placeholder="Choose Password" id="password" name="password" required>
                            <label for="password" class="register__form__label password_label"><i class="fa fa-unlock-alt"></i> Password</label>
                            <div class="password-error register__form__label" style="font-size:1.3rem;"></div>
                    </div>
                    <div class="register__form__group">
                            <input type="password" class="register__form__input" placeholder="Confirm Password" id="confirm-password" name="confirm-password" required>
                            <label for="confirm-password" class="register__form__label confrim_password_label"><i class="fa fa-unlock-alt"></i> Confirm Password</label>
                            <div class="confirm-password-error register__form__label"></div>
                        
                    </div>

                    <div class="register__form_group progress-bar"></div>

                    <div class="">
                        <button type="submit" class="btn btn-register btn-outline-info" id="submit-registration"> Create Account &rarr;</button>
                    </div>
                    <p class="already-member"> Already a member? <a href="<?php echo BASE_URL;?>login" class="to_login">Log In</a></p>
                </form>

            </div>
        </div>
    </section>


    <?php include (ROOT_PATH ."/inc/scripts.php");?>