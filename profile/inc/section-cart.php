<section class="cart-section">
        <div class="col-md-12">
            <div class="heading-tertiary">Your Unpaid Posts</div>
        </div>
        <p class="text-left shopping_bag_heading">Items in Your Cart</p>
        <div class="cart-wrapper ">
            <div class="shopping_cart d-flex">
            <?php 
            include (ROOT_PATH."models/Post.php");
            include (ROOT_PATH."models/Img.php");
            include (ROOT_PATH."models/Category.php");
            $post = new Post();
            $img = new Img();
            $category = new Category();
            $total=0;
            if(empty($_SESSION['shopping_cart'])){
                $count = 0;
                echo "<h3>There are no items in the shopping cart. You can add <a href='payment'>Add Items</a></h3>";
            }

            if(isset($_SESSION['user_id']) && isset($_SESSION['shopping_cart'])){
                $SESSION=filter_var_array($_SESSION,FILTER_SANITIZE_STRING);
                 $user_id = $SESSION['user_id'];
                $posts_ids = array_column($_SESSION['shopping_cart'],'id');
                foreach($_SESSION['shopping_cart'] as $key => $post_product){
                     $post_id = $post_product['id'];
                    $row = $post->getPostByUserIdPayment($post_id);
                    $calculated_price =$row->post_calculated_price;
                     $category_id = $row->post_cat_id;
                     $categoryArray = $category->getCategoryNameRow($category_id);
                     $category_name = $categoryArray->cat_title;
                    $title = $row->post_title;
                    $post_featured_image = $row->post_featured_img;
                    $post_image = $img->getAllImages($post_featured_image);
                    $path = BASE_URL."img/";
                    if(!empty($calculated_price)){
                        $price = $calculated_price;
                    }
                    else{
                        $price = 0;
                    }
                    if(!empty($post_image[0])){
                        $post_img = $path.$post_image[0];
                    }
                    else{
                        $post_img = $path."logo.png";
                    }
                    $total = $total +(1*$price);
          
            ?>
                <div class="shopping_bag d-flex">
                        <img src="<?php echo $post_img;?>" class="shopping_bag-img" alt="stephan-bechert">
                        <div class="shopping_bag-description d-flex flex-column">
                            <p class="title"><?php if(isset($title)){echo $title;}?>
                            </p>
                            <p class="red"><?php if(isset($category_name)){echo $category_name;}?></p>
                            <p class="price">$<?php if(isset($price)){ echo $price;}?></p>
                        </div>
                        <div class="shopping_bag-remove d-flex flex-column">
                            <p class="quantity"><span class="quantity-col">1 Item</span></p>
                            <a href="cart.php?action=delete&id=<?php echo $post_product['id'];?>" class="remove">Remove</a>
                        </div>
        
                        <div class="shopping_bag-outside">
                            <p class="price-outside"><sup>$</sup><?php if(isset($price)){ echo $price;}?></p>
                        </div>
                </div><!--shopping bag ends-->
                
                <?php  }} ?>
            </div><!--shopping cart ends-->

            <div class="checkout_box">
                <div class="checkout_box__order-summary text-center">
                    <p class="order">Order Summary</p>
                </div>

                <div class="checkout_box__total-price text-center">
                        <p class="subtotal">Subtotal:</p>
                        <p class="subtotal_price"><sup>$</sup><?php if(isset($total)){echo number_format($total,2);}else{echo "0.00";}?></p>
                </div>

                <div class="checkout_box__checkout">
                        <a href="#payment" class="btn checkout_box__button text-center"><i class="fa fa-lock"></i>Checkout</a>
                </div>

                <div class="checkout_box-payment-icons d-flex ">
                        <svg class="checkout__icon">
                                <use xlink:href="img/SVG/symbol-defs.svg#icon-visa"></use>
                        </svg>
                        <svg class="checkout__icon">
                            <use xlink:href="img/SVG/symbol-defs.svg#icon-cc-paypal"></use>
                        </svg>
                    
                        <svg class="checkout__icon">
                                <use xlink:href="img/SVG/symbol-defs.svg#icon-americanexpress"></use>
                            </svg>
                            
                            <svg class="checkout__icon">
                                    <use xlink:href="img/SVG/symbol-defs.svg#icon-cc-stripe"></use>
                            </svg>
                            <svg class="checkout__icon">
                                    <use xlink:href="img/SVG/symbol-defs.svg#icon-mastercard"></use>
                            </svg>
                </div><!--end of payment icons-->

            </div><!--checkout box ends-->


   
        </div><!--shopping cart wrapper-->

        <div class="col-md-12" id="payment">

                <h1 class="heading-tertiary">Payment Section</h1>
            </div>

            <article class="card col-md-12 ">

                <div class="card-body p-5">
                    <ul class="nav bg-light nav-pills rounded nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                <i class="fa fa-credit-card"></i> Credit Card
                            </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                                    <i class="fa fa-paypal"></i> Paypal
                                </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                                    <i class="fa fa-university"></i> Bank Transfer
                                </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-tab-card">
<!--stripe form start-->
                    <form action="./charge/charge.php" method="post" id="payment-form">
                    <div class="form-group mt-3">

                    <?php if(!empty($_SESSION['shopping_cart'])):
                    $total=0;
                    foreach($_SESSION['shopping_cart'] as $key =>$post_product):
                        $total = $total + ($post_product['quantity']*$post_product['price']);
                    ?>
                    <?php endforeach;?>
                    <?php endif;?>
                    <input type="text" id="customer_id" class="d-none" name="customer_id" value="<?php echo trim($_SESSION['user_id']);?>">
                    <label for="first_name">
                    First Name
                    </label>
                   <input type="text" class="form-control StripeElement StripeElement--empty mb-2" id="first_name" name="first_name" autocomplete="off">
                    
                   <label for="last_name">
                    Last Name
                    </label>
                   <input type="text" class="form-control StripeElement StripeElement--empty mb-2" id="last_name" name="last_name" autocomplete="off">
                   <label for="email">
                    Email
                    </label>
                   <input type="email" class="form-control StripeElement StripeElement--empty mb-2" id="email" name="email" autocomplete="off">
                    <label for="card-element">
                    Credit or debit card
                    </label>
                    <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                    </div>
                    <label for="total_amount">
                    Total Amount
                    </label>
                   <input type="text" class="form-control StripeElement StripeElement--empty mb-2" id="total_amount" name="total_amount" value="<?php echo $total ;?>" readonly>
                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                    </div>

                    <button class="btn btn-primary btn-block mt-4 p-4 " style="font-size:1.7rem;">Submit Payment</button>
                    </form>
                           
               
                                        
<!--fomr stripe done-->
                        </div><!--tab pane done-->
                        <div class="tab-pane fade " id="nav-tab-paypal">
                            <form class="paypal" action="./charge/request.php" method="POST" id="paypal_form">
                                <button class="btn btn-primary " type="submit"><i class="fa fa-paypal"></i>Paypal</button>
                            </form>
                            <p><strong>Paypal Payment here styled</strong> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, quasi ad libero laudantium quibusdam recusandae, asperiores eligendi numquam adipisci dolores, illo deserunt maiores? Vero dolores sed fugiat, dignissimos quae nulla!</p>
<!--paypal form done-->
                        </div>
                        <!--paypal tab done-->

                        <div class="tab-pane fade" id="nav-tab-bank">
                            <p>Bank Account Details</p>
                            <p>Name Of Bank: ANZ</p>
                            <p>Account Number :145232655</p>
                            <p>BSB Number :163465</p>
                            <p>IBAN Number :1268465225855</p>
                            <p><strong>Bank Payment details here</strong> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, quasi ad libero laudantium quibusdam recusandae, asperiores eligendi numquam adipisci dolores, illo deserunt maiores? Vero dolores sed fugiat, dignissimos quae nulla!</p>
                    </div>
                </div>
            </article>
    </section>

          