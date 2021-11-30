<?php

 $user_ip = $_SERVER['REMOTE_ADDR'];
 $page = $post_id;
 $data = array(

    'user_ip' => $user_ip,
    'page' => $page,
    'total_views' =>'1'
 );
 $pageView = new Visitor();
 $check_ip = $pageView->selectUserIp($data);
 if($check_ip){
     $totalViews = $check_ip->total_views;
     if($totalViews == 0){
         $totalViews = 1;
     }
     $totalViews++;
     $data = array(

        'user_ip' => $user_ip,
        'page' => $page,
        'total_views' =>$totalViews
     );

     $updateViews = $pageView->updatePageView($data);
 }
 else{
     $insertView = $pageView->insertPageView($data);
 }
?>