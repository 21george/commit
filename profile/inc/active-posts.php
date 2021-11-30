<div class="heading-tertiary ">Our Active Posts/Ads</div> 
<section class="section-posts ">
<div class="row">

<?php 

require_once ROOT_PATH."/models/User.php";
require_once ROOT_PATH."/models/Post.php";
require_once ROOT_PATH."/models/Realestate.php";
require_once ROOT_PATH."/models/Category.php";
require_once ROOT_PATH."/models/Img.php";

$post = new Post;
$img = new Img;
$user_id = $_SESSION['user_id'];
$userPosts = $post->getAllPosts($user_id);
// print_r($userPost);

if($userPosts){
  foreach($userPosts as $p){
    $thePost = $post->getPostByPostId($p->post_id);
     //$the_featured_img = $thePost->post_featured_img;
      $post_featured_image = trim($thePost->post_featured_img);
      $image_numb = $img->getPostImages($post_featured_image);
      $post_featured_image_pieces = $img->getAllImages($post_featured_image);
    
      
?>

  <div class="col-md-4 col-sm-6">
      <div class="post text-center">
          <div class="post__total-images"><?php  echo $image_numb;?></div>
          <h2 class="post-heading"><?php  echo $p->post_title;?></h2>
          <div id="carouselExampleIndicators-<?php echo $p->post_id;?>" class="carousel slide post__img"  data-ride="carousel">
        <ol class="carousel-indicators">
        <?php 
        if($image_numb==1){
          echo '<li data-target="#carouselExampleIndicators-<?php echo $p->post_id;?>" data-slide-to="0" class="active"></li>';
        }
        else{
          if($image_numb>1){
            for($i=1; $i<$image_numb;$i++){
              echo '<li data-target="#carouselExampleIndicators-<?php echo $p->post_id;?>" data-slide-to="'.$i.'" class="active"></li>';
            }
          }
        }
      
        ?>
         
        </ol>
        <div class="carousel-inner">
        <?php 
       if($image_numb == 0){
        echo '<div class="carousel-item active">
        <img class="d-block w-100" src="../img/logo.png" alt="Default">
      </div>';
      }
        if($image_numb == 1){
          echo '<div class="carousel-item active">
          <img class="d-block w-100" src="../img/posts/'.$post_featured_image_pieces[0].'" alt="First slide">
        </div>';
        }
        else{
         for($i=1;$i<$image_numb;$i++){
           if($i==1){
            echo '<div class="carousel-item active">
            <img class="d-block w-100" src="../img/posts/'.$post_featured_image_pieces[0].'" alt="First slide">
          </div>';
           }
           
            echo '<div class="carousel-item ">
            <img class="d-block w-100" src="../img/posts/'.$post_featured_image_pieces[$i].'" alt="First slide">
          </div>';
           
         }
        }
        ?>
      
         

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators-<?php echo $p->post_id;?>" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators-<?php echo $p->post_id;?>" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
</div><!--end of new carousel-->


          <div class="post__price">
              <h1 class="post__price-margin">Mackay Club</h1>
          </div>
          <div class="post-description">
              <p class="post-description__content">
                <?php echo $p->post_content;?>
              </p>
          </div>
          <div class="post-icons">

          </div>
          <div class="post-link">

        
          <!-- <form action="edit.php" method="POST" class="form-inline">
                <input type="hidden" id="cat_id" name="cat_id" value="<?php echo $p->post_cat_id;?>">
                <input type="hidden" id="post_id" name="post_id" value="<?php echo $p->post_id;?>">
                <button type="submit" name="edit_post" id="block_user" class="post-link__edit">
                <i class="fa fa-edit"></i> Edit 
                </button>

                </form>
                <form action="../php/action.php" method="POST" class="form-inline">
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $all->user_id;?>">
                <button type="submit" name="block_user" id="block_user" class="post-link__edit">
                <i class="fa fa-trash"></i> Delete
                </button>

                </form>  -->
              <a href="edit.php?epid=<?php echo $p->post_id;?>&type=<?php echo $p->post_cat_id;?>" class="post-link__edit">Edit <i class="fa fa-edit"></i></a>
              <a href="../php/action.php?pid=<?php echo $p->post_id;?>&type=del" onclick="return confirm('Are you sure you want to delete this ad');"class="post-link__del">Delete <i class="fa fa-trash"></i></a>
          </div>

          <div class="post-details">
                  <div class="post-details__date-posted">
                      <span><i class=" fa fa-calendar  post-details__date-icon"></i> <?php echo $post->getPostDate($p->created_at);?></span>
                  </div>
                  <div class="post-details__location">
                  <span><i class="fa fa-map  post-details__map-icon"></i><?php echo $p->full_address;?></span>   
                </div>
                <div class="post-details__paid-status">
                  <span><i class="fa fa-dollar  post-details__price-icon"></i><?php echo $p->post_status;?></span>   
                </div>
          </div>
      </div>
  </div><!--end of the ad-->

<?php
  }
}
?>
  
</section><!--section all posts ends-->