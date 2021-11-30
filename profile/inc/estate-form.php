
<?php
 include (ROOT_PATH."models/Realestate.php");
 include (ROOT_PATH."models/Img.php");
 $real = new Realestate;
 $img = new Img;
 $getRealEstate = $real->getRealEstatePost($post_id);

 if($user_id != $getRealEstate->user_id){
     include(ROOT_PATH."php/logout.php");
 }
 $getOwner = $user->getUserById($user_id);
 $post_featured_image = trim($getRealEstate->post_featured_img);
 $image_numb =$img->getPostImages($post_featured_image);
 $post_featured_image_pieces = $img->getAllImages($post_featured_image);
?>

<section class="content-form d-flex justify-content-center align-items-center flex-wrap">
        <div class="heading-tertiary">Add Real estate Ad</div>
        <form method="POST" id="multiplesub" name="multiplesub" class="profile-form" action="<?php echo BASE_URL?>php/edit-post.php"
        enctype="multipart/form-data">

        <div>
            <label class="subtitle-style ">Every free post/ad can be maximum posted for 30 days</label>
        </div>

        <div class="profile-form__styling">
            <label for="post_title" class="label-style">Ad Title</label>
            <input type="text" name="post_title" id="post_title" class="input-style" 
            value="<?php if(isset($getRealEstate->post_title)){echo $getRealEstate->post_title;} ?>" autocomplete="off" required>
        </div>



<div class="text-center">
<input type="hidden" id="post_id" name="post_id" value="<?php echo $post_id;?>">

<input type="hidden" id="post_featured_img" name="post_featured_img" value="<?php echo $getRealEstate->post_featured_img;?>">
<h2>The images you have uploaded before</h2>
<?php 
for($i = 0; $i < $image_numb; $i++){
    
echo '<img  src="'.BASE_URL.'img/posts/'.$post_featured_image_pieces[$i].'" alt="First slide" class="ml-1 shadow-lg mb-5 mt-2 bg-white rounded-circle rounded-lg" style="width:100px; height:100px;">';

}
?>
    
</div>
        

        <div class="profile-form__styling">
                <label for="specific_item" class="label-style">Ad new images together with old ones, or don't and they will remain same in our system</label>
                
                <input type="file" name="file[]" class="form-control input-style" multiple>
        </div>
        <div class="profile-form__styling">
                    <label for="post_property_type" class="label-style">Select Property Type</label>
                    <select  id="post_property_type" name="post_property_type" class="form-control select-style" required>
                        <option value="APARTMENT" <?php if(isset($getRealEstate->post_property_type) && $getRealEstate->post_property_type=="APARTMENT"){echo "selected";} ?>>Apartment</option>
                        <option value="HOUSE" <?php if(isset($getRealEstate->post_property_type) && $getRealEstate->post_property_type=="HOUSE"){echo "selected";} ?>>House</option>
                        <option value="UNIT" <?php if(isset($getRealEstate->post_property_type) && $getRealEstate->post_property_type=="UNIT"){echo "selected";} ?>>Unit</option>
                        <option value="TOWNHOUSE" <?php if(isset($getRealEstate->post_property_type) && $getRealEstate->post_property_type=="TOWNHOUSE"){echo "selected";} ?>>Townhouse</option>
                        <option value="LAND" <?php if(isset($getRealEstate->post_property_type) && $getRealEstate->post_property_type=="LAND"){echo "selected";} ?>>Land</option>
                        <option value="VILLA" <?php if(isset($getRealEstate->post_property_type) && $getRealEstate->post_property_type=="VILLA"){echo "selected";} ?>>Villa</option>
                    </select>
            </div>
        <div class="">
            <label for="summernote" class="label-style">Content</label>
            <textarea id="summernote" name="post_content">
            <?php if(isset($getRealEstate->post_content)){echo $getRealEstate->post_content;} ?>
            </textarea>
        </div>

    

     <div class="profile-form__styling">
            <label for="num_beds" class="label-style">Number of beds</label>
            <input type="text" name="num_beds" id="num_beds" class="input-style" placeholder="Number of beds" value ="<?php if(isset($getRealEstate->num_beds)){echo $getRealEstate->num_beds;} ?>" autocomplete="off" required>
        </div>
        <div class="profile-form__styling">
            <label for="num_parking" class="label-style">Number of park spaces</label>
            <input type="text" name="num_parking" id="num_parking" class="input-style" placeholder="Number of car park spaces" value ="<?php if(isset($getRealEstate->num_parking)){echo $getRealEstate->num_parking;} ?>" autocomplete="off" required>
        </div>
        <div class="profile-form__styling">
            <label for="num_showers" class="label-style">Number showers</label>
            <input type="text" name="num_showers" id="num_showers" class="input-style" placeholder="Number of showers"  value ="<?php if(isset($getRealEstate->num_showers)){echo $getRealEstate->num_showers;} ?>" autocomplete="off" required>
        </div>
        <div class="profile-form__styling">
            <label for="num_toilets" class="label-style">Number of bathrooms/toilets</label>
            <input type="text" name="num_toilets" id="num_toilets" class="input-style" placeholder="Number of bathrooms/toilets"  value ="<?php if(isset($getRealEstate->num_toilets)){echo $getRealEstate->num_toilets;} ?>" autocomplete="off" required>
        </div>
        <div class="profile-form__styling">
            <label for="advertised_price" class="label-style">Asking Price</label>
            <input type="text" name="advertised_price" id="advertised_price" class="input-style" placeholder="Set your price:"  value ="<?php if(isset($getRealEstate->advertised_price)){echo $getRealEstate->advertised_price;} ?>" autocomplete="off" required>
        </div>
        
        <div class="profile-form__styling">
                    <label for="sale_type" class="label-style">Select Sale Type</label>
                    <select  id="sale_type" name="sale_type" class="form-control select-style" required>
                        <option value="auction" <?php if(isset($getRealEstate->sale_type) && $getRealEstate->sale_type=="auction"){echo "selected";} ?> >Auction</option>
                        <option value="sale"  <?php if(isset($getRealEstate->sale_type) && $getRealEstate->sale_type=="sale"){echo "selected";} ?>  >For Sale</option>
                        <option value="private"  <?php if(isset($getRealEstate->sale_type) && $getRealEstate->sale_type=="private"){echo "selected";} ?> >Private</option>
                       
                    </select>
            </div>


    

        <div class="text-center">
            <button type="submit" id="edit_realestate_post"  name="edit_realestate_post" class="btn btn-success form-btn">Publish</button>
        </div>
        </form>
    </section> 
