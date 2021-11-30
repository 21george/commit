<?php
class Realestate{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function insertRealestateAd($data){
        $this->db->query('INSERT INTO posts (post_cat_id,post_title,post_content,post_featured_img,user_id,post_status,post_type,full_address,suburb,postcode,post_start_date,post_end_date,advertised_price) 
        VALUES(:post_cat_id,:post_title,:post_content,:post_featured_img,:user_id,:post_status,:post_type,:full_address,:suburb,:postcode,:post_start_date,:post_end_date,:advertised_price)');
        //Bind params
        $this->db->bind(':post_cat_id',$data['post_cat_id']);
        $this->db->bind(':post_title',$data['post_title']);
        $this->db->bind(':post_content',$data['post_content']);
        $this->db->bind(':post_featured_img',$data['post_featured_img']);
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':post_status',$data['post_status']);
        $this->db->bind(':post_type',$data['post_type']);
        $this->db->bind(':full_address',$data['full_address']);
        $this->db->bind(':suburb',$data['suburb']);
        $this->db->bind(':postcode',$data['postcode']);
        $this->db->bind(':post_start_date',$data['post_start_date']);
        $this->db->bind(':post_end_date',$data['post_end_date']);
        $this->db->bind(':advertised_price',$data['advertised_price']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    //getRealestate post for front index page
    public function getRealEstatePost($post_id){
        $this->db->query('SELECT * FROM posts as p, estate as r WHERE p.post_id = :post_id AND r.posts_id =:post_id ');
        $this->db->bind(':post_id', $post_id);
        $this->db->bind(':posts_id', $post_id);
        $result = $this->db->single();
        return $result;
    }

   public function insertIntoRealestate($posts_id,$data){
    $this->db->query('INSERT INTO estate (posts_id,post_property_type,num_beds,num_parking,num_showers,num_toilets,sale_type) 
    VALUES(:posts_id,:post_property_type,:num_beds,:num_parking,:num_showers,:num_toilets,:sale_type)');
    //Bind params
    $this->db->bind(':posts_id',$posts_id);
    $this->db->bind(':post_property_type',$data['post_property_type']);
    $this->db->bind(':num_beds',$data['num_beds']);
    $this->db->bind(':num_parking',$data['num_parking']);
    $this->db->bind(':num_showers',$data['num_showers']);
    $this->db->bind(':num_toilets',$data['num_toilets']);
    $this->db->bind(':sale_type',$data['sale_type']);

    if($this->db->execute()){
        return true;
    }
    else{
        return false;
    }
   }

   public function editRealestate($data){
    $this->db->query('UPDATE estate SET post_property_type = :post_property_type, 
    num_beds = :num_beds,
    num_parking = :num_parking,
    num_showers = :num_showers,
    num_toilets = :num_toilets,
    sale_type = :sale_type
    WHERE posts_id = :posts_id');

$this->db->bind(':posts_id',$data['post_id']);
$this->db->bind(':post_property_type',$data['post_property_type']);
$this->db->bind(':num_beds',$data['num_beds']);
$this->db->bind(':num_parking',$data['num_parking']);
$this->db->bind(':num_showers',$data['num_showers']);
$this->db->bind(':num_toilets',$data['num_toilets']);
$this->db->bind(':sale_type',$data['sale_type']);

if($this->db->execute()){
    return true;
}
else{
    return false;
}
   }


   public function  deleteEstate($posts_id){
    $this->db->query('DELETE FROM estate WHERE posts_id = :posts_id');

    $this->db->bind(':posts_id',$posts_id);
    if($this->db->execute()){
        return true;
    }
    else{
        return false;
    }
}
}

?>