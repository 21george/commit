<?php
class Ad{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function insertNewAd($posts_id,$data){
        $this->db->query('INSERT INTO ads (posts_id,contact_name,contact_email,contact_number,item_condition,price_or_options) 
        VALUES(:posts_id,:contact_name,:contact_email,:contact_number,:item_condition,:price_or_options)');
        //Bind params
        $this->db->bind(':posts_id',$posts_id);
        $this->db->bind(':contact_name',$data['contact_name']);
        $this->db->bind(':contact_email',$data['email']);
        $this->db->bind(':contact_number',$data['contact_number']);
        $this->db->bind(':item_condition',$data['item_condition']);
        $this->db->bind(':price_or_options',$data['item_price']);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getOtherCatPost($post_id){
        $this->db->query('SELECT * FROM posts as p, ads as a WHERE p.post_id = :post_id AND a.posts_id = :posts_id');
        //Bind values
        $this->db->bind(':post_id',$post_id);
        $this->db->bind(':posts_id',$post_id);
        $row = $this->db->single();
        return $row;
    }
    public function getThisAdByPostId($posts_id){
        $this->db->query('SELECT * FROM ads WHERE posts_id = :posts_id');
        //Bind values
        $this->db->bind(':posts_id',$posts_id);
        $row = $this->db->single();
        return $row;
    }
    public function deleteAd($posts_id){
        $this->db->query('DELETE FROM ads WHERE posts_id = :posts_id');

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