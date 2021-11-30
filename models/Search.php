<?php
/*******
 Function getting all values from the data bank (stored information given ba the sealer) 
 Query all of them on  live-search and also limiting the result to (15) or even less than that

 */
class Search{

    private $db;
    public function __construct(){
        $this->db = new Database();
    }

//find the suburb or postcode typed in the input field
public function getPlaces($name){

    $this->db->query('SELECT * FROM suburbs WHERE name LIKE :name OR postcode LIKE :postcode LIMIT 15');
    $this->db->bind(':name','%'.$name.'%');
    $this->db->bind(':postcode','%'.$name.'%');
    $results = $this->db->resultSet();
    return $results;
}
}

?>