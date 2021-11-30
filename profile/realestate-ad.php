
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
        <div class="heading-tertiary">Add Real estate Ad</div>
        <form method="POST" id="multiplesub" name="multiplesub" class="profile-form" action="<?php echo BASE_URL?>php/add-post.php"
        enctype="multipart/form-data">

        <div>
            <label class="subtitle-style ">Every free post/ad can be maximum posted for 30 days</label>
        </div>

        <div class="profile-form__styling">
            <label for="post_title" class="label-style">Ad Title</label>
            <input type="text" name="post_title" id="post_title" class="input-style"  autocomplete="off" required>
        </div>
        <div class="profile-form__styling">
                <label for="post_type" class="label-style">Post Type ex: Standard</label>
                <select  id="post_type" name="post_type" class="form-control select-style" onchange="selectPaymentMethod(this.value);">
                    <option value="free" >Free</option>
                    <option value="standard" >Standard</option>
                </select>
        </div>

<div class="dates_box d-none " id="dates_box">

<div class="profile-form__styling">
                <label for="startDate" class="label-style">Start Date</label>
                <input type="date" max="3000-12-30" id="startDate" name="startDate" autocomplete="off" 
                class="input-style" placeholder="dd-mm-yyyy" onchange="numDays()">
</div>


<div class="profile-form__styling">
                <label for="endDate" class="label-style">End Date</label>
                <input type="date" max="3000-12-30" id="endDate" name="endDate" autocomplete="off" 
                class="input-style" placeholder="dd-mm-yyyy" onchange="numDays()" >
</div>


<div class="profile-form__styling">
            <label for="daysCalculated" class="label-style">Number of Days Your Ad will be visible <sup>(15 days min)</sup></label>
            <input type="text" name="daysCalculated" id="daysCalculated" class="input-style" placeholder=" Days posted" readonly>
</div>

<div class="profile-form__styling">
            <label for="priceCalculated" class="label-style">Price for the ad is 1$ per day<sup>(15 days min)</sup></label>
            <input type="text" name="priceCalculated" id="priceCalculated" class="input-style" placeholder=" Prices in $" readonly>
</div>

</div><!--div for dates section ends here-->




        

        <div class="profile-form__styling">
                <label for="specific_item" class="label-style">Ad Your Images</label>
                <input type="file" name="file[]" class="form-control input-style" multiple>
        </div>
        <div class="profile-form__styling">
                    <label for="post_property_type" class="label-style">Select Property Type</label>
                    <select  id="post_property_type" name="post_property_type" class="form-control select-style" required>
                        <option value="APARTMENT" selected>Apartment</option>
                        <option value="HOUSE" >House</option>
                        <option value="UNIT" >Unit</option>
                        <option value="TOWNHOUSE" >Townhouse</option>
                        <option value="LAND" >Land</option>
                        <option value="VILLA" >Villa</option>
                    </select>
            </div>
        <div class="">
            <label for="summernote" class="label-style">Content</label>
            <textarea id="summernote" name="post_content"></textarea>
        </div>

    
<div class="profile-form__styling">
            <label for="num_beds" class="label-style">Number of beds</label>
            <input type="text" name="num_beds" id="num_beds" class="input-style" required>
</div>
<div class="profile-form__styling">
            <label for="num_parking" class="label-style">Number of car parking spaces</label>
            <input type="text" name="num_parking" id="num_parking" class="input-style" required>
</div>
<div class="profile-form__styling">
            <label for="num_showers" class="label-style">Number of showers</label>
            <input type="text" name="num_showers" id="num_showers" class="input-style"  required>
</div>

<div class="profile-form__styling">
            <label for="num_toilets" class="label-style">Number of toilets/bathrooms</label>
            <input type="text" name="num_toilets" id="num_toilets" class="input-style"  required>
</div>
<div class="profile-form__styling">
            <label for="advertised_price" class="label-style">Asking Price</label>
            <input type="text" name="advertised_price" id="advertised_price" class="input-style"  required>
</div>


<div class="profile-form__styling">
                    <label for="sale_type" class="label-style">Select Sale Type</label>
                    <select  id="sale_type" name="sale_type" class="form-control select-style" required>
                        <option value="auction" selected>Auction</option>
                        <option value="sale" >Sale</option>
                        <option value="private" >Private</option>
                    </select>
            </div>
     <div class="profile-form__styling">
     <label for="full_address" class="label-style">Enter address</label>
     <input id="autocomplete"
             placeholder="Enter your address"
             onFocus="geolocate()"
             type="text" class="form-control input-style" name="full_address"/>
     </div>


    <div class="profile-form__styling" style="width:75%;">
    <label for="suburb" class="label-style">Enter Suburb or Zip/Postcode</label>
    <input type="text" class="form-control input-style" id="tokenfield" name="suburb" />
    </div>
    
    

        <div class="text-center">
            <button type="submit" id="submit_realestate_post"  name="submit_realestate_post" class="btn btn-success form-btn">Publish</button>
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