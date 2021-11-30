<section class="contact-agent">

        <div class="contact-agent-company-name">
            <h1><?php echo $postInfo->user_firstname." ".$postInfo->user_lastname;?></h1>
        </div>
        <?php if(isset($thisJob)):?>
             <div class="enquire-about">Job Enquiry: <?php echo $thisJob->job_name;?></div>
        <?php endif;?>
        <?php if(isset($real)):?>
             <div class="enquire-about">Enquiry about: <?php echo $postInfo->full_address;?></div>
        <?php endif;?>
        <?php if(isset($thisAd)):?>
             <div class="enquire-about">Enquiry about: <?php echo $postInfo->post_title;?></div>
        <?php endif;?>
        <?php if(isset($real)):?>
        <div class="realtors-profiles">
            <img src="<?php echo BASE_URL."/img/users/$postInfo->user_image";?>" alt="<?php echo $postInfo->user_firstname;?>" class="realtors-profiles-img"> 
            <div class="realtors-profiles-name"><?php echo $postInfo->user_firstname;?></div>
            <div class="realtors-profiles-phone"><?php echo $postInfo->user_phone;?></div>
            <a href="#"><div class="realtors-profiles-view-profile">View profile</div></a>
        </div>

        <div class="realtors-profiles--2">
                <img src="<?php echo BASE_URL."/img/users/$postInfo->user_image";?>" alt="<?php echo $postInfo->user_firstname;?>" class="realtors-profiles-img"> 
                <div class="realtors-profiles-name"><?php echo $postInfo->user_firstname;?></div>
            <div class="realtors-profiles-phone"><?php echo $postInfo->user_phone;?></div>
                <a href="#"><div class="realtors-profiles-view-profile">View profile</div></a>
     </div>
<?php endif;?>

            <form class="contact-agent-form" action="<?php ROOT_PATH."php/send-email.php"?>" id="emailForm" enctype="multipart/form-data" method="POST">

                <div class="contact-agent-form-name d-none">
                    <input type="text" 
                    class="form-control input-style" name="user_id" id="user_id" value="<?php echo $postInfo->user_id;?>" required readonly>
                </div>
                <div class="contact-agent-form-name d-none">
                    <input type="text" 
                    class="form-control input-style" name="post_id" id="post_id" value="<?php echo $postInfo->post_id;?>" required readonly>
                </div>

                <div class="contact-agent-form-link d-none">
                    <input type="text" 
                    class="form-control input-style" name="desc" id="desc" value="<?php 
                    if($postInfo->post_cat_id == "1"){
                        echo $postInfo->full_address;

                    }
                    else{
                        echo $postInfo->post_title;
                    };?>" required readonly>
                </div>

               <div class="contact-agent-form-email">
                    <label for="setFrom" class="label-style">From:</label>
                        <input type="email" 
                        class="form-control input-style" name="setFrom" id="setFrom" autocomplete="off" required >
               </div>
               <?php if($postInfo->post_cat_id=="2"):?>
               <div class="contact-agent-form-resume">
                <label for="user_resume" class="label-style">Attach Resume:</label>
                    <input type="file" 
                    class="form-control input-style user_resume" name="user_resume" id="user_resume" accept=".doc,.docx,.pdf,.txt" required >
           </div>
                <?php endif;?>

               <div class="contact-agent-form-phone-number">
                    <label for="user_mobile" class="label-style">Your Number:</label>
                        <input type="tel" 
                        class="form-control input-style" name="user_mobile" id="user_mobile" placeholder="(0x) xxxx xxxx" 
                        pattern="[0-9]{2}[0-9]{4}[0-9]{4}" autocomplete="off" required >
               </div>


               <?php if($postInfo->post_cat_id=="2"):?>

               <div class="from-group contact-agent-form-reason_select">
                  <p>Work Experience</p>
                   <select id="email_reason" name="email_reason" class="form-control select-style">
                       <option value="1" >1</option>
                       <option value="2" >2</option>
                       <option value="3" selected>3</option>
                       <option value="4" >4</option>
                       <option value="5" >5</option>
                       <option value="6" >6</option>
                       <option value="7" >7</option>
                       <option value="8" >8</option>
                       <option value="9" >9</option>
                       <option value="10" >10</option>
                   </select>
               </div>

                <?php else:?>
               <div class="from-group contact-agent-form-reason_select">
                  <p>Select reason</p>
                   <select id="email_reason" name="email_reason" class="form-control select-style">
                       <option value="Quote" >Get a Quote</option>
                       <option value="Meeting" >Inspection Meeting</option>
                       <option value="Information" selected>Information</option>
                       <option value="Job-Offer" >Job Offer</option>
                       <option value="Price-Indication" >Property Price indication</option>
                       <option value="Trade-Swap" >Trade & Swap</option>
                       <option value="Item-Condition" >Item Condition</option>
                       <option value="Other" >Other</option>
                   </select>
               </div>
               
               <?php endif?>
               <?php if($postInfo->post_cat_id=="2"):?>
               <div class="contact-agent-form-cover-letter">
                <label for="user_cl" class="label-style">Attach Cover Letter:</label>
                    <input type="file" 
                    class="form-control input-style" name="user_cl" id="user_cl" accept=".doc,.docx,.pdf,.txt" required >
           </div>
                <?php endif;?>
               <div class="contact-agent-form-massage">
                   <label for="message_body" class="label-style">Your Message</label>
                   <textarea name="message_body" id="message_body" class="textarea" cols="30" rows="10" required></textarea>
               </div>

                <div class="message message-bgdanger d-none " id="closeMe">

                <div class="message-icon">
                
                <p class="success fail"> </p>
                </div>
                <div class="message-body">
              
                <p class="u-italic">Here we will put the message</p>
                </div>
                <button class="message-close"><i class="fa fa-times"></i></button>
                </div>
               <button id="btnSubmit" name="contact-agent"  class="btn btn-primary contact-agent-form-btn">Submit</button>
            </form>

    </section>
     <!--end of post contact agent end-->