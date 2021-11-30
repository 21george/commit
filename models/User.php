<?php
class User{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }


    //Register User

    public function register($data){
        $this->db->query('INSERT INTO users (user_name,user_email,user_password,user_role) 
        VALUES(:user_name,:user_email,:user_password,:user_role)');
        //Bind params
        $this->db->bind(':user_name',$data['user_name']);
        $this->db->bind(':user_email',$data['user_email']);
        $this->db->bind(':user_password',$data['user_password']);
        $this->db->bind(':user_role',$data['user_role']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
        
    }

    //Check if email exists in db
    public function check_email($user_email){
        $this->db->query('SELECT user_email FROM users WHERE user_email = :user_email');
        //Bind params

        $this->db->bind(':user_email',$user_email);
        $row = $this->db->single();
        return $row;

    }

    //find user by email used in login-form
    public function findUserByEmail($user_email){

        $this->db->query('SELECT * FROM users WHERE user_email = :user_email');
        //Bind params

        $this->db->bind(':user_email',$user_email);
        $row = $this->db->single();

        if($this->db->rowCount()>0){
            return $row;
        }
        else{
            return false;
        }
       
    }
    //User Login

    public function userLogin($user_email,$user_password){
        $this->db->query('SELECT * FROM users WHERE user_email = :user_email AND user_password = :user_password AND blocked = :blocked');
        $this->db->bind(':user_email',$user_email);
        $this->db->bind(':user_password',$user_password);
        $this->db->bind(':blocked',false);
        $row = $this->db->single();

        if($this->db->rowCount()>0){
            return $row;
        }
        else{
            return false;
        }
    }

    //get User details for profile page

  public function getUserById($user_id){
    $this->db->query('SELECT user_id,user_name,user_firstname,user_lastname,user_bio,user_email,user_phone,user_occupation,user_image,user_linkedin,user_gplus
     FROM users WHERE user_id = :user_id');
    $this->db->bind(':user_id',$user_id);
    $row = $this->db->single();
    return $row;
  }

      //get User details for profile page

      public function getUserByUserId($user_id){
        $this->db->query('SELECT * FROM users WHERE user_id = :user_id');
        $this->db->bind(':user_id',$user_id);
        $row = $this->db->single();
        return $row;
      }

      //Update user password
     public function updateUserPassword($user_id,$user_password){
        $this->db->query('UPDATE users SET user_password = :user_password WHERE user_id = :user_id');
        $this->db->bind(':user_id',$user_id);
        $this->db->bind(':user_password',$user_password);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
      }
      //Update User Image From Profile

      public function updateImage($data){
        $this->db->query('UPDATE users SET user_image = :user_image WHERE user_id = :user_id');
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':user_image',$data['user_image']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
      }

      //create Update User details from profile user page

    public function  updateUserDetails($query,$data){

        $this->db->query($query);

        if(isset($data['user_id'])){
            $this->db->bind(':user_id',$data['user_id']);
        }
        if(isset($data['user_firstname'])){
            $this->db->bind(':user_firstname',$data['user_firstname']);
        }
        if(isset($data['user_lastname'])){
            $this->db->bind(':user_lastname',$data['user_lastname']);
        }
        if(isset($data['user_occupation'])){
            $this->db->bind(':user_occupation',$data['user_occupation']);
        }
        if(isset($data['user_gender'])){
            $this->db->bind(':user_gender',$data['user_gender']);
        }
        if(isset($data['user_bio'])){
            $this->db->bind(':user_bio',$data['user_bio']);
        }
        if(isset($data['user_exp'])){
            $this->db->bind(':user_exp',$data['user_exp']);
        }
        if(isset($data['user_phone'])){
            $this->db->bind(':user_phone',$data['user_phone']);
        }

        if(isset($data['user_linkedin'])){
            $this->db->bind(':user_linkedin',$data['user_linkedin']);
        }
        if(isset($data['user_gplus'])){
            $this->db->bind(':user_gplus',$data['user_gplus']);
        }

        if(isset($data['user_suburb'])){
            $this->db->bind(':user_suburb',$data['user_suburb']);
        }
        if(isset($data['user_postcode'])){
            $this->db->bind(':user_postcode',$data['user_postcode']);
        }

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
        
      }

      public function updateUserSeen($user_id){
        $this->db->query('UPDATE users SET last_seen = :last_seen WHERE user_id = :user_id');
        $time = date('Y-m-d H:i:s');
        $this->db->bind(':last_seen',$time);
        $this->db->bind(':user_id',$user_id);
       $this->db->execute();
      }

      public function  getUserSeen($user_id){
        $this->db->query('SELECT last_seen FROM users WHERE user_id = :user_id');
    
        $this->db->bind(':user_id',$user_id);
       $row = $this->db->single();
       return $row;
      }

      public function  getUsersCount(){
        $this->db->query('SELECT * FROM users');

        $results = $this->db->resultSet();
        return $this->db->rowCount();
        }

        public function getUsers(){
            $this->db->query('SELECT * FROM users');

        $results = $this->db->resultSet();
        return $results;
        }
        public function blockUser($user_id){
            $this->db->query('UPDATE users SET blocked = :blocked WHERE user_id = :user_id');
            $this->db->bind(':user_id',$user_id);
            $this->db->bind(':blocked',true);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        public function unblockUser($user_id){
            $this->db->query('UPDATE users SET blocked = :blocked WHERE user_id = :user_id');
            $this->db->bind(':user_id',$user_id);
            $this->db->bind(':blocked',false);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function deleteUser($user_id){
            $this->db->query('DELETE FROM users WHERE user_id = :user_id');
            $this->db->bind(':user_id',$user_id);
         
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
}

?>