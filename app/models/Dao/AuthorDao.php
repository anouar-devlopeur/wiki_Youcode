<?php 
require_once(APPROOT . '/models/User.php');

class AuthorDao extends User{
    private $db;
    
    public function __construct(){
        $this->db=new Database();
    }
    
}