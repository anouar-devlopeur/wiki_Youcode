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
        if($this->verifyUserByEmail($email) == true){
        $req = "INSERT INTO user(email, IMAGE, password, nom) VALUES (:email, :image, :password, :nom)";
        
        $this->db->query($req);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':image', $img);
        $this->db->bind(':nom', $name);
    
        // Execute the query
     $this->db->execute();
    
        return true; } else {
            return false;
        }
    }
  

    public function verifyUser(User $user)
    {
        $email = $user->getEmail();
        $pass = $user->getPassword();
    
        $this->db->query("SELECT * FROM user WHERE email = :email");
        $this->db->bind(':email', $email);
    
        $result = $this->db->single(); 
    
        if ($this->db->rowCount() > 0 && password_verify($pass, $result->password)) {
            return $result; 
        } else {
            return false; 
        }
    }
    
    public function verifyUserByEmail($email)
    {
        $this->db->query("SELECT * FROM user WHERE email = :email");
        $this->db->bind(':email', $email);
     
        $result = $this->db->single(); 
     
        if ($result == false) {
            return true;
        }else{
             
            return false;
        }
    }
    
    
}