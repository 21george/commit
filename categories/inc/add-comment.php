<section class="post-comment">
    <h1 class="beautiful-heading text-center ">Add your comment</h1>
    <div class="container">
        <form action="" method="POST" id="post_comment">
                <div class="form-group">
                        <label for="comment_name" class="form-group " for="comment_name">Enter Your Name:</label>
                        <input type="text" name="comment_name" id="comment_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                            <label for="comment_email" class="form-group " for="comment_email">Enter Your Email:</label>
                            <input type="email" name="comment_email" id="comment_email" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                            <label for="comment_body" class="form-group " for="comment_body">Message:</label>
                            <textarea type="text" name="comment_body" id="comment_body" class="form-control" rows="10" required></textarea>
                    </div>
            
                    <div class="form-group">
                        
                        <input type="hidden" name="comment_id" id="comment_id" value="0" readonly>
                        <input type="text" class="d-none" name="post_id" id="post_id" value="<?php echo trim($postInfo->post_id);?>" readonly>
                        <input type="email" class="d-none" name="owner_email" id="owner_email" value="<?php echo trim($postInfo->user_email);?>" readonly>
                        <input type="email" class="d-none" name="post_owner_id" id="post_owner_id" value="<?php echo trim($postInfo->user_id);?>" readonly>
                        <input type="submit" name="submit" id="submit" class="btn btn-success contact-agent-form-btn comment-btn" value="Send Message">
                    </div>
        </form>
        


    </div><!--end of the container-->
    </section>
     <!--end of post comment end-->