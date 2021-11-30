
<?php 
require_once("../models/User.php");
$user = new User;

$getUser = $user->getUserById($user_id);



?>
<section class="content-form d-flex justify-content-center align-items-center flex-wrap">
        <div class="heading-tertiary">Complete Your User Details</div>
        <form method="POST" class="profile-form" action="<?php echo BASE_URL?>php/update-details.php"
        enctype="multipart/form-data">


        <div class="profile-form__styling">
            <label for="user_firstname" class="label-style">Your First Name <sup class="text-danger">Optional</sup></label>
            <input type="text" name="user_firstname" id="user_firstname" class="input-style" placeholder="<?php echo $getUser->user_firstname;?>" autocomplete="off" >
        </div>
        <div class="profile-form__styling">
            <label for="user_lastname" class="label-style">Your First Name <sup class="text-danger">Optional</sup></label>
            <input type="text" name="user_lastname" id="user_lastname" class="input-style" placeholder="<?php echo $getUser->user_lastname;?>" autocomplete="off" >
        </div>

   
        <div class="profile-form__styling">
                <label for="user_gender" class="label-style">Select gender</label>
                <select  id="user_gender" name="user_gender" class="form-control select-style">
                <option value="default" >Default</option>
                    <option value="female" >Female</option>
                    <option value="male" >Male</option>
                </select>
        </div>

        <div class="profile-form__styling">
            <label for="user_phone" class="label-style">Contact Number <sup class="text-danger">Optional</sup></label>
            <input type="text" name="user_phone" id="user_phone" class="input-style" placeholder="<?php echo $getUser->user_phone;?>" autocomplete="off" >
        </div>
    
        <div class="profile-form__styling">
            <label for="user_bio" class="label-style">Short Bio <sup class="text-danger">Optional</sup></label>
            <textarea style="width:40%;" rows="6" class="textarea-style" id="user_bio" name="user_bio"><?php echo $getUser->user_bio;?></textarea>
        </div>

        <div class="profile-form__styling">
            <label for="user_occupation" class="label-style">Your Occupation <sup class="text-danger">Optional</sup></label>
            <input type="text" name="user_occupation" id="user_occupation" class="input-style" placeholder="<?php echo $getUser->user_occupation;?>" autocomplete="off" >
        </div>
        <div class="profile-form__styling">
                <label for="user_exp" class="label-style">Work Experience</label>
                <select  id="user_exp" name="user_exp" class="form-control select-style" >
                    <option value="0" selected>0</option>
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                    <option value="5" >5</option>
                    <option value="6" >6</option>
                    <option value="7" >7</option>
                    <option value="8" >8</option>
                    <option value="9" >9</option>
                    <option value="10" >10</option>
                    <option value="11" >11</option>
                    <option value="12" >12</option>
                    <option value="13" >13</option>
                    <option value="14" >14</option>
                    <option value="15" >15</option>
                </select>
        </div>

        <div class="profile-form__styling">
            <label for="user_linkedin" class="label-style">Your LinkedIn Link <sup class="text-danger">Optional</sup></label>
            <input type="text" name="user_linkedin" id="user_linkedin" class="input-style" placeholder="<?php echo $getUser->user_linkedin;?>" autocomplete="off" >
        </div>
        
        <div class="profile-form__styling">
            <label for="user_gplus" class="label-style">Your Google Plus <sup class="text-danger">Optional</sup></label>
            <input type="text" name="user_gplus" id="user_gplus" class="input-style" placeholder="<?php echo $getUser->user_gplus;?>" autocomplete="off" >
        </div>

        
    <div class="profile-form__styling" style="width:75%;">
    <label for="suburb" class="label-style">Enter Suburb or Zip/Postcode</label>
    <input type="text" class="form-control input-style" id="tokenfield" name="suburb" />
    </div>
    
        <div class="text-center">
            <button type="submit" id="update_user"  name="update_user" class="btn btn-success form-btn">Publish</button>
        </div>
        </form>
    </section> 
