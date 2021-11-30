

<?php include("../bootstrap.php");?>

    <!-- Head -->

<?php include (ROOT_PATH."admin/inc/head.php");?>
    <!-- Left Panel -->

    <?php include (ROOT_PATH."admin/inc/left-panel.php");?>

    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

    <?php include (ROOT_PATH."admin/inc/header.php");?>
   
    <?php include (ROOT_PATH."admin/inc/breadcrumbs.php");?>
    <?php include (ROOT_PATH."admin/inc/display-msg.php");?>

<div class="content mt-3">

<?php 
require "../models/Category.php";
$cat = new Category;
$allCategories = $cat->getCategory();
?>

<div class="card">
    <div class="card-header">
        <strong>Ad New Category</strong> 
    </div>
    <div class="card-body card-block">
        <form action="<?php echo BASE_URL?>php/add-category.php" method="post" class="form-inline">
            <div class="form-group"><label for="cat_title" class="pr-1  form-control-label">Add Category </label>
            <input type="text" id="cat_title" name="cat_title" placeholder="Ex: Clothing & Jewellery" required=""
             class="form-control" autocomplete="off"></div>
           
    </div>
    <div class="card-footer">
        <button type="submit" name="add_category" id="add_category" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
</form>
    </div>
</div>

<div class="animated fadeIn">
                <div class="row">
            
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Ads Table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Category Id</th>
                                            <th scope="col">Category Title</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($allCategories as $all):?>
                                        <tr>
                                            <td ><?php echo $all->cat_id;?></td>
                                            <td ><?php echo $all->cat_title;?></td>
                                           
                                           
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- .animated -->
    </div>
</div>
  
    <!-- Right Panel -->
    <?php include (ROOT_PATH."admin/inc/footer-scripts.php");?>