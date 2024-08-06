<?php

class shop{
    private $db;
    public function __construct(){
        $this->db =new Database();
    }
    public function addproduct($data){
        $this->db->query("INSERT INTO products(name,price,description,quantity,category_id) VALUES(:name,:price,:description,:quantity,:category_id)");

// to conect data
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':quantity', $data['quantity']);
       // $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':category_id', $data['category_id']);
        // to  enshure that Execute stmt in data base file
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function getproduct(){
        $this->db->query('select * from products');
        $result = $this->db->resultSet();
        return $result;
    }






}