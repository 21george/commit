<?php
class Post{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }


    public function getAllPosts($user_id){
        $this->db->query('SELECT * FROM posts WHERE user_id = :user_id ORDER BY post_id DESC');
        $this->db->bind(':user_id', $user_id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function getPostByPostId($post_id){
        $this->db->query('SELECT DISTINCT * FROM posts WHERE post_id = :post_id');
        $this->db->bind(':post_id', $post_id);
        $result = $this->db->single();
        return $result;
    }
    public function getPostDate($created_at){
        $date = new DateTime($created_at);
        $date = $date->format('d-m-Y');
        return $date;
    }


    public function getUnpaidPosts($user_id,$post_status,$post_type){
        $this->db->query('SELECT * FROM posts WHERE user_id = :user_id AND post_status = :post_status AND post_type <> :post_type ORDER BY post_id DESC');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':post_status', $post_status);
        $this->db->bind(':post_type', $post_type);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getPostPirce($post_id){
        $this->db->query('SELECT * FROM post_payment_records WHERE post_id = :post_id');
        $this->db->bind(':post_id', $post_id);
      
        $result = $this->db->single();
        return $result;
    }

    public function getPostByUserIdPayment($post_id){
        $this->db->query('SELECT DISTINCT * FROM posts,post_payment_records
        WHERE posts.post_id = :post_id AND post_payment_records.post_id = :post_id');
        $this->db->bind(':post_id', $post_id);
 
        $row = $this->db->single();
        return $row;
    }

    //get all posts for index front page

  public function  getAllFreePosts($post_type){
    $this->db->query('SELECT * FROM posts WHERE post_type = :post_type ORDER BY post_id DESC');
    $this->db->bind(':post_type', $post_type);
  
    $results = $this->db->resultSet();
    return $results;
    }

    public function  getAllPaidPosts($post_status,$post_type){
        $this->db->query('SELECT * FROM posts WHERE post_type <> :post_type AND post_status = :post_status ORDER BY post_id DESC');
        $this->db->bind(':post_type', $post_type);
        $this->db->bind(':post_status', $post_status);
        $results = $this->db->resultSet();
        return $results;
        }

    public function getPostUserInfo($post_id){
        $this->db->query("SELECT *,
        posts.post_id as postId,
        users.user_id as user_id
        FROM posts
        INNER JOIN users
        ON posts.user_id = users.user_id
        WHERE posts.post_id = :post_id
        ORDER BY postId DESC");
        $this->db->bind(':post_id',$post_id);
        $result = $this->db->single();
        return $result;
    }


    public function  getPostCount(){
        $this->db->query('SELECT * FROM posts ');

        $results = $this->db->resultSet();
        return $this->db->rowCount();
        }

        public function getLastId(){
            $this->db->query("SELECT LAST_INSERT_ID() as id from posts");
            $this->db->execute();
            $result = $this->db->single();
            return $result;
        }

        public function insertIntoPaymentRecords($post_id,$post_calculated_price,$user_id){

            $this->db->query('INSERT INTO post_payment_records (post_id,post_calculated_price,user_id)
             VALUES (:post_id,:post_calculated_price,:user_id)');
            $this->db->bind(':post_id', $post_id);
            $this->db->bind(':post_calculated_price', $post_calculated_price);
            $this->db->bind(':user_id', $user_id);
           
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        
        }

        public function insertPost($data){
            $this->db->query('INSERT INTO posts (post_cat_id,post_title,post_content,post_featured_img,user_id,post_status,post_type,full_address,suburb,postcode,post_start_date,post_end_date,city) 
            VALUES(:post_cat_id,:post_title,:post_content,:post_featured_img,:user_id,:post_status,:post_type,:full_address,:suburb,:postcode,:post_start_date,:post_end_date,:city)');
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
            $this->db->bind(':city',$data['city']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

       
        public function getCategoryFromDesc($post_id,$user_id){
            $this->db->query('SELECT post_cat_id FROM posts WHERE post_id = :post_id AND user_id = :user_id');
            $this->db->bind(':post_id', $post_id);
            $this->db->bind(':user_id', $user_id);
            $results = $this->db->single();
            return $results;  
        }

        //time ago function

        public function timeAgo($timeAgo){
             $currentTime = time();
             $timePassed = $currentTime - $timeAgo;
            $data = array(
                "seconds" => $timePassed,
                "minutes"=>round($timePassed / 60),
                "hours"=> round($timePassed /3600),
                "days" => round($timePassed /86400),
                "weeks" => round($timePassed /604800),
                "months" => round($timePassed /2600640),
                "years"=> round($timePassed /31207680)
            );

            if($data['seconds']<=60){
                echo $data['seconds']." seconds ago";
            }
            else if($data['minutes']<=60){
                if($data['minutes'] == 1){
                    echo "One minute ago";
                }
                else{
                    echo $data['minutes']." minutes ago"; 
                }
            }
            else if($data['hours'] <= 24){
                if($data['hours'] == 1){
                    echo "an hour ago";
                }
                else{
                    echo $data['hours']." hours ago"; 
                }
            }

            else if($data['days'] <= 7){
                if($data['days'] == 1){
                    echo "yesterday";
                }
                else{
                    echo $data['days']." days ago"; 
                }
            }

            
            else if($data['weeks'] <= 4.3){
                if($data['weeks'] == 1){
                    echo "a week ago";
                }
                else{
                    echo $data['weeks']." weeks ago"; 
                }
            }
            else if($data['months'] <= 12){
                if($data['months'] == 1){
                    echo "a month ago";
                }
                else{
                    echo $data['months']." months ago"; 
                }
            }

            else {
                if($data['years'] == 1){
                    echo "one year ago";
                }
                else{
                    echo $data['years']." years ago"; 
                }
            }
            
        }

        public function editPost($data){
           
    
            $this->db->query('UPDATE posts SET post_cat_id = :post_cat_id, post_title = :post_title,
            post_content = :post_content,post_featured_img = :post_featured_img ,advertised_price = :advertised_price
            WHERE post_id = :post_id AND user_id = :user_id');
                $this->db->bind(':user_id',$data['user_id']);
             $this->db->bind(':post_id',$data['post_id']);
            $this->db->bind(':post_cat_id',$data['post_cat_id']);
            $this->db->bind(':post_title',$data['post_title']);
            $this->db->bind(':post_content',$data['post_content']);
            $this->db->bind(':post_featured_img',$data['post_featured_img']);
        
            $this->db->bind(':advertised_price',$data['advertised_price']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deletePost($post_id){
            $this->db->query('DELETE FROM posts WHERE post_id = :post_id');

            $this->db->bind(':post_id',$post_id);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }


    public function getAllAds(){
        $this->db->query('SELECT * FROM posts ORDER BY post_id DESC');
     
        $results = $this->db->resultSet();
        return $results;  
    }

}

?>