<?php

require "../config/config.php";
require "../lib/Database.php";
require "../helpers/session_helper.php";

require "../models/Job.php";
if(!empty($_POST["category_id"])){
    $job = new Job;
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);
    $parent_sub_id = $POST['category_id'];
    $query = $job->getAllJobsByCategory($parent_sub_id);
    foreach($query as $q){
        echo '<option value="'.$q->sp_id.'">'.$q->title.'</option>';
    }
   
}
