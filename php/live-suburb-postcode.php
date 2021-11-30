<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../models/Search.php";

$searched = new Search();
$search = $_GET['query'];
if($search !=""){

    $search_value = "%$search%";
    //get the value for search in it´s box function
    $fetch_query = $searched->getPlaces($search_value);
    $json = [];

    foreach($fetch_query as $row){
        $suburb = $row->name;
        $postcode = $row->postcode;
        $full = $suburb." ".$postcode;
        $json[] = $full;
    }
    echo json_encode($json);
}

?>