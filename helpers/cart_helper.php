<?php
$posts_ids = array();
//unset($_SESSION['shopping_cart']);
if(filter_input(INPUT_POST,'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){
        $count = count($_SESSION['shopping_cart']);
        $posts_ids = array_column($_SESSION['shopping_cart'],'id');
        if(!in_array(filter_input(INPUT_GET,'id'),$posts_ids)){
            $_SESSION['shopping_cart'][$count]=array(
                'id'=>filter_input(INPUT_GET,'id'),
                'user_id'=>filter_input(INPUT_POST,'user_id'),
                'title'=>filter_input(INPUT_POST,'title'),
                'price'=>filter_input(INPUT_POST,'price'),
                'quantity'=>filter_input(INPUT_POST,'quantity')
            );
            redirect("profile/payment");
        }
        else{
            for($i=0;$i<count($posts_ids);$i++){
                if($posts_ids[$i]==filter_input(INPUT_GET,'id')){
                    $_SESSION['shopping_cart'][$i]['quantity']=filter_input(INPUT_POST,'quantity');
                    redirect("profile/payment");
                }
            }
        }
    }
    else{
        $_SESSION['shopping_cart'][0]=array(
            'id'=>filter_input(INPUT_GET,'id'),
            'user_id'=>filter_input(INPUT_POST,'user_id'),
            'title'=>filter_input(INPUT_POST,'title'),
            'price'=>filter_input(INPUT_POST,'price'),
            'quantity'=>filter_input(INPUT_POST,'quantity')
        );
        redirect("profile/payment");
    }

}
if(filter_input(INPUT_GET,'action')=='delete'){
    
    foreach($_SESSION['shopping_cart'] as $key =>$post_product){
        if($post_product['id'] == filter_input(INPUT_GET,'id')){
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
    redirect("profile/cart");
}

// pre_r($_SESSION);

// function pre_r($array){
//     echo '<pre>';
//     print_r($array);
//     echo'</pre>';
// }
?>