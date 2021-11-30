<?php
class Customer{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function addStripeCustomer($data){
        $this->db->query('INSERT INTO stripe_customers (id,first_name,last_name,email,user_id) VALUES (:id,:first_name,:last_name,:email,:user_id)');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_id', $data['user_id']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }



}

?>