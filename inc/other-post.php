<?php 
$post_featured_image = trim($p->post_featured_img);
$image_numb = $img->getPostImages($post_featured_image);
$post_featured_image_pieces = $img->getAllImages($post_featured_image);
?>
<div class="col-md-3 col-sm-6 col-xs-12 advertisement" id="advertisement">
                        <div class="advertisement__side advertisement__side--front">
                        <div class="advertisement__picture">
                            <img src="img/posts/<?php echo $post_featured_image_pieces[0];?>" alt="<?php echo $post_featured_image_pieces[0];?>">
                        </div>
                        <h4 class="advertisement__heading">
                            <span class="advertisement__heading-span advertisement__heading-span--2">
                               <?php echo $p->post_title;?></span>
                        </h4>

 
                        <div class="advertisement-brief-desc">
                            <p> <?php echo $p->post_content;?></p>
                        </div>
                        <div class="advertisement__address">
                            <svg>
                                <use xlink:href="img/SVG/symbol-defs.svg#icon-location2"></use>
                            </svg>
                            <span><?php echo $p->full_address;?></span>
                    </div><!--address end-->
                    <div class="advertisement-type">
                        <p>Sale: $<?php echo $getOthers->price_or_options;?></p>
                    </div>
                    </div><!-- front of the card ends-->
             
                    <div class="advertisement__side advertisement__side--back advertisement__side--back-2">
                        <div class="advertisement__company advertisement__individual">
                            <img src="<?php echo BASE_URL."/img/users/$getOwner->user_image";?>" 
                            alt="<?php echo $getOwner->user_image;?>" class="advertisement__company--logo">
                            <div class="advertisement__company-details">
                                <div class="advertisement__company--name"><span class="comp-individual-details">Contact Number:</span><?php echo $getOthers->contact_number;?></div>
                                <div class="advertisement__company--date-posted"><span class="comp-individual-details">Date:</span><?php echo $post->getPostDate($p->created_at);?></div>
                                <div class="advertisement__company-author-name"><span class="comp-individual-details">Name:</span> <?php 
                                if(isset($getOthers->contact_name)){
                                    echo $getOthers->contact_name;
                                }
                                else{
                                    if(($getOwner->user_firstname !="") && ($getOwner->user_lastname !="")){
                                        echo $getOwner->user_firstname." ".$getOwner->user_lastname;
                                    }else{
                                        echo $getOwner->user_name;
                                    }
                                }?></div>
                            </div>

                        </div><!--End of advertisement comopany details-->

                        <div class="advertisement__details">
                                <ul>
                                    <li><?php if(isset($getOthers->price_or_options)){ echo "$".$getOthers->price_or_options;}?></li>
                                    <li>Contact me ASAP</li>
                                    
                                </ul> 
                        </div>
                        <div class="advertisement__cta">
                            <div class="advertisement__picture-box">
                                <a href="<?php echo BASE_URL?>categories/post.php?pid=<?php echo $p->post_id;?>" class="advertisement__link btn-text">Read More</a>
                                <p class="advertisement__price-value"><?php if(isset($getOthers->price_or_options)){ echo "$".$getOthers->price_or_options;}?></p>
                            </div>
                        </div>


                    </div><!-- End of the back-->
                    
                    </div><!-- End of the advertisement column-->