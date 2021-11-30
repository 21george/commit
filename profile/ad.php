
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
        <div class="heading-tertiary">Select What You Want to post</div>
        <form method="POST" class="profile-form" 
        enctype="multipart/form-data">

       


        <div class="profile-form__styling">
                <label for="post_cat_id" class="label-style">Select Category</label>
                <select  id="post_cat_id" name="post_cat_id" class="form-control select-style" onchange="getCategory(this.value);">
                    <option value="default" >Select</option>
                    <?php
                    include (ROOT_PATH."models/Category.php");
                    $category = new Category();
                    $categories = $category->getCategory();
                   foreach($categories as $c){
                       echo "<option value='$c->cat_id'>$c->cat_title</option>";
                   }
                    ?>
                </select>
        </div>

     
    
    

        <div class="text-center">
            <a href="" id="form_link" name="form_link"  class="btn btn-success form-btn">Create Ad</a>
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