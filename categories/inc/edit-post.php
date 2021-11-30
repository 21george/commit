<section class="redapp-image">
        <img src="img/logo-black.jpg" alt="redapp logo" class="redapp-image__logo">

        <?php if($userOwner == true):?>
        <a href="../profile/edit.php?epid=<?php echo $postInfo->post_id;?>&type=<?php echo $postInfo->post_cat_id;?>"><i class= "fa fa-edit redapp-image__edit"></i></a>
<?php else:?>
<a href="#"><i class= "fa fa-edit redapp-image__edit"></i></a>
<?php endif;?>
        <div class="redapp-image__seen">
     <?php 
     if($timePassed<100){
        echo '<i class="fa fa-circle text-success"></i> Online';
     }
     else{

        if($lastSeenSeconds->last_seen == 0){
            echo "<i class='fa fa-eye'></i> No info";
        }
        else{
            echo $post->timeAgo($timeAgo);  
        }
      
           
         
     }
     
     ?>
     </div> 
 
        <div class="redapp-image__views">(<?php echo $totalPageViews[0]->views;?>) views<i class="fa fa-clock-o date"></i><?php echo $post->getPostDate($postInfo->created_at);?></div>
    </section>
     <!--end of post image-->