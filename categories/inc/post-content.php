<section class="post-body__content">
        <div class="post-body__content-sub">
            <h2 class="heading-2"><?php echo $postInfo->post_title;?></h2>
            <h3 class="heading-3 post-body__content-sub--2">
            <?php if(isset($thisJob)&& isset($thisJob->sub_title)){
                echo $thisJob->sub_title;
                echo "<p class='text-left text-success mt-2'>$postInfo->city > $thisJob->job_name</p>";
            }
            ?>
            </h3>
        </div>
        <div class="contact-agent-box">
            <h3 class="contact-agent-box-heading">Open For Inspection Times</h3>
            <p class="contact-agent-box-desc">
                No inspections are currently scheduled. to arrange an appointment</p>
                <a href="#contact-agent" class="button-link">Contact the Company/Owner</a>
        </div>
        <div class="post-body__content-desc">
        <p class="body_description"><?php echo $postInfo->post_content;?></p>
        <?php if(isset($thisJob)):?>
        <p class="text-danger">You can apply directly to this link: <a href="<?php if(isset($thisJob->application_link)){echo $thisJob->application_link;}?>">Apply</a></p>

<?php endif;?>

<?php if(isset($thisAd)):?>
<p class="text-success"> Contact Name : <?php if(isset($thisAd->contact_name)){echo "<strong class='text-black-50'>$thisAd->contact_name</strong>";}?></p>
<p class="text-success">You can call direclty to this number : <?php if(isset($thisAd->contact_number)){echo $thisAd->contact_number;}?></p>
<p class="text-success">Asking price is : <?php if(isset($thisAd->price_or_options)){echo $thisAd->price_or_options;}?></p>

        <?php endif;?>
        </div>

      <div class="post-body__content-postmap">
  
    <input id="address" style="border:none; width:100%;" type="textbox" value="<?php echo $postInfo->full_address;?>">
  
          <!-- <div id="formatted-address" class="post-body__content-postmap-address"></div>
          <div id="geometrylat" class="post-body__content-postmap-lat"></div>
          <div id="geometrylng" class="post-body__content-postmap-lng"></div>
          <div id="address-components" class="post-body__content-postmap-components"></div> -->
          <div id="map" class="post-body__content-postmap-map"></div>
    </div>
    
    </section>
    <!--end of post content-->