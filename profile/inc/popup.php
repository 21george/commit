
        <!-- <div class="heading-tertiary">Our custom made modal</div> -->
        <section class="popup-section start " id="modal_popup">
    <div class="popup">
        <div class="popup-content">
            <div class="popup-header">
                <h3 class="popup-header__title heading-modal ">Add Photo</h3>
                <a class="close popup-header__close" href="">&times;</a>
            </div>
            <div class="popup-body">
                <form action="<?php echo BASE_URL?>php/add-photo.php" method="POST" enctype="multipart/form-data">

                    <div class="from-group">
                        <input type="file" name="file" id="file" class="form-control input-style" required>
                    </div>
                        <div class="popup-submit">
                            <input type="submit" name="img_submit" class="btn btn-success popup-submit__btn-modal" value="Submit">
                        </div>
                </form>
                
            </div>
        </div>
    </div>
    </section> 
