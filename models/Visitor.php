<?php
class Visitor{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }

  public function selectUserIp($data){
    $this->db->query('SELECT * FROM page_views WHERE page = :page AND user_ip = :user_ip');
    $this->db->bind(':page',$data['page']);
    $this->db->bind(':user_ip',$data['user_ip']);
 
    $row = $this->db->single();

    if($this->db->rowCount()>0){
        return $row;
    }
    else{
        return false;
    }
  }


  public function insertPageView($data){
    $this->db->query('INSERT INTO page_views (page, user_ip, total_views)
    VALUES(:page,:user_ip,:total_views)');
     $this->db->bind(':page',$data['page']);
    $this->db->bind(':user_ip',$data['user_ip']);
    $this->db->bind(':total_views',$data['total_views']);
   

    if($this->db->execute()){
        return true;
    }
    else{
        return false;
    }
  }


  public function updatePageView($data){
    $this->db->query('UPDATE page_views SET total_views = :total_views WHERE page = :page');
     $this->db->bind(':page',$data['page']);
  
    $this->db->bind(':total_views',$data['total_views']);
   

    if($this->db->execute()){
        return true;
    }
    else{
        return false;
    }
  }

  public function getPageViews($page){
      $this->db->query('SELECT SUM(total_views) as views FROM page_views WHERE page = :page');
      $this->db->bind(':page',$page);
      $row = $this->db->resultSet();
      return $row;

  }

  public function getViewCount(){

    $this->db->query('SELECT SUM(total_views) as views from page_views');

    $results = $this->db->resultSet();
    return $results;
  }
}

?>