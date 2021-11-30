
<?php include("../bootstrap.php");?>
<!--HEAD-->
<?php include(ROOT_PATH."categories/inc/head.php");?>

<!--section gallery-->
<?php include(ROOT_PATH."categories/inc/gallery.php");?>

<!--section post author-->
<?php include(ROOT_PATH."categories/inc/postauthor.php");?>

   <!--section edit post-->
<?php include(ROOT_PATH."categories/inc/edit-post.php");?>

   <!--section post content-->
<?php include(ROOT_PATH."categories/inc/post-content.php");?>

<?php if($postInfo->post_cat_id=="1"):?>
     <!--section additional info-->
<?php include(ROOT_PATH."categories/inc/additional-info.php");?>

<?php endif;?>
     <!--section contant agent-->
<?php include(ROOT_PATH."categories/inc/contact-agent.php");?>
    
 <!--section contant agent-->
<?php include(ROOT_PATH."categories/inc/add-comment.php");?>
  <!--section contant agent-->
<?php include(ROOT_PATH."categories/inc/comments.php");?>
 <!--section contant agent-->
 <?php include(ROOT_PATH."categories/inc/footer-scripts.php");?>
 