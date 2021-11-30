<section class="content-form d-flex justify-content-center align-items-center flex-wrap">
        <div class="heading-tertiary">Add Post</div>
        <form method="POST" id="multiplesub" name="multiplesub" class="profile-form" action="" 
        enctype="multipart/form-data">

        <div>
            <label class="subtitle-style ">Every freer post/ad can be maximum posted for 30 days</label>
        </div>

        <div class="profile-form__styling">
            <label for="post_title" class="label-style">Ad Title</label>
            <input type="text" name="post_title" class="input-style" placeholder="Enter your title" autocomplete="off" required>
        </div>
 
        <div class="profile-form__styling">
                <label for="post_price_type" class="label-style">Select Price</label>
                <select  id="post_price_type" name="post_price_type" class="form-control select-style" >
                    <option value="free" selected>Free</option>
                    <option value="standard" >Standard</option>
                    <option value="premium" >Premium</option>
                </select>
        </div>

      

        <div class="profile-form__styling">
                <label for="startDate" class="label-style">Start Date</label>
                <input type="date" max="3000-12-30" name="post_title" autocomplete="off" 
                class="input-style" required>
        </div>


        <div class="d-flex justify-content-around flex-wrap">
            <div class="profile-form__left-select">
                    <label for="ad_category" class="label-style">Select Category</label>
                    <select  id="ad_category" name="ad_category" class="form-control select-style" required>
                        <option value="1" selected>Realestate</option>
                        <option value="2" >Jobs</option>
                        <option value="3" >Antiques</option>
                    </select>
            </div>

            <div class="profile-form__right-select">
                    <label for="ad_subcategory" class="label-style">Select Subcategory</label>
                    <select  id="ad_subcategory" name="ad_subcategory" class="form-control select-style" required>
                        <option value="1" selected>House</option>
                        <option value="2" >Vila</option>
                        <option value="3" >Unit</option>
                        <option value="4" >Townhouse</option>
                        <option value="5" >Appartment</option>
                    </select>
            </div>

        </div>


        <div class="profile-form__styling">
                <label for="specific_item" class="label-style">Ad Your Images</label>
                <input type="file" name="file[]" class="form-control input-style"
                  multiple>
        </div>

    
        <div class="d-flex justify-content-around align-items-end profile-form__item-price ">

            <div class="">
                    <label for="post_price" class="label-style">Price</label>
                    <input type="text" id="post_price" name="post_price" class="input-style" placeholder="ex. $100" autocomplete="off" readonly>
            </div>

            <div class="profile-form__item-price-radio">
                <div class="profile-form__radio-group">
                    <input type="radio"  class="profile-form__radio-input" id="amount" value="amount" name="radio_price">
                        <label for="amount" class="profile-form__radio-label">
                            <span class="profile-form__radio-button"></span>Amount
                        </label>
                </div>
                <div class="profile-form__radio-group">
                        <input type="radio"  class="profile-form__radio-input" id="negotiable" value="negotiable" name="radio_price">
                            <label for="negotiable" class="profile-form__radio-label">
                                <span class="profile-form__radio-button"></span>Negotiable
                            </label>
                </div>
                <div class="profile-form__radio-group">
                        <input type="radio"  class="profile-form__radio-input" id="swap_trade" value="swap_trade" name="radio_price">
                            <label for="swap_trade" class="profile-form__radio-label">
                                <span class="profile-form__radio-button"></span>Swap/Trade
                            </label>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between flex-wrap">

            <div class="">
                <label for="company_email" class="label-style">Your Email</label>
                <input type="email" name="company_email" id="company_email" class="input-style" placeholder="Enter your email" autocomplete="off" required>
            </div>
            <div class="">
                <label for="name" class="label-style">Your Company/Name</label>
                <input type="text" name="name" id="name" class="input-style" placeholder="Enter your Name" autocomplete="off" required>
            </div>
            <div class="">
                <label for="number" class="label-style">Your Number</label>
                <input type="text" name="number" id="number" class="input-style" placeholder="Enter your Number/mobile" autocomplete="off" required>
            </div>
        </div>

        <div class="">
                <label for="summernote" class="label-style">Your content</label>
                <div id="summernote"></div>
        </div>

        <div class="">
                <div class="">
                        <label for="condition" class="label-style">Condtion</label>
                </div>
                <div class="profile-form__radio-group">
                        <input type="radio"  class="profile-form__radio-input" id="new" value="new" name="condition">
                            <label for="new" class="profile-form__radio-label">
                                <span class="profile-form__radio-button"></span>New
                            </label>
                </div>
                <div class="profile-form__radio-group">
                        <input type="radio"  class="profile-form__radio-input" id="used" value="used" name="condition">
                            <label for="used" class="profile-form__radio-label">
                                <span class="profile-form__radio-button"></span>Used
                            </label>
                </div>
        </div>
        
        <div class="text-center">
            <button type="submit" id="submit_post" class="btn btn-success form-btn">Publish</button>
        </div>
        </form>
    </section> 