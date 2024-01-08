<?php 
require_once(APPROOT . '/models/User.php');

class AuthorDao extends User{
    private $db;
       //dependency-injection construct/stters
    public function __construct(){
        $this->db=new Database();
    }
    
}