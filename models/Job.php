<?php
class Job{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function getAllJobs($parent_id){
        $this->db->query('SELECT * FROM subcategories WHERE parent_id = :parent_id');
        //Bind values
        $this->db->bind(':parent_id',$parent_id);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getAllJobsByCategory($parent_sub_id){
        $this->db->query('SELECT * FROM specificsubcategory WHERE parent_sub_id = :parent_sub_id');
        //Bind values
        $this->db->bind(':parent_sub_id',$parent_sub_id);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getJobName($sp_id){
        $this->db->query('SELECT title FROM specificsubcategory WHERE sp_id = :sp_id');
        //Bind values
        $this->db->bind(':sp_id',$sp_id);
        $row = $this->db->single();
        return $row;
    }

    public function getOccupationName($sub_id){
        $this->db->query('SELECT title FROM subcategories WHERE sub_id = :sub_id');
        //Bind values
        $this->db->bind(':sub_id',$sub_id);
        $row = $this->db->single();
        return $row;
    }

    public function insertIntoJobs($posts_id,$data){
        $this->db->query('INSERT INTO jobs (posts_id,job_occupation,job_name,job_type,salary,hourly_rate_from,hourly_rate_to,company_email,application_link,sub_title) 
        VALUES(:posts_id,:job_occupation,:job_name,:job_type,:salary,:hourly_rate_from,:hourly_rate_to,:company_email,:application_link,:sub_title)');
        //Bind params
        $this->db->bind(':posts_id',$posts_id);
        $this->db->bind(':job_occupation',$data['job_occupation']);
        $this->db->bind(':job_name',$data['job_name']);
        $this->db->bind(':job_type',$data['job_type']);
        $this->db->bind(':salary',$data['salary']);
        $this->db->bind(':hourly_rate_from',$data['hourly_rate_from']);
        $this->db->bind(':hourly_rate_to',$data['hourly_rate_to']);
        $this->db->bind(':company_email',$data['company_email']);
        $this->db->bind(':application_link',$data['application_link']);
        $this->db->bind(':sub_title',$data['sub_title']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function getJobPost($post_id){
        $this->db->query('SELECT * FROM posts as p, jobs as j WHERE p.post_id = :post_id AND j.posts_id = :posts_id');
        //Bind values
        $this->db->bind(':post_id',$post_id);
        $this->db->bind(':posts_id',$post_id);
        $row = $this->db->single();
        return $row;
    }
    
    public function getJobByPostId($post_id){
        $this->db->query('SELECT * FROM jobs WHERE posts_id = :posts_id');
        //Bind values
      
        $this->db->bind(':posts_id',$post_id);
        $row = $this->db->single();
        return $row;
    }


    public function deleteJob($posts_id){
        $this->db->query('DELETE FROM job WHERE posts_id = :posts_id');

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