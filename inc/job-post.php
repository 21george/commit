
                   <!-- This is our jobs card-->
                   <div class="col-md-3 col-sm-6 col-xs-12 advertisement" id="advertisement">
                        <div class="advertisement__side advertisement__side--front">
                            <h4 class="advertisement__heading advertisement__heading-jobs ">
                                <span class="advertisement__heading-span advertisement__heading-span--4">
                                       <?php echo $p->post_title?>
                                </span>
                            </h4>
                            <h3 class="advertisement__hiring-company-name">Infinity REA group</h3>
                            <p class="advertisement__hiring-jobclassifcation">
                                <span class="place"><?php echo $p->city?>:</span><?php echo $getJobs->job_name;?>
                            </p>
                        <div class="advertisement__specific-details">
                         
                            <div class="advertisement__address">
                                    <svg>
                                        <use xlink:href="img/SVG/symbol-defs.svg#icon-location2"></use>
                                    </svg>
                                    <span><?php echo $p->full_address;?></span>
                            </div><!--address end-->
                        </div><!--advertisement__specific-details end-->
                        <div class="advertisement-brief-desc advertisement-brief-desc-jobs">
                            <p><?php echo $p->post_content;?></p>
                        </div>
                        <p class="advertisement__salary"><span><?php 
                      
                        if(isset($getJobs->salary) && $getJobs->salary !=0 ){

                            echo "Salary: $".$getJobs->salary."k";
                        } 
                        else{
                            if(isset($getJobs->hourly_rate_from)){
                         
                                echo "Hourly rate: From $".$getJobs->hourly_rate_from." to $".$getJobs->hourly_rate_to;
                            
                        }
                        }
                      ?></span></p>
                        <div class="advertisement-type">
                            <!-- <p>Auction</p>-->
                            <!-- <p>For Sale</p> -->
                            <!-- <p><span>$</span>478,500</p> -->
                            <p class="advertisement-type--jobtype">Job Type: <?php echo $getJobs->job_type;?></p>
                        </div>
                    </div><!-- front of the card ends-->
             
                    <div class="advertisement__side advertisement__side--back advertisement__side--back-4">
                        <div class="advertisement__company advertisement__individual">
                            <img src="<?php echo BASE_URL."/img/users/$getOwner->user_image";?>" 
                            alt="<?php echo $getOwner->user_name;?>" class="advertisement__company--logo">
                            <div class="advertisement__company-details">
                                <div class="advertisement__company--name"><span class="comp-individual-details">Company:</span> <?php if(($getOwner->user_firstname!="") && ($getOwner->user_lastname!="")){
                                    echo $getOwner->user_firstname." ".$getOwner->user_lastname;
                                }else{
                                echo $getOwner->user_name;
                                }?></div>
                                <div class="advertisement__company--date-posted"><span class="comp-individual-details">Date:</span>
                                <?php echo $post->getPostDate($p->created_at);?></div>
                                <div class="advertisement__company-author-name"><span class="comp-individual-details">Name:</span>
                                <?php if(($getOwner->user_firstname!="") && ($getOwner->user_lastname!="")){
                                    echo $getOwner->user_firstname." ".$getOwner->user_lastname;
                                }else{
                                echo $getOwner->user_name;
                                }?></div>
                            </div>
    
                        </div><!--End of advertisement company details-->
    
                        <div class="advertisement__details">

                                <ul>
                                    <li><?php  if(isset($getJobs->job_type)){echo $getJobs->job_type;}?></li>
                                    <li><?php if(isset($getJobs->salary) && $getJobs->salary!=0){
                                        echo "Salary: $".$getJobs->salary."k";
                                    }else{
                                        if(isset($getJobs->hourly_rate_from)){
                                            echo "Hourly rate: From $".$getJobs->hourly_rate_from." to $".$getJobs->hourly_rate_to;
                                        }
                                    };?></li>
                                    <li><?php echo $getJobs->job_occupation."<h3 class='text-black-50'> > ".$getJobs->job_name."</h3>";?></li>
                                    <li><?php echo "Location:".$p->city;?></li>
                                </ul> 
                        </div>
                        <div class="advertisement__apply-link">
                            <a href="<?php echo $getJobs->application_link;?>">Apply for the job</a>
                        </div>
                        <div class="advertisement__cta">
                            <div class="advertisement__picture-box">
                                <a href="<?php echo BASE_URL?>categories/post.php?pid=<?php echo $p->post_id;?>" class="advertisement__link btn-text">Read More</a>
                              
                                <p class="advertisement__company-reviews">Review 5/5</p>
                                <p class="advertisement__days_posted"><?php  $timeAgo = strtotime($p->created_at);
                                $post->timeAgo($timeAgo);
                                ?></p>
                            </div>
                        </div>

    
                    </div><!-- End of the back-->
                    
                    </div><!-- End of the car advertisement column-->
