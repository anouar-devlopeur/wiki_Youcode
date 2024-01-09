<?php 
require_once(APPROOT . '/models/User.php');

class AdminDao extends User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    function affiche_Statistiques($tableName) {
        try {
            $req = "SELECT COUNT(*) AS count FROM $tableName";
            $this->db->query($req);
            $result = $this->db->single();
    
            return $result->count;
        } catch (Exception $e) {
            // Handle the exception or log the error
            error_log("Error in Admin affiche_Statistiques: " . $e->getMessage());
            return false;
        }
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