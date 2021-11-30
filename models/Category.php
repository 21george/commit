<?php
class Category{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }

 
    public function getCategory(){
        $this->db->query('SELECT * FROM categories');
        //Bind values
        $row = $this->db->resultSet();
        return $row;
    }
    public function getCategoryNameRow($cat_id){
        $this->db->query('SELECT * FROM categories WHERE cat_id = :cat_id');
        //Bind values
        $this->db->bind(':cat_id',$cat_id);
        $row = $this->db->single();
        return $row;
    }

    public function getCatId($cat_title){
        $this->db->query('SELECT * FROM categories WHERE cat_title = :cat_title');
        //Bind values
        $this->db->bind(':cat_title',$cat_title);
        $row = $this->db->single();
        return $row;
    }

    public function addCategory($cat_title){

        $this->db->query('INSERT INTO categories(cat_title) VALUES (:cat_title)');
        //Bind values
        $this->db->bind(':cat_title',$cat_title);
       
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}

?>