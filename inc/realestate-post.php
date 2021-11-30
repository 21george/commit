                    <!-- This is our realestate card-->
                    <div class="col-md-3 col-sm-6 col-xs-12 advertisement" id="advertisement">
                        <div class="advertisement__side advertisement__side--front">
                        <div class="advertisement__picture">
                        <?php 
                         $post_featured_image = trim($p->post_featured_img);
                        $image_numb = $img->getPostImages($post_featured_image);
                        $post_featured_image_pieces = $img->getAllImages($post_featured_image);
                        ?>
                            <img src="img/posts/<?php if(isset($post_featured_image_pieces[0])){
                            echo $post_featured_image_pieces[0];
                            }
                            else{
                                echo "logo.png";
                            };?>" alt="<?php echo $post_featured_image_pieces[0];?>">
                        </div>
                        <h4 class="advertisement__heading">
                            <span class="advertisement__heading-span advertisement__heading-span--1">
                                <?php echo $p->post_title;?></span>
                        </h4>

                        <div class="advertisement__specific-details">
                            <div class="advertisement-svgicons">
                                <svg>
                                    <use xlink:href="img/SVG/symbol-defs.svg#icon-home"></use>
                                </svg>
                               <span><?php if(isset($getRealEstate->post_property_type)){echo $getRealEstate->post_property_type;};?></span>

                               <svg>
                                    <use xlink:href="img/SVG/symbol-defs.svg#icon-bed"></use>
                                </svg>
                                <span><?php if(isset($getRealEstate->num_beds)){echo $getRealEstate->num_beds;};?></span>
                                <svg>
                                        <use xlink:href="img/SVG/symbol-defs.svg#icon-shower"></use>
                                    </svg>
                                <span><?php if(isset($getRealEstate->num_showers)){echo $getRealEstate->num_showers;};?></span>
                                <svg>
                                        <use xlink:href="img/SVG/symbol-defs.svg#icon-local_parking"></use>
                                    </svg>
                                <span><?php if(isset($getRealEstate->num_parking)){echo $getRealEstate->num_parking;};?></span>
                            </div> <!--advertisement svgicons end-->
                            <div class="advertisement__address">
                                    <svg>
                                        <use xlink:href="img/SVG/symbol-defs.svg#icon-map"></use>
                                    </svg>
                                    <span><?php echo $p->full_address;?></span>
                            </div><!--address end-->
                        </div><!--advertisement__specific-details end-->
                        <div class="advertisement-brief-desc">
                            <p><?php echo $p->post_content;?></p>
                        </div>
                        <div class="advertisement-type">
                            <!-- <p>Auction</p>
                            <p>Sale</p> -->
                            <p><span>$</span><?php if(isset($getRealEstate->advertised_price)){echo $getRealEstate->advertised_price;};?></p>
                        </div>
                    </div><!-- front of the card ends-->
             
                    <div class="advertisement__side advertisement__side--back advertisement__side--back-1">
                        <div class="advertisement__company advertisement__individual">
                            <img src="<?php echo BASE_URL."/img/users/$getOwner->user_image";?>"; 
                            alt="<?php echo $getOwner->user_name;?>" class="advertisement__company--logo">
                            <div class="advertisement__company-details">
                                <div class="advertisement__company--name"><span class="comp-individual-details">Company:</span>Infinity</div>
                                <div class="advertisement__company--date-posted"><span class="comp-individual-details">Date:</span><?php echo $post->getPostDate($p->created_at);?></div>
                                <div class="advertisement__company-author-name"><span class="comp-individual-details">Name:</span>
                                <?php if(($getOwner->user_firstname !="") && ($getOwner->user_lastname !="")){
                                    echo $getOwner->user_firstname." ".$getOwner->user_lastname;
                                }else{
                                    echo $getOwner->user_name;
                                } ?></div>
                            </div>

                        </div><!--End of advertisement comopany details-->

                        <div class="advertisement__details">
                                <ul>
                                    <li>First Feature</li>
                                    <li>Second Feature</li>
                                    <li>Third Features</li>
                                </ul> 
                        </div>
                        <div class="advertisement__cta">
                            <div class="advertisement__picture-box">
                                <a href="<?php echo BASE_URL?>categories/post.php?pid=<?php echo $p->post_id;?>" class="advertisement__link btn-text">Read More</a>
                                <p class="advertisement__price-value">$<?php if(isset($getRealEstate->advertised_price)){echo $getRealEstate->advertised_price;};?></p>
                            </div>
                        </div>
                        <div class="advertisement__bottom-logo advertisement__bottom-logo-bgcolorharcourts">
                                <div class="advertisement__bottom-logo-photo">
                                   <img src="img/harcourts.gif" alt="harcourts">
                                </div>
                        </div>

                    </div><!-- End of the back-->
                    
                    </div><!-- End of the advertisement column-->
