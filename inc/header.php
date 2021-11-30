    <!-- BEM Notation-->
    <header class="header">
        <div class="header__title-box">
            <h1 class="primary-heading">
                <span class="primary-heading--front">
                    <p class="primary-heading--sup">the</p>
                    RedApp
                </span>
                <span class="primary-heading--small">Is all you need!</span>
            </h1>
        </div>

        <div class="main-menu">
            <div class="main-menu__logo-container">
                <img src="img/logo.png" class="main-menu__menu-logo">
            </div>
            
            <img src="img/logo.png" class="main-menu__logo--hidden">

            <input type="checkbox" name="" id="btn-menu" class="hidden">
            <label for="btn-menu" class="icon-menu">
                    <i class="fa fa-bars bars hidden"></i>
                    <i class="fa fa-times times hidden"></i>
            </label>
            
            <nav class="menu">
                <ul>
                    <li>
                        <a href="index" class="active-menu">Home</a>
                    </li>
            
                    <li class="submenu">
                            <a href="#" >What We Offer</a>
                            <ul>
                                <li> <a href="offer.html">Our Offer</a></li>
                                <li><a href="packages.html">Our Packages</a></li>
                                <li><a href="#">History</a></li>
                                <li><a href="#"> Contact</a></li>
                            </ul>
                    </li>

                    <li class="submenu">
                            <a href="#" >About</a>
                            <ul>
                                <li> <a href="about.html">About</a></li>
                                <li><a href="">Our History</a></li>
                            </ul>
                    </li>
                    <li>
                        <a href="profile/index" >Post Free</a>
                    </li>
                    <li>
                    <?php  if(isset($_SESSION['user_id'])):?>
                    <a href="<?php echo BASE_URL;?>php/logout"> Logout</a>
                    <?php else :?>
                       <a href="<?php echo BASE_URL;?>login" >Login</a>
                   <?php endif;?>
                    </li>
                </ul>
            </nav>
        </div>

<section class="search-box">
    
    <div class="search-box__container">
        <input type="text" id="searched_place" class="search-box__input" placeholder="Type Location....">
        <input type="text" id="searched_keyword" class="search-box__input search-box__input--right" placeholder="Keyword....">
        <input type="text" id="searched_keyword_category" style="display: none;">
        <button type="button" class="search-box__btn"><i class="fa fa-search search-box__btn--icon"></i></button>
    </div>
</section>
    </header>