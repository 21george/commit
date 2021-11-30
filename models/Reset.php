<?php
class Reset{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function deleteEmailIfExists($reset_email){
        $this->db->query("DELETE FROM password_reset where reset_email = :reset_email");
        $this->db->bind(':reset_email', $reset_email);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function addReset($reset_email,$selector_token,$user_token,$expiration){
        $this->db->query('INSERT INTO password_reset (reset_email,selector_token,user_token,expiration) 
        VALUES(:reset_email,:selector_token,:user_token,:expiration)');
        //Bind params
        $this->db->bind(':reset_email',$reset_email);
        $this->db->bind(':selector_token',$selector_token);
        $this->db->bind(':user_token',$user_token);
        $this->db->bind(':expiration',$expiration);
   
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getValidation($selector_token,$expiration){
        $this->db->query('SELECT * FROM password_reset WHERE  selector_token = :selector_token AND expiration >= :expiration');
        $this->db->bind(':selector_token', $selector_token);
        $this->db->bind(':expiration', $expiration);
        $row = $this->db->single();
       
            return $row;
    }

}//end of class reset

?>