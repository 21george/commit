
    <section class="post-author">
        <div class="post-author__details">
                <div class="post-author__ring">
                    <img src="<?php echo BASE_URL."/img/users/$postInfo->user_image";?>" alt="stephan-bechert" 
                    class="post-author__ring-img">
                </div>
                <div class="post-author__box">
                    <a href=""><h4 class="heading-4 author__name"><?php if(isset($postInfo->user_firstname)){
                        echo $postInfo->user_firstname;
                    }else{
                        echo $postInfo->user_name;
                    };?></h4></a>
                    <p class="author__sold">15 Houses</p>
                    <p class="author_works">Harcourts</p>
                </div>
        </div>
    </section>
    <!--end of post author-->