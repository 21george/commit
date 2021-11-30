<?php
class Transaction{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function addTransaction($data){
        $this->db->query('INSERT INTO transactions (id,customer_id,product,amount,currency,status) VALUES (:id,:customer_id,:product,:amount,:currency,:status)');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':product', $data['product']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':currency', $data['currency']);
        $this->db->bind(':status', $data['status']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function updatePaidTransactionPost($post_id,$user_id,$post_status){
        $this->db->query('UPDATE posts SET post_status = :post_status WHERE post_id =:post_id AND user_id = :user_id');
        $this->db->bind(':post_id', $post_id);
        $this->db->bind(':post_status', $post_status);
        $this->db->bind(':user_id', $user_id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function addPayment($data){
        $this->db->query('INSERT INTO paypal_payments (transaction_id,payment_amount,payment_status,invoice_id,created_time) VALUES (:transaction_id,:payment_amount,:payment_status,:invoice_id,:created_time)');
        $this->db->bind(':transaction_id', $data['transaction_id']);
        $this->db->bind(':payment_amount', $data['payment_amount']);
        $this->db->bind(':payment_status', $data['payment_status']);
        $this->db->bind(':invoice_id', $data['invoice_id']);
        $this->db->bind(':created_time', date('Y-m-d H:i:s'));
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function addPaidTransaction($post_id,$post_price,$user_id,$tid,$type){
        $this->db->query('UPDATE post_payment_records SET post_calculated_price = :post_calculated_price, user_id = :user_id, tid = :tid, type = :type, date_paid = :date_paid WHERE post_id =:post_id');
        $this->db->bind(':post_id', $post_id);
        $this->db->bind(':post_calculated_price', $post_price);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':tid', $tid);
        $this->db->bind(':type', $type);
        $this->db->bind(':date_paid', date('Y-m-d H:i:s'));
     
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getAllTransactions($user_id){
        $post_calculated_price = 0;
        $this->db->query('SELECT * FROM post_payment_records WHERE user_id = :user_id AND post_calculated_price <> :post_calculated_price');
        $this->db->bind(':user_id',$user_id);
        $this->db->bind(':post_calculated_price',$post_calculated_price);
        $row = $this->db->resultSet();
        return $row;
    }


    public function getTransactionsCount(){
        $post_calculated_price = 0;
        $this->db->query('SELECT * FROM post_payment_records WHERE post_calculated_price <> :post_calculated_price');
        $this->db->bind(':post_calculated_price',$post_calculated_price);
        $results = $this->db->resultSet();
        return $this->db->rowCount();
        
    }

    public function getPaidSum(){
        $this->db->query('SELECT SUM(post_calculated_price) as paid FROM post_payment_records');
 
        $row = $this->db->resultSet();
        return $row;
    }
    public function getAllPaidTransactions(){
        $post_calculated_price = 0;
        $this->db->query('SELECT * from post_payment_records WHERE post_calculated_price <> :post_calculated_price');
        $this->db->bind(':post_calculated_price',$post_calculated_price);
        $row = $this->db->resultSet();
        return $row;
    }
}

?>