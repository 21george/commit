
<?php if(isset($_SESSION['success'])):?>
<div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success <i class="fa fa-check-circle-o"></i></span> <?php echo $_SESSION['success'];?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif; unset($_SESSION['success']);?>



<?php if(isset($_SESSION['fail'])):?>

<div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Fail <i class="fa fa-check-circle-o"></i></span> <?php echo $_SESSION['fail'];?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <?php endif; unset($_SESSION['fail']);?>