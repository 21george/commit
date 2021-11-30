<section class="post-gallery">
<div class="sliding-images">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                <?php 

                if($image_numb==0){
                    echo '
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="../img/logo-black.jpg" alt="'.$post_featured_image_pieces[0].'">
                    </div>';
                }
                if($image_numb==1){
                    echo '
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="../img/posts/'.$post_featured_image_pieces[0].'" alt="'.$post_featured_image_pieces[0].'">
                    </div>';
                }
                if($image_numb>1){
                    for($i=1;$i<$image_numb;$i++){
                        if($i == 1){
                            echo '
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="../img/posts/'.$post_featured_image_pieces[0].'" alt="'.$post_featured_image_pieces[0].'">
                            </div>';
                        }
                        echo '
                        <div class="carousel-item">
                        <img class="d-block w-100" src="../img/posts/'.$post_featured_image_pieces[$i].'" alt="'.$post_featured_image_pieces[0].'">
                        </div>';
                    }
                }
                
                ?>
                  
                   
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
        </div><!--carousel ends-->
        <div class="gallery-description">
            <div class="gallery-description-heading">
                <?php echo $postInfo->post_title;?>
            </div>
            <?php if($cat_name == "Realestate"):?>
            <div class="gallery-description--icons">
                   <i class="fa fa-home"></i>
                   <p class="gallery-description--desc"><?php if(isset($real->post_property_type)){echo $real->post_property_type;};?></p>
            </div>
            <div class="gallery-description--icons">
                    <i class="fa fa-bed"></i>
                    <p class="gallery-description--desc"><?php if(isset($real->num_beds)){echo $real->num_beds;};?></p>
             </div>
             <div class="gallery-description--icons">
                    <i class="fa fa-bath"></i>
                    <p class="gallery-description--desc"><?php if(isset($real->num_toilets)){echo $real->num_toilets;};?></p>
             </div>
             <div class="gallery-description--icons">
                    <i class="fa fa-car"></i>
                    <p class="gallery-description--desc"><?php if(isset($real->num_parking)){echo $real->num_parking;};?></p>
             </div>
            <?php endif;?>
        </div><!--desc ends-->

</div><!--slide ends-->
    </section>
    <!--end of post gallery-->