<?php

include (ROOT_PATH."models/User.php");
$user = new User;

if(isset($_SESSION['user_id'])){
    $user_id = filter_var($_SESSION['user_id'],FILTER_SANITIZE_NUMBER_INT);
    $the_user = $user->getUserById($user_id);
    $setLastSeen = $user->updateUserSeen($user_id);
}
?>


<header class="header-profile d-flex justify-content-between align-items-center">

<img src="img/white-logo.png" alt="thereadapp logo" class="profile__logo">
<nav class="nav">
    <div class="nav__box">
        <svg class="nav__box-icon">
            <use xlink:href="img/SVG/symbol-defs.svg#icon-envelope-open-o"></use>
        </svg>
        <span class="nav__box-notif"><input type="text" class="d-none" id="user_id" value="<?php echo $user_id;?>">3</span>
    </div>
    <div class="nav__box">

    <ul class="">
    <li class="dropdown">
    <a href="#" class="unseen" data-toggle="dropdown">
    <svg class="nav__box-icon">
            <use xlink:href="img/SVG/symbol-defs.svg#icon-comments"></use>
        </svg>
    </a>
    <ul class="dropdown-menu drop-men">
    </ul>
    </li>
    </ul>
      
        <span class="nav__box-notif countComments"></span>
    </div>
   
    <div class="nav__box">
    <a href="cart">
    <svg class="nav__box-icon nav__box-icon--shopping_cart">
            <use xlink:href="img/SVG/symbol-defs.svg#icon-shopping-cart"></use>
        </svg>
    </a>
     
        <span class="nav__box-notif">
        <?php if(isset($_SESSION['shopping_cart'])):?>
        <?php echo $count =count($_SESSION['shopping_cart']);?>
            <?php else:?>
            <?php echo "0";?>
        <?php endif;?>
        </span>
    </div>
    <div class="nav__user dropdown">
        <img src="<?php echo BASE_URL?>img/users/<?php if($the_user->user_image!=""){
             echo $the_user->user_image;
        }else{
            echo "OpenClipart-Vectors.png";
        };?>" alt="<?php echo $the_user->user_image;?>" class="nav__user-photo">
        <a href="dropdown-toggle" data-toggle="dropdown" class="user-name">
            <span class="nav__user-name carrot"><?php echo $the_user->user_name;?> &#9660;</span>
            <ul class="nav__user-dropdown dropdown-menu">
                <li class="nav__user-item">
                    <a href="<?php echo BASE_URL?>php/logout" class="nav__user-link">
                        <svg>
                            <use xlink:href="img/SVG/symbol-defs.svg#icon-sign-out">   
                            </use>
                        </svg>
                        <span>Sign out</span>
                    </a>
                </li>
            </ul>
        </a>

    </div>
    <div class="nav__online">
        <span class="nav__notif u-online"></span>
    </div>
</nav>

</header> 