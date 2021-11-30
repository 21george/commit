
<?php include ("../bootstrap.php");?>

<!--Head -->
<?php include (ROOT_PATH."profile/inc/head.php");?>

<div class="container-fluid my-flex-container">
   <!--Header -->
<?php include (ROOT_PATH."profile/inc/header.php");?>

    <div class="content d-flex">
      
<!--Sidebar -->
<?php include (ROOT_PATH."profile/inc/sidebar.php");?>

<main class="content-center ">
<!--Search Box -->
<?php include (ROOT_PATH."profile/inc/search-box.php");?>

<section class="content-form d-flex justify-content-center align-items-center flex-wrap">
        <div class="heading-tertiary">Start Your Ad</div>
        <form method="POST" id="multiplesub" name="multiplesub" class="profile-form" action="<?php echo BASE_URL?>php/add-post.php"
        enctype="multipart/form-data">

        <div>
            <label class="subtitle-style p-2 " style="line-height:1.3rem">Every free post/ad can be maximum posted for 30 days</label>
        </div>

        <div class="profile-form__styling">
            <label for="post_title" class="label-style">Ad Title Of The Ad</label>
            <input type="text" name="post_title" id="post_title" class="input-style" placeholder="Enter your title" autocomplete="off" required>
        </div>
        <div class="profile-form__styling ">
                <label for="post_cat_id" class="label-style">Select Category You want to make an ad</label>
                <select  id="post_cat_id" name="post_cat_id" class="form-control select-style " style="width:80%;" onchange="getCategory(this.value);" >
                    <option value="default" >Select</option>
                    <?php
                    include (ROOT_PATH."models/Category.php");
                    $category = new Category();
                    $categories = $category->getCategory();
                   foreach($categories as $c){
                       if($c->cat_title !="Realestate" && $c->cat_title !="Jobs" && $c->cat_title !="Cars"){

                        echo "<option value='$c->cat_id'>$c->cat_title</option>";
                       }
                   }
                    ?>
                </select>
        </div>

        <div class="profile-form__styling">
                <label for="post_type" class="label-style">Post Type ex: Standard</label>
                <select  id="post_type" name="post_type" class="form-control select-style" onchange="selectPostPayment(this.value);">
                    <option value="free" >Free</option>
                    <option value="standard" >Standard</option>
                </select>
        </div>



<div class="dates_box d-none" id="dates_box">
<div class="dates profile-form__styling hidden ">
   <!-- This is for making  form recognizable but is hidden-->
    <input type="text" autocomplete="off" id="priceType" name="priceType" class="form-control  input-style" value="Standard" readonly />
</div>

<div class="dates profile-form__styling form-group">
    <label for="startDate" class="label-style">Start Date</label>
    <input type="date"   max="3000-12-31" max="3000-12-31" autocomplete="off" id="startDate" name="startDate" class="form-control  input-style date" placeholder="dd-mm-yyyy" onchange="numDays()"/>
</div>
<div class="startdate-msg all-msg"></div>
<div class="dates form-group profile-form__styling">
    <label for="endDate" class="label-style">End Date</label>
    <input type="date"   max="3000-12-31" max="3000-12-31" autocomplete="off" id="endDate" name="endDate" class="form-control  input-style date" placeholder="dd-mm-yyyy" onchange="numDays()"/>
</div>
<div class="endDate-msg all-msg"></div>
<div class="form-group  profile-form__styling">
    <label for="daysCalculated" class="label-style">Number of Days Your Post will be visible<sup>(10 days min)</sup></label>
    <input type="text" autocomplete="off" id="daysCalculated" name="daysCalculated" class="form-control  input-style" placeholder="Days Posted" readonly/><!--randomly input can't be modified but value can be acceptable in php $_post -->
</div>

<div class="form-group profile-form__styling">
    <label for="priceCalculated" class="label-style">Price for the post. 1.00$ per day<sup>(15 days min)</sup></label>
    <input type="text" autocomplete="off" id="priceCalculated" name="priceCalculated" class="form-control  input-style" placeholder="Price in $" readonly/>
</div>
</div> <!--end of hiiden box -->

<div class="d-flex justify-content-around align-items-end profile-form__item-price ">

<div class="">
        <label for="post_price" class="label-style">Price</label>
        <input type="number" id="post_price" name="post_price" class="input-style" placeholder="ex. $100" autocomplete="off" readonly>
</div>

<div class="profile-form__item-price-radio"  >
    <div class="profile-form__radio-group">
        <input type="radio"  class="profile-form__radio-input" id="amount" value="amount" name="radio_price">
            <label for="amount" class="profile-form__radio-label">
                <span class="profile-form__radio-button"></span>Amount
            </label>
    </div>
    <div class="profile-form__radio-group">
            <input type="radio"  class="profile-form__radio-input" id="negotiable" value="negotiable" name="radio_price">
                <label for="negotiable" class="profile-form__radio-label">
                    <span class="profile-form__radio-button"></span>Negotiable
                </label>
    </div>
    <div class="profile-form__radio-group">
            <input type="radio"  class="profile-form__radio-input" id="swap_trade" value="swap_trade" name="radio_price">
                <label for="swap_trade" class="profile-form__radio-label">
                    <span class="profile-form__radio-button"></span>Swap/Trade
                </label>
    </div>
</div>
</div>


<div class="">
            <label for="summernote" class="label-style">Content/Description of the ad advertisement</label>
            <textarea id="summernote" name="post_content"></textarea>
</div>

        <div class="d-flex justify-content-start mb-3 mt-3 ml-3">
                <div class="">
                        <label for="condition" class="label-style">Condtion</label>
                </div>
                <div class="profile-form__radio-group">
                        <input type="radio"  class="profile-form__radio-input" id="new" value="new" name="condition">
                            <label for="new" class="profile-form__radio-label">
                                <span class="profile-form__radio-button"></span>New
                            </label>
                </div>
                <div class="profile-form__radio-group">
                        <input type="radio"  class="profile-form__radio-input" id="used" value="used" name="condition">
                            <label for="used" class="profile-form__radio-label">
                                <span class="profile-form__radio-button"></span>Used
                            </label>
                </div>
        </div>
        
        <div class="profile-form__styling">
                <label for="specific_item" class="label-style">Images</label>
                <input type="file" name="file[]" class="form-control input-style" multiple>
        </div>
<div class="profile-form__styling">
        <label for="city" class="label-style">Select one of the Capital Cities:</label>
                <select name="city" class="form-control select-style">
                <option value="none" selected>Select City</option>
                <option value="Adelaide">Adelaide</option>
                <option value="Melbourne" >Melbourne</option>
                <option value="Canberra">Canberra</option>
                <option value="Sydney">Sydney</option>
                <option value="Brisbane">Brisbane</option>
                <option value="Hobart">Hobart</option>
                <option value="Darwin">Darwin</option>
              
        </select>
</div>




<div class="d-flex justify-content-between flex-wrap">
  
  
  <div class="">
              <label for="email" class="label-style">Email <sup class="text-danger"> Optional</sup></label>
              <input  type="email" id="email" name="email" class="form-control input-style"  placeholder="@">
  </div>
  <div class="">
              <label for="contact_name" class="label-style">Contact Name <sup class="text-danger"> Optional</sup></label>
              <input  type="text" id="contact_name" name="contact_name" class="form-control input-style" placeholder="Contact Name">
  </div>
  
  <div class="" >
              <label for="contact_number" class="label-style">Contact Number <sup class="text-danger"> Optional</sup></label>
              <input  type="tel" id="contact_number" name="contact_number" class="form-control input-style" placeholder="(0x) xxxx xxxx" pattern="[0-9]{2}[0-9]{4}[0-9]{4}">
  </div>
  
  
    
    </div>  

     <div class="profile-form__styling">
     <label for="full_address" class="label-style">Enter address</label>
     <input id="autocomplete"
             placeholder="Enter your address"
             onFocus="geolocate()"
             type="text" class="form-control input-style" name="full_address"/>
     </div>


    <div class="profile-form__styling">
    <label for="suburb" class="label-style">Enter Suburb or Zip/Postcode</label>
    <input type="text" class="form-control input-style" id="tokenfield" name="suburb" style="width:80%;" />
    </div>
    

        <div class="text-center">
            <button type="submit" id="submit_new_post"  name="submit_new_post" class="btn btn-success form-btn">Publish the Ad</button>
        </div>
        </form>
    </section> 

    
</main>
    </div>
   <!--Footer-->
<?php include (ROOT_PATH."profile/inc/footer.php");?>
</div>
   <!--Footer-->
<?php include (ROOT_PATH."profile/inc/profile-scripts.php");?>