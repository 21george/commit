
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
<?php include ("../models/Job.php");?>
<?php include ("../models/Category.php");?>
<?php

$job = new Job();
$cat = new Category();
$cat_title= "Jobs";
$parent_id = $cat->getCatId($cat_title);
$alljobs = $job->getAllJobs($parent_id->cat_id);

?>
<section class="content-form d-flex justify-content-center align-items-center flex-wrap">
        <div class="heading-tertiary">Add Job Ad</div>
        <form method="POST" id="multiplesub" name="multiplesub" class="profile-form" action="<?php echo BASE_URL?>php/add-post.php"
        enctype="multipart/form-data">

        <div>
            <label class="subtitle-style p-2 " style="line-height:1.3rem">Every free post/ad can be maximum posted for 30 days</label>
        </div>

        <div class="profile-form__styling">
            <label for="post_title" class="label-style">Ad Job Title</label>
            <input type="text" name="post_title" id="post_title" class="input-style" placeholder="Enter your title" autocomplete="off" required>
        </div>
        <div class="profile-form__styling">
            <label for="sub_title" class="label-style">Enter Job Subtitle <sup class="text-danger">Optional</sup></label>
            <input type="text" class="form-control input-style" name="sub_title" id="sub_title">
</div>
        <div class="profile-form__styling">
                <label for="post_type" class="label-style">Post Type ex: Standard</label>
                <select  id="post_type" name="post_type" class="form-control select-style" onchange="selectPaymentMethod(this.value);">
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

<div class="form-group">
<div class="profile-form__styling"  >
        <label for="job_classification" class="label-style">Select Job Occupation:</label>
                <select name="job_classification" id ="job_classification" class="form-control select-style" >
                <option value='default'  id='selectedIndex'>Select</option>
                <?php
                    foreach($alljobs as $jobs){
                       
                        echo "<option value='$jobs->sub_id'  id='selectedIndex'>$jobs->title</option>";
                    } 
                ?>
                </select>
    </div>


<div class="profile-form__styling" style="width:100%;" >
<label for="specific_job" class="label-style">Select Job Title:</label>
    <select id="specific_job"  name="specific_job" class="form-control select-style" >
    <option value="">Select Job Occupation First</option>
    </select>
    </div>
</div>
<div class="">
            <label for="summernote" class="label-style">Content/Description of the job advertisement</label>
            <textarea id="summernote" name="post_content"></textarea>
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

        <div class="profile-form__styling">
                <label for="specific_item" class="label-style">Image of Company</label>
                <input type="file" name="file[]" class="form-control input-style" multiple>
        </div>
        <div class="profile-form__styling">
            <label for="job_type" class="label-style">Types of employees <sup class="text-danger">Optional</sup></label>
            <select name="job_type" class="form-control select-style">
                          <option value="none" selected>None</option>
                            <option value="full_time">Full-time</option>
                            <option value="part_time" > Part-time</option>
                            <option value="casual"> Casual</option>
                            <option value="fixed_term">Fixed term</option>
                            <option value="shiftworkers"> Shiftworkers</option>
                            <option value="daily_hire">Daily Hire</option>
                            <option value="weekly_hire" >Weekly Hire</option>
                            <option value="probation">Probation</option>
                            <option value="Outworkers">Outworkers</option>
                    </select>
</div>


  <div class="d-flex justify-content-between flex-wrap">
  
  
<div class="">
            <label for="salary" class="label-style">Salary <sup class="text-danger"> Optional</sup></label>
            <input  type="number" id="salary" name="salary" class="form-control input-style"  placeholder="$60k - 75k">
</div>
<div class="">
            <label for="hourly_rate_from" class="label-style">Hourly Rate From <sup class="text-danger"> Optional</sup></label>
            <input  type="number" id="hourly_rate_from" name="hourly_rate_from" class="form-control input-style" placeholder="$24">
</div>

<div class="" >
            <label for="hourly_rate_to" class="label-style">Hourly Rate To <sup class="text-danger"> Optional</sup></label>
            <input  type="number" id="hourly_rate_to" name="hourly_rate_to" class="form-control input-style" placeholder="$27">
</div>


  
  </div>  

  <div class="profile-form__styling">
            <label for="company_email" class="label-style">Email us at <sup class="text-danger">Optional</sup></label>
            <input type="email" class="form-control input-style" name="company_email" id="company_email" placeholder="Enter Your Email">
</div>
<div class="profile-form__styling">
        <label for="application_link"  class="label-style">Enter Application link: <sup class="text-danger">Optional</sup></label>
        <input   type="url" class="form-control input-style" name="application_link" id="application_link" placeholder="Enter your application link so the job seekers can apply directly access your platform">
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
            <button type="submit" id="submit_job_post"  name="submit_job_post" class="btn btn-success form-btn">Submit the Ad</button>
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