<?php 
require_once(APPROOT . '/models/User.php');

class AuthorDao extends User{
    private $db;
       //dependency-injection construct/stters
    public function __construct(){
        $this->db=new Database();
    }
    
    public function Register(User $user) {
        $name = $user->getNom();
        $email = $user->getEmail();
        $pass = $user->getPassword();
        $img = $user->getIMAGE();
    
        // Hash the password
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
    
        $req = "INSERT INTO user(email, IMAGE, password, nom) VALUES (:email, :image, :password, :nom)";
        
        $this->db->query($req);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':image', $img);
        $this->db->bind(':nom', $name);
    
        // Execute the query
        $res = $this->db->execute();
    
        return $res;
    }
    
    
}