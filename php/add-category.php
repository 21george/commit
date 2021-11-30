<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/url_redirect.php";
require "../helpers/session_helper.php";
require "../models/Category.php";


if(isset($_POST['add_category'])){
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$cat_title = $POST['cat_title'];
$cat = new Category;
$addCat = $cat->addCategory($cat_title);

if($addCat){
    $_SESSION['success']="You have added a new category";
    redirect("admin/categories.php");
}
else{
   $_SESSION['fail']="You not added a category";
    redirect("admin/categories.php");
}
}
else{
    redirect("admin/categories.php");
}

?>