<?php 
require_once(APPROOT . '/models/User.php');
class AdminDao extends User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // public function login($email, $password)
    // {
    //     $query = "SELECT * FROM user WHERE email = :email LIMIT 1";
    //     $this->db->query($query);
    //     $this->db->bind(':email', $email);
    //     $result = $this->db->single();
    
    //     if ($result) {
    //         // Verify password
    //         if (password_verify($password, $result['password'])) {
    //             // Password is correct
    //             $this->setId_user($result['id_user']);
    //             $this->setNom($result['nom']);
    //             $this->setEmail($result['email']);
    //             $this->setRole($result['role']);
    //             return true;
    //         }
    //     }
    
    //     // Login failed
    //     return false;
    // }
    
}